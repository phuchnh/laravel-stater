<?php


namespace Application\API\Requests;


use Support\Requests\JsonRequest;

class LoginRequest extends JsonRequest
{
    public function rules()
    {
        return [
            'email' => 'required|string',
            'password' => 'required|string'
        ];
    }
}