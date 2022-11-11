<?php
require_once './libs/router.php';
require_once './app/controllers/garden-api.controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('garden', 'GET', 'gardencontroller', 'getgardens');
$router->addRoute('garden/:ID', 'GET', 'gardencontroller', 'getgarden');
$router->addRoute('garden/:ID', 'DELETE', 'gardencontroller', 'deletegarden');
$router->addRoute('garden', 'POST', 'gardencontroller', 'insertgarden'); 
// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
