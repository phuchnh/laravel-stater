<?php


namespace App\Application\API\Controllers;


use App\Application\API\Concerns\Controller;
use App\Application\API\Resources\UserResource;
use App\Domain\Users\Models\User;
use Illuminate\Http\Request;

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

        return (new UserResource($user));
    }
}
