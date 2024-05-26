<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Admin::index');
$routes->get('/dataProfil', 'Profil::index');
$routes->get('/tambahProfil', 'Profil::tambahProfil');