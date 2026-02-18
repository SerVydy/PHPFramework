<?php

/** @var \PHPFramework\Application $app */

use App\Controllers\HomeController;

$app->router->add('/', function (){
        return 'Hello World!';
    }, ['GET', 'post']);

    $app->router->get('/test', [HomeController::class, 'test']);
    $app->router->post('/contact/', [HomeController::class, 'test2']);

    $app->router->get('/posts/(?P<slug>[a-z0-9-]+)/?', [HomeController::class, 'post']);

    // dump($app->router->getRoutes());