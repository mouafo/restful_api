<?php

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// ... definitions

// Routes
$app->get('/', function () {
    return false;
});

// Start application on the last line
$app->run();

?>
