<?php


namespace Domain\Users\DataTransferObjects;


use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var string */
    public $password;

    /** @var Carbon|null */
    public $email_verified_at;
}
