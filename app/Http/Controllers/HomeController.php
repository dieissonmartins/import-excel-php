<?php
namespace App\Http\Controllers;

class HomeController 
{
    public function index()
    {
        try{
            require_once __DIR__."/../../../src/views/admin/home.php";

		} catch (\Exception $e) {
                die("Error: ".$e);
		}
    }
}