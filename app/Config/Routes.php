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

$routes->get('/employee', 'Employee::index');
$routes->get('/employee/edit/(:num)', 'Employee::edit/$1');

$routes->post('/employee/add', 'Employee::add');
$routes->post('/employee/update/', 'Employee::update');
$routes->get('/employee/hapus/(:any)', 'Employee::hapus/$1');
