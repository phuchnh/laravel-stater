<?php


namespace Application\API\Controllers;


use Domain\Users\Exceptions\InvalidCredentialException;
use Exception;
use Illuminate\Http\Request;
use Support\Controllers\ApiController;

class ProfileController extends ApiController
{
    /**
     * @param  Request  $request
     * @return mixed
     * @throws InvalidCredentialException
     */
    public function __invoke(Request $request)
    {
        try {
            $request->user();
        } catch (Exception $exception) {
            throw new InvalidCredentialException();
        }
        return $request->user();
    }
}