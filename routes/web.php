<?php 
use CoffeeCode\Router\Router;


$router = new Router("http://localhost/import-excel-php/public/");

//Controllers
$router->namespace("App\Http\Controllers");

$router->get("/products",        "ProductController:index");
$router->post("/products/import","ProductController:import");


/*
$router->get("/", function () {
    echo "teste";
});
*/

$router->dispatch();
?>