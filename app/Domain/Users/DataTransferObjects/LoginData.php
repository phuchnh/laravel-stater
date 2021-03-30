<?php


namespace Domain\Users\DataTransferObjects;


use Application\API\Requests\LoginRequest;
use Spatie\DataTransferObject\DataTransferObject;

class LoginData extends DataTransferObject
{
    /** @var string */
    public $email;

    /** @var string */
    public $password;

    public static function fromRequest(LoginRequest $request)
    {
        return new self([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
    }
}