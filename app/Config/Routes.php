<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);

$routes->get('/', 'SigninController::index');
$routes->get('/signin', 'SigninController::index');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/logout', 'SigninController::logout');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
// $routes->get('/', 'Home::index');
