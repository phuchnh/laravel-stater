<?php


namespace App\Domain\Users\Actions;


use App\Domain\Users\DataTransferObjects\LoginData;
use App\Domain\Users\Exceptions\InvalidEmailOrPasswordException;
use App\Domain\Users\Models\User;
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
