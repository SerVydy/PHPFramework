<?php

use PHPFramework\Application;

function app(): Application
 {
    return Application::$app;
 }

function request(): \PHPFramework\Request
{
    return app()->request;
 }

 function response(): \PHPFramework\Response
 {
     return app()->response;
 }

 function view($view = '', $data = [], $layout = '') :string|\PHPFramework\View
 {
     if($view)
     {
         return app()->view->render($view, $data, $layout);
     }
     return app()->view;
 }

 function abort($error = '', $code = 404 )
 {
     response()->setResponseCode($code);
     echo view("errors/{$code}", ['error' => $error], false);
     die();
 }