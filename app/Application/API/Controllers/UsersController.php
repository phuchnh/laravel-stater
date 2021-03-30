<?php


namespace App\Application\API\Controllers;


use Domain\Users\Models\User;
use Illuminate\Http\Request;
use Support\Controllers\ApiController;

class UsersController extends ApiController
{
    public function index(Request $request)
    {
        return User::all();
    }
}