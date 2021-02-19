<?php
namespace App\Http\Services;
//use moonland\phpexcel\PHPExcel_IOFactory;

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
        
        var_dump($data);

        for($row = 1; $row <= $highestRow; $row++){
            //$rowData = $sheetToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
            
            //if($row == 1) continue;

            //var_dump($rowData);
        }

        echo "camada de serviço";
    }
}
?>