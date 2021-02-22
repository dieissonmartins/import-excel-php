<?php
namespace App\Http\Requests;

class ProductRequest 
{
    public static function validation($headingsArray)
    {
        $data = array_map("array_filter", $headingsArray);
        $data = array_filter($data);

        //valida cabeçalho do excel
        if(
            $data[1]['A'] !== "EAN"             || 
            $data[1]['B'] !== "NOME PRODUTO"    || 
            $data[1]['C'] !== "PREÇO"           || 
            $data[1]['D'] !== "ESTOQUE"         || 
            $data[1]['E'] !== "DATA FABRICAÇÃO" 
        ){
            echo "erro cabecalho";
        }

        //valida colunas de preenchimento obrigatório  
        foreach ($data as $product) {
            if(
                !isset($product['A'])|| 
                !isset($product['B'])||
                !isset($product['C'])||
                !isset($product['D'])     
            ){
                echo "erro colunas";
            }
        }

        //unset($data[1]);

        //return $data; 
    }
}