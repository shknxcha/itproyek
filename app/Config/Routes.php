<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/profil', 'Home::profil');
$routes->get('/galeri', 'Home::galeri');
$routes->get('/informasi', 'Home::informasi');
$routes->get('/testi', 'Home::testimoni');
$routes->get('/dashboard', 'Admin::index');
$routes->get('/dataProfil', 'ProfilController::index');
$routes->get('/tambahProfil', 'Profil::saveProfil');
$routes->post('/hapusProfil/(:num)', 'Profil::hapusProfil/$1');
$routes->get('/pesanan', 'Pesanan::index');
$routes->get('/pesanan/create', 'Pesanan::create');
$routes->post('/pesanan/store', 'Pesanan::store');
$routes->get('/pesanan/edit/(:num)', 'Pesanan::edit/$1');
$routes->post('/pesanan/update/(:num)', 'Pesanan::update/$1');
$routes->get('/pesanan/delete/(:num)', 'Pesanan::delete/$1');
$routes->get('/tambahproduk', 'Produk::index');
$routes->post('/prosesproduk', 'Produk::tambahproduk');
$routes->get('/lihatproduk', 'Produk::lihatproduk');
$routes->post('/editproduk/(:num)', 'Produk::updateProduk/$1');
$routes->get('/hapusproduk/(:num)', 'Produk::hapusProduk/$1');
$routes->get('/login', 'Login::login');

// untuk akun
$routes->get('/akun', 'Akun::akun');
$routes->get('/akun/create', 'Akun::create');
$routes->post('/akun/store', 'Akun::store');
$routes->get('/akun/edit/(:num)', 'Akun::edit/$1');
$routes->put('/akun/update/(:num)', 'Akun::update/$1');
$routes->delete('/akun/delete/(:num)', 'Akun::delete/$1');

// untuk data testimoni
$routes->get('/testimoni', 'Testimoni::testimoni');
$routes->get('/testimoni/create', 'Testimoni::create');
$routes->post('/testimoni/store', 'Testimoni::store');
$routes->get('/testimoni/edit/(:num)', 'Testimoni::edit/$1');
$routes->put('/testimoni/update/(:num)', 'Testimoni::update/$1');
$routes->delete('/testimoni/delete/(:num)', 'Testimoni::delete/$1');