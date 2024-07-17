<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/registrarForm', 'Home::registrarForm');
$routes->post('/recebaDados', 'Home::recebaDados');
