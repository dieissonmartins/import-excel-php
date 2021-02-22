<?php 
use CoffeeCode\Router\Router;

$router = new Router($application['APP_URL']);

//Controllers
$router->namespace("App\Http\Controllers");

$router->get("/login",                  "LoginController:login",            "auth.login");
$router->post("/login",                 "LoginController:authentication",   "auth.authentication");
$router->get("/logout",                 "LoginController:logout",           "auth.logout");

$router->get("/",                       "HomeController:index",             "home.index");
$router->get("/products",               "ProductController:index",          "product.index");
$router->post("/products/import",       "ProductController:import",         "product.import");
$router->get("/products/delete/{id}",   "ProductController:destroy",        "product.destroy");

$router->dispatch();
?>