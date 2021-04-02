<?php


namespace App\Domain\Users\Actions;


use App\Domain\Users\DataTransferObjects\AuthData;
use App\Domain\Users\Exceptions\InvalidEmailOrPasswordException;
use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Hash;

class IssueTokenAction
{
    /**
     * @param  AuthData  $loginData
     * @return string
     * @throws InvalidEmailOrPasswordException
     */
    public function execute(AuthData $loginData)
    {
        $user = User::where('email', $loginData->email)->first();

        if (!$user || !Hash::check($loginData->password, $user->password)) {
            throw new InvalidEmailOrPasswordException();
        }

        return $user->createToken('PersonalAccessToken')->plainTextToken;
    }
}
