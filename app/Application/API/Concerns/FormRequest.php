<?php


namespace App\Application\API\Concerns;

use App\Exceptions\JsonValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;


class FormRequest extends LaravelFormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new JsonValidationException($validator);
    }
}
