<?php


namespace Application\API\Controllers;

use Application\API\Concerns\ApiController;
use Application\API\Requests\LoginRequest;
use Domain\Users\Actions\IssueTokenAction;
use Domain\Users\DataTransferObjects\LoginData;
use Domain\Users\Exceptions\InvalidEmailOrPasswordException;
use Domain\Users\Models\User;
use Illuminate\Http\Request;

class LoginController extends ApiController
{
    /**
     * Issuing the token
     *
     * @param  LoginRequest  $request
     * @param  IssueTokenAction  $action
     * @return string
     * @throws InvalidEmailOrPasswordException
     */
    public function login(LoginRequest $request, IssueTokenAction $action)
    {
        return response()->json([
            'token' => $action->execute(LoginData::fromRequest($request))
        ]);
    }

    /**
     * Revoking the token
     *
     * @param  Request  $request
     */
    public function logout(Request $request)
    {
        /**@var $user User */
        $user = $request->user();

        $user->tokens()->delete();
    }
}
