<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
//$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
//$routes->setDefaultController('UserController');

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');

$routes->get('/register','userController::index');//menampilkan halaman daftar user
$routes->post('/register/store','userController::store');//memanggil fungsi daftar user
//lOGIN
$routes->get('/login','LoginController::index');//menampilkan halaman login
$routes->post('login/auth','LoginController::auth');//memanggil fungsi login

$routes->get('logout','LoginController::logout');//LOGOUT




$routes->get('/admin','AdminController::index',['filter'=>'noauth:admin']);//masuk kehalaman Admin
$routes->get('/admin/index','AdminController::index',['filter'=>'noauth:admin']);
// $routes->get('/dashboard','Dashboard::index',['filter'=>'auth']);

$routes->get('admin/detail/(:num)','AdminController::detail/$1');//menampilkan detai 1 user id
$routes->post('update/user/','AdminController::update'); //Edit Data user
$routes->get('admin/delete/(:num)','AdminController::delete/$1');//Hapus Data Akun Pengguna

$routes->get('kamar','kamarController::index');//tampilan manajemen data kamar

$routes->post('/kamar/input','kamarController::input');// fungsi tambah data kamar
$routes->post('/kamar/update','kamarController::update');//fungsi edit data kamar
$routes->post('/kamar/delete','kamarController::delete');//fungsi Delete data Kamar

$routes->get('pembayaran','pembayaranController::index');//tampil Manajemen Data Pembayaran
$routes->post('/pembayaran/input','pembayaranController::input');//memanggil fungsi tambah metode pembayaran
$routes->post('/pembayaran/update', 'pembayaranController::update');

$routes->get('/pembayaran/delete/(:num)','pembayaranController::delete/$1');//memanggil fungsi hapus data metode pembayaran

$routes->get('/user','userController::user');//masuk kehalaman user
$routes->post('user/update','userController::update');

$routes->get('transaksi','ChekinController::index');//tampilkan transaksi kamar 
$routes->post('transaks/input','ChekinController::input');//memasukkan input data pesan kamar
$routes->post('transaksi/delete','ChekinController::delete');//fungsi Delete data Transaksi


$routes->get('cetakfaktur','PDFController::index');//tampilkan Cetak Faktur 
$routes->get('/pdf/cetak', 'PDFController::cetak'); //membuat cetak printer faktur
$routes->get('/pdf/cetak/(:num)','PDFController::cetak/$1');

//konfirmasi pembayaran
$routes->get('konfirmasi','KonfirmasiController::index');
$routes->post('/konfirmasi/input','KonfirmasiController::input');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
