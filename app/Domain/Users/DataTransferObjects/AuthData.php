<?php


namespace App\Domain\Users\DataTransferObjects;


use Spatie\DataTransferObject\DataTransferObject;

class AuthData extends DataTransferObject
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;
}
