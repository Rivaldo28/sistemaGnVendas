<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/produto', 'HomeController@product');
$router->get('/compra', 'HomeController@compra');
$router->get('/gerencianet', 'HomeController@gerencianet');


$router->get('/novo', 'ProdutosController@add');
$router->post('/novo', 'ProdutosController@addAction');

$router->get('/produto/{id}/editar', 'ProdutosController@edit');
$router->post('/produto/{id}/editar', 'ProdutosController@editAction');

$router->get('/produto/{id}/excluir', 'ProdutosController@del');

$router->get('/nova/compra', 'ComprasController@addCompra');
$router->post('/nova/compra', 'ComprasController@addActionCompra');

$router->get('/compra/{id}/editar', 'ComprasController@editCompra');
$router->post('/compra/{id}/editar', 'ComprasController@editActionCompra');

$router->get('/compra/{id}/excluir', 'ComprasController@delCompra');
/**/