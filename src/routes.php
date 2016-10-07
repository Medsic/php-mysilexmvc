<?php

$app->get('/users/list', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newAction')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');

$app->get('/addresses/list', 'App\Addresses\Controller\AddressController::listAction')->bind('address.list');
$app->get('/addresses/edit/{id}', 'App\Addresses\Controller\AddressController::editAction')->bind('address.edit');
$app->get('/addresses/new', 'App\Addresses\Controller\AddressController::newAction')->bind('address.new');
$app->post('/addresses/delete/{id}', 'App\Addresses\Controller\AddressController::deleteAction')->bind('address.delete');
$app->post('/addresses/save', 'App\Addresses\Controller\AddressController::saveAction')->bind('address.save');
