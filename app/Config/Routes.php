<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');

//Produk
$routes->get('/produk/produk', 'Produk::index');
$routes->post('/produk/produk/create', 'Produk::create');
$routes->get('/produk/produk/edit/(:segment)', 'Produk::edit/$1');
$routes->post('/produk/produk/update/(:segment)', 'Produk::update/$1');
$routes->post('/produk/produk/delete/(:segment)', 'Produk::delete/$1');

//kategori
$routes->get('/produk/kategori', 'Kategori::index');
$routes->post('/produk/kategori/create', 'Kategori::create');
$routes->get('/produk/kategori/edit/(:segment)', 'Kategori::edit/$1');
$routes->post('/produk/kategori/update/(:segment)', 'Kategori::update/$1');
$routes->post('/produk/kategori/delete/(:segment)', 'Kategori::delete/$1');
$routes->get('/produk/kategori/produkByKategori/(:num)', 'Kategori::produkByKategori/$1');

//Supplier
$routes->get('/produk/supplier', 'Supplier::index');
$routes->post('/produk/supplier/create', 'Supplier::create');
$routes->get('/produk/supplier/edit/(:segment)', 'Supplier::edit/$1');
$routes->post('/produk/supplier/update/(:segment)', 'Supplier::update/$1');
$routes->post('/produk/supplier/delete/(:segment)', 'Supplier::delete/$1');

//Pembelian
$routes->get('/transaksi/pembelian', 'Pembelian::index');
$routes->post('/transaksi/pembelian/create', 'Pembelian::create');
$routes->get('/transaksi/pembelian/edit/(:segment)', 'Pembelian::edit/$1');
$routes->post('/transaksi/pembelian/update/(:segment)', 'Pembelian::update/$1');
$routes->post('/transaksi/pembelian/delete/(:segment)', 'Pembelian::delete/$1');

// Pelanggan
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->post('/pelanggan/create', 'Pelanggan::create');
$routes->get('/pelanggan/edit/(:segment)', 'Pelanggan::edit/$1');
$routes->post('/pelanggan/update/(:segment)', 'Pelanggan::update/$1');
$routes->post('/pelanggan/delete/(:segment)', 'Pelanggan::delete/$1');


$routes->get('/penjualan', 'Penjualan::index');
$routes->get('/penjualan/create', 'Penjualan::create');
$routes->post('/penjualan/store', 'Penjualan::store');
$routes->get('/penjualan/edit/(:num)', 'Penjualan::edit/$1');
$routes->post('/penjualan/update/(:num)', 'Penjualan::update/$1');
$routes->post('/penjualan/delete/(:num)', 'Penjualan::delete/$1');
$routes->get('/penjualan/bayar/(:segment)', 'Penjualan::bayar/$1');
$routes->post('/penjualan/proses_pembayaran/(:segment)', 'Penjualan::proses_pembayaran/$1');
$routes->post('/penjualan/bayar/(:segment)', 'Penjualan::bayar/$1');
$routes->post('/penjualan/proses_pembayaran/(:segment)', 'Penjualan::proses_pembayaran/$1');


$routes->get('/laporan', 'Laporan::index'); // Menampilkan semua laporan
$routes->get('/laporan/create/(:num)', 'Laporan::create/$1'); // Form untuk membuat laporan
$routes->post('/laporan/store', 'Laporan::store'); // Menyimpan laporan
$routes->get('/laporan/show/(:num)', 'Laporan::show/$1'); // Menampilkan detail laporan


// Halaman Registrasi
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::storeRegister');

// Halaman Login
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authenticate');

// Logout
$routes->get('/logout', 'AuthController::logout');



