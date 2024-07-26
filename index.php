<?php

require __DIR__ . '/vendor/autoload.php';

ini_set('error_log', __DIR__ . '/logs/custom-error.log');

use App\Controllers\AccountController;
use App\Controllers\AuthController;
use App\Controllers\MainController;
use App\DependencyContainer;
use App\RouteHandler;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

DependencyContainer::initializeDependencies();

$routes = [
    [
        'route' => '/',
        'aliases' => ['/home'],
        'controller' => [MainController::class,'index']
    ],
    [
        'route' => '/login',
        'controller' => [AuthController::class,'login'],
    ],
    [
        'route' => '/login',
        'controller' => [AuthController::class,'processLogin'],
        'method' => 'POST'
    ],
    [
        'route' => '/register',
        'controller' => [AuthController::class,'register']
    ],
    [
        'route' => '/register',
        'controller' => [AuthController::class,'processRegister'],
        'method' => 'POST'
    ],
    [
        'route' => '/logout',
        'controller' => [AuthController::class,'logout'],
        'auth' => true
    ],
    [
        'route' => '/account',
        'controller' => [AccountController::class,'profile'],
        'auth' => true
    ]
];

$routeHandler = new RouteHandler($routes);

$routeHandler->handleRoute();

clearFlashMessages();
clearOldFields();
clearValidationErrors();
