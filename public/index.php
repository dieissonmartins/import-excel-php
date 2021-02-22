<?php

$application = parse_ini_file(__DIR__."/../src/config/env.ini");

require_once '../vendor/autoload.php';
require_once '../routes/web.php';

//use App\Http\Controllers\ProductController;
//$teste = new ProductController;
//echo $teste->index();

?>