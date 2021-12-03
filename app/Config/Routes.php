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
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/maylib', 'Home::index_login');
$routes->get('/about', 'Home::about');
$routes->get('/show_result/(:any)', 'Home::show_result/$1');
$routes->get('/buku/list', 'Buku::list', ['filter' => 'permission:manage-book']);
$routes->get('/buku/anggota', 'Anggota::index', ['filter' => 'role:staff']);
$routes->get('/buku/dashboard', 'Buku::index', ['filter' => 'role:staff']);
$routes->get('/buku/histori_all', 'Buku::histori', ['filter' => 'role:staff']);
$routes->get('/mybook/qrcode_loan', 'Peminjaman::qrcode');
$routes->get('/admin/dashboard', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/userlist', 'Admin::userlist', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/anggota/detail/(:any)/(:any)', 'Anggota::detail_anggota/$1/$2', ['filter' => 'role:staff']);
$routes->get('/detail-buku/(:any)', 'Anggota::detail_buku/$1', ['filter' => 'role:staff']);
$routes->get('/notif', 'Notif::index');
$routes->post('/notif/detail/(:num)', 'Notif::detail/$1');
$routes->get('/buku/pushNotif', 'PushNotif::index', ['filter' => 'role:staff']);
$routes->get('/buku/poin', 'Poin::index', ['filter' => 'role:staff']);
$routes->get('/buku/absensi', 'Poin::add', ['filter' => 'role:staff']);
$routes->post('/truncate_poin', 'Poin::delete', ['filter' => 'role:staff']);
$routes->post('/absensi', 'Poin::store', ['filter' => 'role:staff']);
$routes->post('/searchBook', 'Search::index');
$routes->post('/show_more/(:any)', 'Home::show_more/$1');
$routes->post('/mybook/qrcode_loan', 'Peminjaman::qrcode_confirm');
$routes->post('/pinjam', 'Peminjaman::store', ['filter' => 'role:user']);
$routes->post('/konfirm', 'Peminjaman::update_loan', ['filter' => 'role:staff']);
$routes->post('/konfirm_return', 'Peminjaman::update_return', ['filter' => 'role:staff']);
$routes->post('/searchCode', 'Konfirmasi::search_code', ['filter' => 'role:staff']);
$routes->post('/searchCode_return', 'Pengembalian::search_code', ['filter' => 'role:staff']);
$routes->post('/qrcode', 'GenerateQrcode::index', ['filter' => 'role:user']);
$routes->post('/qrcode_user', 'GenerateQrcode::user', ['filter' => 'role:user']);
$routes->post('/qrcode_book', 'GenerateQrcode::qrcode_book', ['filter' => 'role:staff']);
$routes->post('/qrcodeConfirm', 'Konfirmasi::qr_code_confirm', ['filter' => 'role:staff']);
$routes->post('/pushNotif', 'PushNotif::send', ['filter' => 'role:staff']);
$routes->post('/pushAll', 'PushNotif::pushall', ['filter' => 'role:staff']);

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
