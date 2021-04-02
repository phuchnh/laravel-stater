<?php


namespace App\Application\API\Controllers;

use App\Application\API\Concerns\Controller;
use App\Application\API\Requests\LoginRequest;
use App\Domain\Users\Actions\IssueTokenAction;
use App\Domain\Users\Exceptions\InvalidEmailOrPasswordException;
use App\Domain\Users\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
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
            'token' => $action->execute(
                $request->get('email'),
                $request->get('password')
            )
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
