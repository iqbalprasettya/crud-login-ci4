<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// set default controller

// register
$routes->get('/', 'Register::index', ['filter' => 'guestFilter']);
$routes->get('/register', 'Register::index', ['filter' => 'guestFilter']);
$routes->post('/register', 'Register::register', ['filter' => 'guestFilter']);

// login
$routes->get('/login', 'Login::index', ['filter' => 'guestFilter']);
$routes->post('/login', 'Login::auth', ['filter' => 'guestFilter']);

// logout
$routes->get('/logout', 'Login::logout', ['filter' => 'authFilter']);

$routes->get('/employee', 'Employee::index', ['filter' => 'authFilter']);
$routes->get('/employee/edit/(:num)', 'Employee::edit/$1', ['filter' => 'authFilter']);

$routes->post('/employee', 'Employee::add', ['filter' => 'authFilter']);
$routes->post('/employee/update/', 'Employee::update', ['filter' => 'authFilter']);
$routes->get('/employee/hapus/(:any)', 'Employee::hapus/$1', ['filter' => 'authFilter']);
