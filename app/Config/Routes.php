<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Page::home');
$routes->get('login', 'Page::login');
$routes->get('register', 'Page::register');
$routes->get('dashboard', 'Page::dashboard');

$routes->get('api/me', 'AuthController::me');


$routes->post('api/register', 'AuthController::register');
$routes->post('api/login', 'AuthController::login');
$routes->post('api/logout', 'AuthController::logout');
