<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cuba/index','Cuba::index');
$routes->get('/cuba/about','Cuba::about');
$routes->get('/cuba/about/(:any)','Cuba::about/$1');
$routes->get('/cuba/(:any)','Cuba::about/$1');

$routes->get('/users','Admin\Users::index');