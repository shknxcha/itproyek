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
$routes->get('/login', 'Login::index');

$routes->get('/dataProfil', 'Profil::index');
$routes->post('/edit/(:num)', 'Profil::updateProfil/$1');
$routes->get('/edit/(:num)', 'Profil::edit/$1');
$routes->post('/hapusProfil/(:num)', 'Profil::hapusProfil/$1');

$routes->get('/pesanan', 'Pesanan::index');
$routes->get('/tambahPesan', 'Pesanan::formTambah');
$routes->post('/prosesPesan', 'Pesanan::prosesTambah');
$routes->get('/pesanan/edit/(:num)', 'Pesanan::edit/$1');
$routes->post('/pesanan/update/(:num)', 'Pesanan::updatePesanan/$1');
$routes->get('/pesanan/delete/(:num)', 'Pesanan::hapusPesanan/$1');

$routes->get('/tambahproduk', 'Produk::index');
$routes->post('/prosesproduk', 'Produk::tambahproduk');
$routes->get('/lihatproduk', 'Produk::lihatproduk');
$routes->post('/editproduk/(:num)', 'Produk::updateProduk/$1');
$routes->get('/hapusproduk/(:num)', 'Produk::hapusProduk/$1');
$routes->get('/login', 'Login::login');

// untuk akun
$routes->get('/akun', 'Akun::index');
$routes->get('/regist', 'Akun::register');
$routes->post('/prosesregist', 'Akun::create');
$routes->get('/akun/edit/(:num)', 'Akun::edit/$1');
$routes->post('/akun/update/(:num)', 'Akun::update/$1');

// untuk data testimoni
$routes->get('/testimoni', 'Testimoni::index');
$routes->get('/createTestimoni', 'Testimoni::formcreate');
$routes->post('/storeTesti', 'Testimoni::store');
$routes->get('/testimoni/edit/(:num)', 'Testimoni::edit/$1');
$routes->put('/testimoni/update/(:num)', 'Testimoni::update/$1');
$routes->delete('/testimoni/delete/(:num)', 'Testimoni::delete/$1');