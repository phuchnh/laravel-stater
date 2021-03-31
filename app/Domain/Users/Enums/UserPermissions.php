<?php


namespace Domain\Users\Enums;


use BenSampo\Enum\Enum;

final class UserPermissions extends Enum
{
    const CreateUsers = 'users.create';
    const ViewUsers = 'users.view';
    const UpdateUsers = 'users.update';
    const DeleteUsers = 'users.delete';
}