<?php
namespace App\Http\Services;

class ProductService 
{
    public static function import($file)
    {
        try{
			echo "camada de serviço";
            var_dump($file);

		} catch (\Exception $e) {
            echo json_encode($e);
		}
    }
}
?>