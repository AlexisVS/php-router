<?php

namespace Router;

// Home
$router->register('/', ['Controllers\HomeController', 'index']);

// Users
$router->register('/users', ['Controllers\UserController', 'index']);
$router->register('/users/create', ['Controllers\UserController', 'create']);
$router->register('/users/store', ['Controllers\UserController', 'store']);
