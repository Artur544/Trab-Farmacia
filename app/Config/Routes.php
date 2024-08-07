<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes 
 */
$routes->get('/', 'Home::listarDados');
$routes->get('/registraForm', 'Home::registraForm');
$routes->post('/recebaDados', 'Home::recebaDados');
$routes->get('/listarDados', 'Home::listarDados');
$routes->post('/remover', 'Home::removerDados');
$routes->get('/formupdate/(:num)', 'Home::editarDados/$1');
$routes->post('/update','Home::atualizaDados');
$routes->post('/pesquisar','Home::pesquisa');
$routes->post('/filtrar','Home::filtrar');