<?php

require_once 'AppController.php';

class SecurityController extends AppController
{
    public function login()
    {
        //TODO return HTML, login, data
        return $this->render("login", ["message" => "Wrong password"]);
    }
    public function register()
    {
        //TODO
        return $this->render("register", ["message" => ""]);
    }
}