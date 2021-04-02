<?php


namespace App\Application\API\Factory;


use App\Domain\Users\DataTransferObjects\UserData;
use Illuminate\Http\Request;

class UserDataFactory
{
    /**
     * @param  Request  $request
     * @return UserData
     */
    public function createFromRequest(Request $request)
    {
        return new UserData([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
    }
}
