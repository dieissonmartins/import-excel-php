<?php
namespace App\Http\Services;

use Src\database\Connection;
use PDO;

class LoginService 
{
    public static function authentication($data)
    {
        try{
            var_dump($data);
            echo "view authentication";
            
		} catch (\Exception $e) {
            die("Error: ".$e);
		}

    }
}