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