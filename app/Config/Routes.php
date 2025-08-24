<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/productos', 'ProductosControlador::index');
$routes->get('/productos/crear', 'ProductosControlador::crear');
$routes->post('/productos/guardar', 'ProductosControlador::guardar');
$routes->get('/productos/eliminar/(:num)', 'ProductosControlador::eliminar/$1');
$routes->get('/productos/editar/(:num)', 'ProductosControlador::editar/$1');
$routes->post('/productos/actualizar', 'ProductosControlador::actualizar');
