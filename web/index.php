<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// ... definitions
// MariaDB > user:rest, passwd:happy little api

// Routes
$app->get('/', function () {
    return new Response('', 200);
});

$app->get('/users/{id}', function (Silex\Application $app, $id) {
    return 'Route: /users/' . [$id];
});

$app->get('/user/{id}', function (Silex\Application $app, $id) {
    return 'Route: /user/' . [$id];
});

// POST exemple
$app->post('/post/form', function (Request $request) {
    $message = $request->get('message');
    mail('feedback@yoursite.com', '[YourSite] Feedback', $message);

    return new Response('Thank you for your feedback!', 201);
});


// Start application on the last line
$app->run();

?>
