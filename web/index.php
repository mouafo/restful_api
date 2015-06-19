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
        'dbname'   => 'rest',
        'user'     => 'rest',
        'password' => 'happy little api'
    )
));



// Routes
$app->get('/', function () {
    $db = var_dump($app['db']);
    return new Response($db, 200);
});

$app->get('/users/{id}', function ($id) use ($app) {
    $sql = "SELECT * FROM user WHERE id = ?";
    $user = $app['db']->fetchAssoc($sql, array((int) $id));

    return $app->json($user);

})->assert('id', '\d+');


$app->get('/user/{id}', function ($id) {
    return 'Route: /user/{id}';
});



// Start application on the last line
$app->run();