<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');

$routes->get('/users', 'Admin\Users::index');
$routes->get('/comic', 'Comic::index');
$routes->get('/comic/index', 'Comic::index');
$routes->get('/comic/detail/(:segment)', 'Comic::detail/$1');