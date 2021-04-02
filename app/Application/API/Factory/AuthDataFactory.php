<?php


namespace App\Application\API\Factory;


use App\Application\API\Requests\LoginRequest;
use App\Domain\Users\DataTransferObjects\AuthData;

class AuthDataFactory
{
    /**
     * @param  LoginRequest  $request
     * @return AuthData
     */
    public function fromRequest(LoginRequest $request)
    {
        return new AuthData([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
    }
}
