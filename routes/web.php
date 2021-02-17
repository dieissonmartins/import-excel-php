<?php 
use CoffeeCode\Router\Router;
use App\Http\Controllers\ProductController;


$router = new Router("http://localhost/import-excel-php/public/");

$router->get("/products", function () {
    echo "teste products";
});

$router->get("/", function () {
    echo "teste";
});

$router->dispatch();
?>