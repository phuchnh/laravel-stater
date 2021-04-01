<?php


namespace App\Domain\Users\Actions;


use App\Domain\Users\DataTransferObjects\UserData;
use App\Domain\Users\Exceptions\EmailNotUniqueException;
use App\Domain\Users\Models\Permission;
use App\Domain\Users\Models\Role;
use App\Domain\Users\Models\User;

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
        $user = User::make($userData->toArray());
        $user->email_verified_at = now();
        $user->save();

        $role = Role::updateOrCreate(['name' => 'administrator']);
        $role->givePermissionTo(Permission::all());
        $user->assignRole($role);
    }
}
