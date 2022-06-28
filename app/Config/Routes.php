<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Users
$routes->match(['get', 'post'], 'login', 'UsersController::login', ["filter" => "noauth"]);
$routes->get("/", "HomeController::index", ["filter" => "auth"]);
$routes->get('logout', 'UsersController::logout');

// Data Pegawai
$routes->get("/data-pegawai", "PegawaiController::index", ["filter" => "auth"]);

// Data Jabatan
$routes->get("/data-jabatan", "JabatanController::index", ["filter" => "auth"]);
$routes->get("/input-jabatan", "JabatanController::add", ["filter" => "auth"]);
$routes->get("/input-jabatan/(:any)", "JabatanController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-jabatan', 'JabatanController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-jabatan/(:any)', 'JabatanController::save/$1', ["filter" => "auth"]);

// Data Unit Kerja
$routes->get("/data-unit", "UnitController::index", ["filter" => "auth"]);
$routes->get("/input-unit", "UnitController::add", ["filter" => "auth"]);
$routes->get("/input-unit/(:any)", "UnitController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-unit', 'UnitController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-unit/(:any)', 'UnitController::save/$1', ["filter" => "auth"]);

// Data ATK
$routes->get("/data-atk", "AtkController::index", ["filter" => "auth"]);
$routes->get("/input-atk", "AtkController::add", ["filter" => "auth"]);
$routes->get("/input-atk/(:any)", "AtkController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-atk', 'AtkController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-atk/(:any)', 'AtkController::save/$1', ["filter" => "auth"]);

// Data ATK
$routes->get("/permintaan-atk", "PengadaanAtkController::permintaan", ["filter" => "auth"]);
$routes->get("/riwayat-atk", "PengadaanAtkController::index", ["filter" => "auth"]);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
