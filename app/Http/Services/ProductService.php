<?php
namespace App\Http\Services;

use App\Http\Requests\ProductRequest;
use Src\database\Connection;
use PDO;

class ProductService 
{

    public static function findAllProducts()
    {
        try{
            $sql = "SELECT * FROM tb_products";

            $products   = Connection::open()->prepare($sql);
            $products->execute();
            
            $result = $products->fetchAll();
            return $result;
            
		} catch (\Exception $e) {
            die("Error: ".$e);
		}

    }

    public static function importExcel($file)
    {
        try{
            $fileType       = \PHPExcel_IOFactory::identify($file['tmp_name']);
            $objReader      = \PHPExcel_IOFactory::createReader($fileType);
            $objPHPExcel    = $objReader->load($file['tmp_name']); 
            
		} catch (\Exception $e) {
            die("Error: ".$e);
		}

        $sheet              = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow         = $sheet->getHighestRow(); 
        $highestColumn      = $sheet->getHighestColumn();
        $headingsArray      = $sheet->rangeToArray('A1:'.$highestColumn.$highestRow,null, true, true, true);

        $data = ProductRequest::validation($headingsArray);

        foreach ($data as $product) {
            
            $ean                = $product['A']; 
            $product_name       = $product['B'];
            $price              = (float) str_replace('R$ ','', $product['C']);
            $inventory          = $product['D'];
            $date_fabrication   = ($product['E'])? date('Y-m-d', strtotime($product['E'])) : NULL;

            echo $sql = "INSERT INTO tb_products(ean, product_name, price, inventory, date_fabrication)
                    VALUES ($ean, '$product_name', $price, $inventory,'$date_fabrication')";

            Connection::open()->exec($sql);
        }
    }

    public static function destroy($id)
    {
        try{
           $sql        = "DELETE FROM tb_products WHERE ean =  $id";   
           $product    = Connection::open()->exec($sql);

		} catch (\Exception $e) {
            die("Error: ".$e);
		}

    }
}
?>