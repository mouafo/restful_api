<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

// Doctrine DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'     => 'localhost',
        'dbname'   => 'restful_api',
        'user'     => 'rest',
        'password' => 'happy little api'
    )
));


// Routes
$app->get('/', function () use ($app) {
    return new Response('', 200);
});

$app->get('/users/{id}', function ($id) use ($app) {
    $query = "SELECT * FROM user WHERE id = $id";
    $user = $app['db']->fetchAssoc($query, array((int) $id));

    return $app->json($user);
})->assert('id', '\d+');

$app->get('/user/{id}', function ($id) use ($app) {
    $query = "SELECT * FROM user WHERE id = $id";
    $user = $app['db']->fetchAssoc($query, array((int) $id));

    return $app->json($user);
})->assert('id', '\d+');



// Start application on the last line
$app->run();