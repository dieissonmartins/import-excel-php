<?php
namespace App\Http\Controllers;

use App\Http\Services\LoginService;

class LoginController 
{
    public function __construct($router)
    {
        $this->router = $router;
    }

    public function login()
    {
        try{
            require_once __DIR__."/../../../src/views/auth/login.php";

		} catch (\Exception $e) {
                die("Error: ".$e);
		}
    }

    public function authentication($data)
    {
        try{
            $login = LoginService::authentication($data);

		} catch (\Exception $e) {
                die("Error: ".$e);
		}

        return  $this->router->redirect("home.index");
    }

    public function logout()
    {
        try{
            $logout = LoginService::logout();

		} catch (\Exception $e) {
                die("Error: ".$e);
		}

        return  $this->router->redirect("auth.login");
    }
}