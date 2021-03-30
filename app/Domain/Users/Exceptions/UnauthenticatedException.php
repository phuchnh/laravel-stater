<?php


namespace Domain\Users\Exceptions;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UnauthenticatedException extends \Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function render($request)
    {
        return response()->json([
            'code' => 4010,
            'message' => 'Unauthenticated.'
        ], JsonResponse::HTTP_UNAUTHORIZED);
    }
}