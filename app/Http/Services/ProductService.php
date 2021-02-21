<?php
namespace App\Http\Services;
//use moonland\phpexcel\PHPExcel_IOFactory;

use Src\database\Connection;

class ProductService 
{
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

        $data = array_map("array_filter", $headingsArray);
        $data = array_filter($data);
        unset($data[1]);

        foreach ($data as $product) {
            
            $ean                = $product['A']; 
            $product_name       = $product['B'];
            $price              = (float) str_replace('R$ ','', $product['C']);
            $inventory          = $product['D'];
            //$date_fabrication   =  date_create_from_format("m-d-Y", $product['E'])->format("Y-m-d");
            
            $sql = "INSERT INTO tb_products(ean, product_name, price, inventory, date_fabrication)
                    VALUES ($ean, '$product_name', $price, $inventory,'')";

            Connection::open('env')->exec($sql);
        }
    }
}
?>