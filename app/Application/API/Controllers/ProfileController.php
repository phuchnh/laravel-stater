<?php


namespace Application\API\Controllers;


use Illuminate\Http\Request;
use Application\API\Concerns\ApiController;

class ProfileController extends ApiController
{
    /**
     * @param  Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user();
    }
}
