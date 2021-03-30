<?php


namespace Domain\Users\Exceptions;


use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvalidEmailOrPasswordException extends Exception
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
            'code' => 'auth/invalid-email-or-password',
            'message' => 'The email or password are incorrect.'
        ], JsonResponse::HTTP_UNAUTHORIZED);
    }
}
