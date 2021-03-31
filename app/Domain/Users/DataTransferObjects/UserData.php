<?php


namespace Domain\Users\DataTransferObjects;


use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @var \Illuminate\Support\Carbon
     */
    public $email_verified_at;
}
