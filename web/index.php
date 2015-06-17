<?php

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// ... definitions

$app->get('/', function () {
    $output = 'boop';
    return $output;
});

// Start application on the last line
$app->run();

?>