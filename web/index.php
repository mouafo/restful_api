<?php

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// ... definitions
// MariaDB > user:rest, passwd:happy little api

// Routes
$app->get('/', function () {
    return false;
});

$app->get('/users/{id}', function (Silex\Application $app, $id) {
    return 'Route: /users/' . [$id];
});

$app->get('/user/{id}', function (Silex\Application $app, $id) {
    return 'Route: /user/' . [$id];
});

// Start application on the last line
$app->run();

?>
