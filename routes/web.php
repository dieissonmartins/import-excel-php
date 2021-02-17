<?php 
use CoffeeCode\Router\Router;

$router = new Router("http://localhost/import-excel-php/");

$router->get("/", function (){
    echo "teste";
});

$router->dispatch();
?>