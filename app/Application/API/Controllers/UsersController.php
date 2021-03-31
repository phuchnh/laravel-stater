<?php


namespace Application\API\Controllers;


use Application\API\Resources\UserResource;
use Domain\Users\Models\User;
use Illuminate\Http\Request;
use Support\Controllers\ApiController;

class UsersController extends ApiController
{
    /**
     * @param  Request  $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return UserResource::collection(User::simplePaginate());
    }
}
