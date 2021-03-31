<?php


namespace Application\Web\Controllers;


use Application\Web\Concerns\Controller;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }
}