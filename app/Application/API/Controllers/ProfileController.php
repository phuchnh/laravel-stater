<?php


namespace Application\API\Controllers;


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
        return $request->user();
    }
}
