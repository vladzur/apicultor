<?php

require __DIR__ . '/vendor/autoload.php';

$api = new Vladzur\Apicultor\Apicultor;
$api->router->get('/resource', 'ResourceController::index');
$api->router->get('/resource/{id}', 'ResourceController::read');
$api->router->post('/resource', 'ResourceController::create');
$api->router->put('/resource/{id}', 'ResourceController::edit');

$api->run();