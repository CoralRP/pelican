<?php

namespace App\Transformers\Api\Client;

use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\Resource\ResourceAbstract;

class ActivityLogTransformer extends BaseClientTransformer
{
    protected array $availableIncludes = ['actor'];

    public function getResourceName(): string
    {
        return ActivityLog::RESOURCE_NAME;
    }

    public function transform(ActivityLog $model): array
    {
        return [
            // This is not for security, it is only to provide a unique identifier to
            // the front-end for each entry to improve rendering performance since there
            // is nothing else sufficiently unique to key off at this point.
            'id' => sha1((string) $model->id),
            'batch' => $model->batch,
            'event' => $model->event,
            'is_api' => !is_null($model->api_key_id),
            'ip' => $this->canViewIP($model->actor) ? $model->ip : null,
            'description' => $model->description,
            'properties' => $model->wrapProperties(),
            'has_additional_metadata' => $this->hasAdditionalMetadata($model),
            'timestamp' => $model->timestamp->toAtomString(),
        ];
    }

    public function includeActor(ActivityLog $model): ResourceAbstract
    {
        if (!$model->actor instanceof User) {
            return $this->null();
        }

        return $this->item($model->actor, $this->makeTransformer(UserTransformer::class), User::RESOURCE_NAME);
    }

    /**
     * Determines if there are any log properties that we've not already exposed
     * in the response language string and that are not just the IP address or
     * the browser useragent.
     *
     * This is used by the front-end to selectively display an "additional metadata"
     * button that is pointless if there is nothing the user can't already see from
     * the event description.
     */
    protected function hasAdditionalMetadata(ActivityLog $model): bool
    {
        if (is_null($model->properties) || $model->properties->isEmpty()) {
            return false;
        }

        $str = trans('activity.' . str_replace(':', '.', $model->event));
        preg_match_all('/:(?<key>[\w.-]+\w)(?:[^\w:]?|$)/', $str, $matches);

        $exclude = array_merge($matches['key'], ['ip', 'useragent', 'using_sftp']);
        foreach ($model->properties->keys() as $key) {
            if (!in_array($key, $exclude, true)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determines if the user can view the IP address in the output either because they are the
     * actor that performed the action, or because they are an administrator on the Panel.
     */
    protected function canViewIP(?Model $actor = null): bool
    {
        return $actor?->is($this->request->user()) || $this->request->user()->isRootAdmin();
    }
}
