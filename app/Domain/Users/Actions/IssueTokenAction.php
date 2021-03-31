<?php


namespace Domain\Users\Actions;


use Domain\Users\DataTransferObjects\LoginData;
use Domain\Users\Exceptions\InvalidEmailOrPasswordException;
use Domain\Users\Models\User;
use Illuminate\Support\Facades\Hash;

class IssueTokenAction
{
    /**
     * @param  LoginData  $loginData
     * @return string
     * @throws InvalidEmailOrPasswordException
     */
    public function execute(LoginData $loginData)
    {
        $user = User::where('email', $loginData->email)->first();

        if (!$user || !Hash::check($loginData->password, $user->password)) {
            throw new InvalidEmailOrPasswordException();
        }

        return $user->createToken('PersonalAccessToken')->plainTextToken;
    }
}
