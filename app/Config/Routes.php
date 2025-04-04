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


$routes->get('/', 'Dashboard::index');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::register');
$routes->get('scan/(:num)', 'Scan::index/$1');
$routes->get('qrcode', 'QrCode::index');
$routes->get('qrcode/create', 'QrCode::create');
$routes->post('qrcode/store', 'QrCode::store');
