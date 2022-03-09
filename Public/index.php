<?php

// use Router\Router;

use Router\Router;
use Source\App;

require './../vendor/autoload.php';

// Definit ou est le dossier des views
define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
// On invoque le routeur
$router = new Router();

// on enregistre la route dans la variable route du router
$router->register('/', ['Controllers\HomeController', 'index']);

// // on enregistre la route dans la variable route du router
// $router->register('/contact', function () {
//   return 'ContactPage';
// });

(new App($router, $_SERVER['REQUEST_URI']))->run();
