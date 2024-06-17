<?php

namespace App\Http\Requests\Api\Client\Servers\Files;

use App\Models\Server;
use App\Models\Permission;
use App\Http\Requests\Api\Client\ClientApiRequest;
use App\Contracts\Http\ClientPermissionsRequest;

class DownloadFileRequest extends ClientApiRequest implements ClientPermissionsRequest
{
    /**
     * Ensure that the user making this request has permission to download files
     * from this server.
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
