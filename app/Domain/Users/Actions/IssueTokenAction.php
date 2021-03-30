<?php


namespace Domain\Users\Actions;


use Domain\Users\DataTransferObjects\LoginData;
use Domain\Users\Exceptions\InvalidCredentialException;
use Domain\Users\Models\User;
use Illuminate\Support\Facades\Hash;

class IssueTokenAction
{
    /**
     * @param  LoginData  $loginData
     * @return string
     * @throws InvalidCredentialException
     */
    public function execute(LoginData $loginData)
    {
        $user = User::where('email', $loginData->email)->first();
        if (!$user || !Hash::check($loginData->password, $user->password)) {
            throw new InvalidCredentialException();
        }

        return $user->createToken('PersonalAccessToken')->plainTextToken;
    }
}