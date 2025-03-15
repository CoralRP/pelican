<?php

namespace App\Http\Requests\Api\Client\Servers\Files;

use App\Models\Permission;
use App\Contracts\Http\ClientPermissionsRequest;
use App\Http\Requests\Api\Client\ClientApiRequest;

class DownloadFileRequest extends ClientApiRequest implements ClientPermissionsRequest
{
    /**
     * Checks that the authenticated user is allowed to download files on the server.
     */
    public function authorize(): bool
    {
        return $this->user()->can(Permission::ACTION_FILE_SFTP, $this->parameter('server', Server::class));
    }

    public function permission(): string
    {
        return Permission::ACTION_FILE_SFTP;
    }

    public function rules(): array
    {
        return [
            'file' => 'required|string',
        ];
    }
}
