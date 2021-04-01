<?php


namespace App\Domain\Users\Actions;


use App\Domain\Users\Enums\UserPermissions;
use App\Domain\Users\Models\Permission;
use App\Domain\Users\Models\Role;

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

        $role = Role::updateOrCreate(['name' => 'administrator']);
        $role->givePermissionTo(Permission::all());
    }
}
