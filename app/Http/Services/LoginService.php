<?php
namespace App\Http\Services;

use Src\database\Connection;
use PDO;

class LoginService 
{
    public static function authentication($data)
    {
        try{
            $email      = $data['email'];
            $password   = $data['password'];

            $sql = "SELECT * FROM tb_users WHERE email = '$email' AND password = '$password'";

            $session   = Connection::open()->prepare($sql);
            $session->execute();
            
            $results = $session->fetchAll();
            
            if($results){
                session_start();
                foreach ($results as $result){
                    $_SESSION['name'] = $result['name'];  
                }
            }
    
		} catch (\Exception $e) {
            die("Error: ".$e);
		}

    }

    public static function logout()
    {
        try{
            session_start();
            session_destroy();
            
		} catch (\Exception $e) {
            die("Error: ".$e);
		}

    }
}