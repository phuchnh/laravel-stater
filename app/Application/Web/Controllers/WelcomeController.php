<?php


namespace App\Application\Web\Controllers;


use App\Application\Web\Concerns\Controller;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }
}
