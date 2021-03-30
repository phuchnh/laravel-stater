<?php


namespace Support\Requests;

use App\Exceptions\JsonValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;


class JsonRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new JsonValidationException($validator);
    }
}