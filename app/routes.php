<?php

$router->get('/', 'HomeController@index');
$router->post('/', 'HomeController@createUser');
$router->get('/user', 'HomeController@user');
$router->post('/delete-user', 'HomeController@deleteUser');
$router->post('/user-detail', 'HomeController@userDetail');
