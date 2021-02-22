<?php
namespace App\Http\Controllers;

use App\Http\Services\ProductService;

class ProductController 
{
    public function __construct($router)
    {
        $this->router = $router;
    }
    
    public function index()
    {
        try{
			$products = ProductService::findAllProducts();

            require_once __DIR__."/../../../src/views/admin/products/index.php";

		} catch (\Exception $e) {
                die("Error: ".$e);
		}
    }

    public function import()
    {
        $file = $_FILES['worksheet'];

        try{
            ProductService::importExcel($file);

		} catch (\Exception $e) {
                die("Error: ".$e);
		}
    }

    public function destroy($id)
    {
        try{
            $product = ProductService::destroy($id);
            //require_once __DIR__."/../../../src/views/admin/products/index.php";

		} catch (\Exception $e) {
                die("Error: ".$e);
		}
    }
}
?>