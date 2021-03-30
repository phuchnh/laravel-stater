<?php


namespace Domain\Users\Exceptions;


use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvalidCredentialException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        return false;
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
            'code' => 4011,
            'message' => 'The provided credentials are incorrect.'
        ], JsonResponse::HTTP_UNAUTHORIZED);
    }
}