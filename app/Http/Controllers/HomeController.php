<?php
namespace App\Http\Controllers;

class HomeController 
{
    public function __construct($router)
    {
        $this->router = $router;
    }
    
    public function index()
    {
        try{
            require_once __DIR__."/../../../src/views/admin/home.php";

		} catch (\Exception $e) {
                die("Error: ".$e);
		}
    }
}