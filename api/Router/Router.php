<?php

$router->get('/home', 'home@index');

$router->get('/read', 'home@customerCode');

$router->post('/store', 'home@store');

// If you use SPACE in the url, it should convert the space to -, /home-index
$router->get('/home index', 'home@index');

$router->post('/upload', 'home@uploadImage');

$router->post('/home', 'home@post');

$router->get('/:name', function($param) {
    echo 'Welcome '. $param['name'];
});
