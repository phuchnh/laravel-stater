<?php


namespace App\Application\API\Requests;


use App\Application\API\Concerns\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|string',
            'password' => 'required|string'
        ];
    }
}
