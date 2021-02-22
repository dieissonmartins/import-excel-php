<?php
namespace App\Http\Controllers;

use App\Http\Services\LoginService;

class LoginController 
{
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
    }

    public function logout()
    {
        try{
            echo "view logout";
            //require_once __DIR__."/../../../src/views/auth/login.php";

		} catch (\Exception $e) {
                die("Error: ".$e);
		}
    }
}