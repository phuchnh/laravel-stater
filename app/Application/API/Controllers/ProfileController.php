<?php


namespace Application\API\Controllers;


use Application\API\Resources\UserResource;
use Domain\Users\Models\User;
use Illuminate\Http\Request;
use Application\API\Concerns\Controller;

class ProfileController extends Controller
{
    /**
     * @param  Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        /**
         * @var User $user
         */
        $user = $request->user();

        return (new UserResource($user->load('permissions')));
    }
}
