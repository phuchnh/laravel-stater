<?php


namespace Domain\Users\Actions;


use Domain\Users\Enums\UserPermissions;
use Domain\Users\Models\Permission;

class RefreshPermissionsAction
{
    /**
     * @return void
     */
    public function execute()
    {
        $permissions = array_map(function ($item) {
            return [
                'name' => $item,
                'guard_name' => 'api',
            ];
        }, UserPermissions::asArray());

        Permission::upsert($permissions, ['name'], ['name']);
    }
}