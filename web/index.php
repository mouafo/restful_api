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


// Etape 1
$app->get('/', function () use ($app) {
    return new Response('', 200);
});


// Etape 2 + 3
$app->get('/user/{id}', function ($id) use ($app) {
    $query = 'SELECT id, lastname, firstname, email, role FROM user WHERE id = :id';
    $user = $app['db']->fetchAssoc($query, array('id'=> (int) $id));

    if ($user == false)
        return new Response(
            json_encode(array('status' => 404, 'message' => 'Not Found')),
            404,
            ['Content-type' => 'application/json']
        );

    if ($user['role'] == 'admin')
    {
        return new Response(
            json_encode(array('status' => 401, 'message' => 'Unauthorized')),
            401,
            ['Content-type' => 'application/json']
        );
    }
    return $app->json($user);
})->assert('id', '\d+');

$app->get('/users/{id}', function ($id) use ($app) {
    return new RedirectResponse('/user/'.$id);
})->assert('id', '\d+');

$app->get('/user/', function () use ($app) {
    return $app->json();
});

$app->get('/users/', function () use ($app) {
    return $app->json();
});


// Etape 4
$app->get('/search/users/', function (Request $request) use ($app) {
    $email = $request->get('q');

    if (isset($email)) {
        $query = "SELECT lastname, firstname, email, password, role FROM user u WHERE u.email = '$email'";
        $user = $app['db']->fetchAssoc($query, array($email));
    }

    if ($user == False)
        return new Response(
            json_encode(array('status' => 404, 'message' => 'Not Found')),
            404,
            ['Content-type' => 'application/json']
        );

    return $app->json(array($user));
});


// Etape 3 - any error server side
$app->error(function(\Exception $e) use ($app) {
    return new Response(
        json_encode(array('status' => 500, 'message' => 'Internal Server Error')),
        500,
        ['Content-type' => 'application/json']
    );

});


// Start application on the last line
$app->run();