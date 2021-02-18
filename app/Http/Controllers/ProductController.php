<?php
namespace App\Http\Controllers;

use App\Http\Services\ProductService;

class ProductController 
{
    public function index()
    {
        try{
			$varteste = "Dieisson Martins";
            require_once __DIR__."/../../../src/views/admin/products/index.php";

		} catch (\Exception $e) {
            echo json_encode($e);
		}
    }

    public function import()
    {
        $file = $_FILES['worksheet'];

        try{
            ProductService::import($file);

		} catch (\Exception $e) {
            echo json_encode($e);
		}
    }
}
?>