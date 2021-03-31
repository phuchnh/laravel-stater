<?php


namespace Application\API\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Domain\Users\Models\User
 */
class UserResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'name' => (string) $this->name,
            'email' => (string) $this->email,
            'permissions' => $this->when($request->user()->id === $this->id, function () {
                return $this->getAllPermissions()->pluck('name');
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}