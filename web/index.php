<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

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


$app->get('/user/{id}', function ($id) use ($app) {
    $query = 'SELECT * FROM user WHERE id = :id';
    $user = $app['db']->fetchAssoc($query, array('id'=> (int) $id));

    if ($user == false)
        return $app->json(array('status' => 404, 'message' => 'Not Found'));
    if ($user['role'] == 'admin')
        return $app->json(array('status' => 401, 'message' => 'Unauthorized'));

    return $app->json($user);
})->assert('id', '\d+');


$app->get('/users/{id}', function ($id) use ($app) {
    return new RedirectResponse('/user/'.$id);
})->assert('id', '\d+');


$app->get('/search/users', function (Request $request) use ($app) {
    $email = $request->get('q');
//    die($email);
    $query = "SELECT * FROM user u WHERE u.email = $email";
    $user = $app['db']->fetchAssoc($query, array($email));

    return array($app->json($user));
});



// Catch non-existing routes
$app->error(function() use ($app) {
    return $app->json(array('status' => 500, 'message' => 'Internal Error'));
});


// Start application on the last line
$app->run();
