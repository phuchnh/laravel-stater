<?php


namespace App\Domain\Users\Actions;


use App\Domain\Users\Exceptions\InvalidEmailOrPasswordException;
use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Hash;

class IssueTokenAction
{
    /**
     * @param  string  $email
     * @param  string  $password
     * @return string
     * @throws InvalidEmailOrPasswordException
     */
    public function execute($email, $password)
    {
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw new InvalidEmailOrPasswordException();
        }

        return $user->createToken('PersonalAccessToken')->plainTextToken;
    }
}
