<?php

/** @var \PHPFramework\Application $app */

use App\Controllers\HomeController;

$app->router->add('/', function (){
        return 'Hello World!';
    }, ['GET', 'post']);

    $app->router->get('/test', [HomeController::class, 'test']);
    $app->router->get('/test/(?P<slug>[a-z0-9-]+)/?', function(){
        return 'Hello Slug! ';
    });
    $app->router->post('/test2/', [HomeController::class, 'test2']);
