<?php


namespace Application\Web;


class WelcomeController
{
    public function __invoke()
    {
        return view('welcome');
    }
}