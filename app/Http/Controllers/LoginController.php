<?php
namespace App\Http\Controllers;

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

    public function authentication()
    {
        try{
            echo "view authentication";
            //require_once __DIR__."/../../../src/views/auth/login.php";

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