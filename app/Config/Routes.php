<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->setAutoRoute(true);
$routes->get('/komik/create', 'komik::create');
$routes->get('/komik/save', 'komik::save');
$routes->get('/komik/(:segment)', 'komik::detail/$1');