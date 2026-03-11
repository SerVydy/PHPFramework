<?php

/** @var \PHPFramework\Application $app */

use App\Controllers\HomeController;

$app->router->get('/', [HomeController::class, 'index']);

    $app->router->get('/test', [HomeController::class, 'test']);
    $app->router->get('/test/(?P<slug>[a-z0-9-]+)/?', function(){
        return 'Hello Slug! ';
    });
    $app->router->get('/test2/', [HomeController::class, 'test2']);
