<?php


namespace App\Application\API\Factory;


use App\Domain\Users\DataTransferObjects\AuthData;
use Illuminate\Http\Request;

class AuthDataFactory
{
    /**
     * @param  Request  $request
     * @return AuthData
     */
    public function fromRequest(Request $request)
    {
        return new AuthData([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
    }
}
