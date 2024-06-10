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
$routes->get('/pesanan', 'Pesanan::index');
$routes->get('/pesanan/create', 'Pesanan::create');
$routes->post('/pesanan/store', 'Pesanan::store');
$routes->get('/pesanan/edit/(:num)', 'Pesanan::edit/$1');
$routes->post('/pesanan/update/(:num)', 'Pesanan::update/$1');
$routes->get('/pesanan/delete/(:num)', 'Pesanan::delete/$1');