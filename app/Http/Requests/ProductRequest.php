<?php
namespace App\Http\Requests;

class ProductRequest 
{
    public static function validation($headingsArray)
    {
        $data = array_map("array_filter", $headingsArray);
        $data = array_filter($data);

        unset($data[1]);

        return $data; 
    }
}