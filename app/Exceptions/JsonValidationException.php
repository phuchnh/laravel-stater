<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class JsonValidationException extends ValidationException
{
    public function __construct($validator, $response = null, $errorBag = 'default')
    {
        parent::__construct($validator, $response, $errorBag);
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function render($request)
    {
        return response()->json([
            'data' => [
                'message' => 'The given data was invalid.',
                'errors'  => $this->validator->errors()->messages(),
            ],
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
