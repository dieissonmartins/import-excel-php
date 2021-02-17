<?php
namespace App\Http\Controllers;

class ProductController 
{
    public function index()
    {
        try{
			return "namespace TRUE";

		} catch (\Exception $e) {
            return "namespace FALSE";
		}
    }
}
?>