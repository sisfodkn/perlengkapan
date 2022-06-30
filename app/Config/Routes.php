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
$routes->get("/data-pegawai", "DataUtama\PegawaiController::index", ["filter" => "auth"]);
$routes->get("/input-pegawai", "DataUtama\PegawaiController::add", ["filter" => "auth"]);
$routes->get("/input-pegawai/(:any)", "DataUtama\PegawaiController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-pegawai', 'DataUtama\PegawaiController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-pegawai/(:any)', 'DataUtama\PegawaiController::save/$1', ["filter" => "auth"]);

// Data Jabatan
$routes->get("/data-jabatan", "DataUtama\JabatanController::index", ["filter" => "auth"]);
$routes->get("/input-jabatan", "DataUtama\JabatanController::add", ["filter" => "auth"]);
$routes->get("/input-jabatan/(:any)", "DataUtama\JabatanController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-jabatan', 'DataUtama\JabatanController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-jabatan/(:any)', 'DataUtama\JabatanController::save/$1', ["filter" => "auth"]);

// Data Unit Kerja
$routes->get("/data-unit", "DataUtama\UnitController::index", ["filter" => "auth"]);
$routes->get("/input-unit", "DataUtama\UnitController::add", ["filter" => "auth"]);
$routes->get("/input-unit/(:any)", "DataUtama\UnitController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-unit', 'DataUtama\UnitController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-unit/(:any)', 'DataUtama\UnitController::save/$1', ["filter" => "auth"]);

// Data Sub Unit Kerja
$routes->get("/data-subunit", "DataUtama\SubUnitController::index", ["filter" => "auth"]);
$routes->get("/input-subunit", "DataUtama\SubUnitController::add", ["filter" => "auth"]);
$routes->get("/input-subunit/(:any)", "DataUtama\SubUnitController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-subunit', 'DataUtama\SubUnitController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-subunit/(:any)', 'DataUtama\SubUnitController::save/$1', ["filter" => "auth"]);

// Data ATK
$routes->get("/data-atk", "DataUtama\AtkController::index", ["filter" => "auth"]);
$routes->get("/input-atk", "DataUtama\AtkController::add", ["filter" => "auth"]);
$routes->get("/input-atk/(:any)", "DataUtama\AtkController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-atk', 'DataUtama\AtkController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-atk/(:any)', 'DataUtama\AtkController::save/$1', ["filter" => "auth"]);

// Permintaan ATK
$routes->get("/pengadaan-atk", "PengadaanAtkController::index", ["filter" => "auth"]);
$routes->get("/pengadaan-cetakan", "PengadaanCetakanController::index", ["filter" => "auth"]);

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
