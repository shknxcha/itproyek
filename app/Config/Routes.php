<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/profil', 'Home::profil');
$routes->get('/galeri', 'Home::galeri');
$routes->get('/informasi', 'Home::informasi');
$routes->get('/testimoni', 'Home::testimoni');
$routes->get('/dashboard', 'Admin::index');
$routes->get('/dataProfil', 'Profil::index');
$routes->get('/tambahProfil', 'Profil::saveProfil');
$routes->post('/hapusProfil/(:num)', 'Profil::hapusProfil/$1');