<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// --- Autentikasi ---
$routes->get('login', 'Auth::login');
$routes->post('login/attempt', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');

$routes->get('/', 'Home::index');

$routes->get('aquascape', 'Aquascape::index');
$routes->get('aquascape/create', 'Aquascape::create');
$routes->post('aquascape/save', 'Aquascape::save');
$routes->get('aquascape/edit/(:num)', 'Aquascape::edit/$1');
$routes->post('aquascape/update/(:num)', 'Aquascape::update/$1');
$routes->get('aquascape/delete/(:num)', 'Aquascape::delete/$1');