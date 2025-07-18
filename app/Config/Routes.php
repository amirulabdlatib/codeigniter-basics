<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');

$routes->get('/users', 'Admin\Users::index');
$routes->get('/comic/(:segment)','Comic::detail/$1');