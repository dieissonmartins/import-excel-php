<?php 
use CoffeeCode\Router\Router;

$router = new Router("http://localhost/import-excel-php/public/");

//Controllers
$router->namespace("App\Http\Controllers");

$router->get("/login",                  "LoginController:login",            "auth.login");
$router->post("/login",                 "LoginController:authentication",   "auth.authentication");
$router->get("/logout",                 "LoginController:logout",           "auth.logout");

$router->get("/",                       "HomeController:index");
$router->get("/products",               "ProductController:index");
$router->post("/products/import",       "ProductController:import");
$router->get("/products/delete/{id}",   "ProductController:destroy");

/*
$router->get("/", function () {
    echo "teste";
});
*/

$router->dispatch();
?>