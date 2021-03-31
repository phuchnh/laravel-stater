<?php


namespace Domain\Users\Actions;


use Domain\Users\DataTransferObjects\UserData;
use Domain\Users\Exceptions\EmailNotUniqueException;
use Domain\Users\Models\Permission;
use Domain\Users\Models\Role;
use Domain\Users\Models\User;

class CreateAdministratorAction
{
    /**
     * @param  UserData  $userData
     * @throws EmailNotUniqueException
     */
    public function execute(UserData $userData)
    {
        if (User::whereEmail($userData->email)->exists()) {
            throw new EmailNotUniqueException("[{$userData->email}] has already been taken.");
        }
        $user = User::create($userData->toArray());
        $role = Role::updateOrCreate(['name' => 'administrator']);
        $role->givePermissionTo(Permission::all());
        $user->assignRole($role);
    }
}
