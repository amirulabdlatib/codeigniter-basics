<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');

$routes->get('/users', 'Admin\Users::index');
$routes->get('/comic', 'Comic::index');
$routes->get('/comic/index', 'Comic::index');
$routes->get('/comic/create', 'Comic::create');
$routes->delete('/comic/delete/(:num)', 'Comic::delete/$1');
$routes->get('/comic/detail/(:any)', 'Comic::detail/$1');
$routes->get('/comic/edit/(:num)', 'Comic::edit/$1');
$routes->put('/comic/update/(:num)', 'Comic::update/$1');
