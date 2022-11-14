<?php
require_once './libs/router.php';
require_once './app/controllers/gardencontroller.php';

// crea el router
$router = new Router();

//tabla de ruteo
//obtengo todos los elementos de la base de datos
$router->addRoute('garden', 'GET', 'gardencontroller', 'getgardens'); 

//obtengo el producto con id deseado
$router->addRoute('garden/:ID', 'GET', 'gardencontroller', 'getgarden');

// borro un producto con un id determinado
$router->addRoute('garden/:ID', 'DELETE', 'gardencontroller', 'deletegarden');

//agrego un producto nuevo 
$router->addRoute('garden', 'POST', 'gardencontroller', 'insertgarden'); 

// actualizo una planta
$router->addRoute('garden/:ID','PUT','gardencontroller','updategarden');

// ejecuta la ruta (sea cual sea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
