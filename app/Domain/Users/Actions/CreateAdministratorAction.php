<?php


namespace App\Domain\Users\Actions;


use Domain\Users\DataTransferObjects\UserData;
use Domain\Users\Models\User;

class CreateAdministratorAction
{
    public function execute(UserData $userData)
    {
        $user = User::create($userData->toArray());
    }
}
