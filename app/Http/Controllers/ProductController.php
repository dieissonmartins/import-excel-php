<?php
namespace App\Http\Controllers;

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

    public function import($data)
    {
        try{
            echo "import";
            var_dump($data);

		} catch (\Exception $e) {
            echo json_encode($e);
		}
    }
}
?>