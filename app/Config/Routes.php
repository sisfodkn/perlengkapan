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
$routes->match(['get', 'post'], 'login', 'DataUtama\UsersController::login', ["filter" => "noauth"]);
$routes->get("/", "HomeController::index", ["filter" => "auth"]);
$routes->get('logout', 'DataUtama\UsersController::logout');

// Struktur Anggaran
$routes->get("/anggaran-umum", "AnggaranController::umum", ["filter" => "auth"]);
$routes->get("/anggaran-dipa", "AnggaranController::dipa", ["filter" => "auth"]);
$routes->get("/realisasi-anggaran", "AnggaranController::realisasi", ["filter" => "auth"]);

// Data Pegawai
$routes->get("/data-pegawai", "DataUtama\PegawaiController::index", ["filter" => "auth"]);
$routes->get("/input-pegawai", "DataUtama\PegawaiController::add", ["filter" => "auth"]);
$routes->get("/input-pegawai/(:any)", "DataUtama\PegawaiController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-pegawai', 'DataUtama\PegawaiController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-pegawai/(:any)', 'DataUtama\PegawaiController::save/$1', ["filter" => "auth"]);
$routes->get("/delete-pegawai/(:any)", "DataUtama\PegawaiController::delete/$1", ["filter" => "auth"]);
// Data Jabatan
$routes->get("/data-jabatan", "DataUtama\JabatanController::index", ["filter" => "auth"]);
$routes->get("/input-jabatan", "DataUtama\JabatanController::add", ["filter" => "auth"]);
$routes->get("/input-jabatan/(:any)", "DataUtama\JabatanController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-jabatan', 'DataUtama\JabatanController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-jabatan/(:any)', 'DataUtama\JabatanController::save/$1', ["filter" => "auth"]);
$routes->get("/delete-jabatan/(:any)", "DataUtama\JabatanController::delete/$1", ["filter" => "auth"]);
// Data Unit Kerja
$routes->get("/data-unit", "DataUtama\UnitController::index", ["filter" => "auth"]);
$routes->get("/input-unit", "DataUtama\UnitController::add", ["filter" => "auth"]);
$routes->get("/input-unit/(:any)", "DataUtama\UnitController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-unit', 'DataUtama\UnitController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-unit/(:any)', 'DataUtama\UnitController::save/$1', ["filter" => "auth"]);
$routes->get("/delete-unit/(:any)", "DataUtama\UnitController::delete/$1", ["filter" => "auth"]);
// Data Sub Unit Kerja
$routes->get("/data-subunit", "DataUtama\SubUnitController::index", ["filter" => "auth"]);
$routes->get("/input-subunit", "DataUtama\SubUnitController::add", ["filter" => "auth"]);
$routes->get("/input-subunit/(:any)", "DataUtama\SubUnitController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-subunit', 'DataUtama\SubUnitController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-subunit/(:any)', 'DataUtama\SubUnitController::save/$1', ["filter" => "auth"]);
$routes->get("/delete-subunit/(:any)", "DataUtama\SubUnitController::delete/$1", ["filter" => "auth"]);
// Data ATK
$routes->get("/data-atk", "DataUtama\AtkController::index", ["filter" => "auth"]);
$routes->get("/input-atk", "DataUtama\AtkController::add", ["filter" => "auth"]);
$routes->get("/input-atk/(:any)", "DataUtama\AtkController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-atk', 'DataUtama\AtkController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-atk/(:any)', 'DataUtama\AtkController::save/$1', ["filter" => "auth"]);
$routes->get("/delete-atk/(:any)", "DataUtama\AtkController::delete/$1", ["filter" => "auth"]);
// Data Kegiatan
$routes->get("/data-kegiatan", "DataUtama\KegiatanController::index", ["filter" => "auth"]);
$routes->get("/input-kegiatan", "DataUtama\KegiatanController::add", ["filter" => "auth"]);
$routes->get("/input-kegiatan/(:any)", "DataUtama\KegiatanController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-kegiatan', 'DataUtama\KegiatanController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-kegiatan/(:any)', 'DataUtama\KegiatanController::save/$1', ["filter" => "auth"]);
$routes->get("/delete-kegiatan/(:any)", "DataUtama\KegiatanController::delete/$1", ["filter" => "auth"]);
// Data User
$routes->get("/data-user", "DataUtama\UsersController::index", ["filter" => "auth"]);
$routes->get("/input-user", "DataUtama\UsersController::add", ["filter" => "auth"]);
$routes->get("/input-user/(:any)", "DataUtama\UsersController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-user', 'DataUtama\UsersController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-user/(:any)', 'DataUtama\UsersController::save/$1', ["filter" => "auth"]);

// Pendahuluan Randis
$routes->get("/pendahuluan-randis", "HomeController::randis", ["filter" => "auth"]);
// Kendaraan Dinas
$routes->get("/data-randis", "DataRandis\RandisController::index", ["filter" => "auth"]);
$routes->get("/input-randis", "DataRandis\RandisController::add", ["filter" => "auth"]);
$routes->get("/input-randis/(:any)", "DataRandis\RandisController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-randis', 'DataRandis\RandisController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-randis/(:any)', 'DataRandis\RandisController::save/$1', ["filter" => "auth"]);
// Distribusi Randis
$routes->get("/data-dist-randis", "DataRandis\DistRandisController::index", ["filter" => "auth"]);
$routes->get("/input-dist-randis", "DataRandis\DistRandisController::add", ["filter" => "auth"]);
$routes->get("/input-dist-randis/(:any)", "DataRandis\DistRandisController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-dist-randis', 'DataRandis\DistRandisController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-dist-randis/(:any)', 'DataRandis\DistRandisController::save/$1', ["filter" => "auth"]);
// Jenis Operasional
$routes->get("/data-jenisops", "DataRandis\JenisOpsController::index", ["filter" => "auth"]);
$routes->get("/input-jenisops", "DataRandis\JenisOpsController::add", ["filter" => "auth"]);
$routes->get("/input-jenisops/(:any)", "DataRandis\JenisOpsController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-jenisops', 'DataRandis\JenisOpsController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-jenisops/(:any)', 'DataRandis\JenisOpsController::save/$1', ["filter" => "auth"]);

// Pendahuluan BMN
$routes->get("/pendahuluan-bmn", "HomeController::bmn", ["filter" => "auth"]);
// Gedung
$routes->get("/data-gedung", "DataBMN\GedungController::index", ["filter" => "auth"]);
$routes->get("/input-gedung", "DataBMN\GedungController::add", ["filter" => "auth"]);
$routes->get("/input-gedung/(:any)", "DataBMN\GedungController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-gedung', 'DataBMN\GedungController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-gedung/(:any)', 'DataBMN\GedungController::save/$1', ["filter" => "auth"]);
// Ruangan
$routes->get("/data-ruangan", "DataBMN\RuanganController::index", ["filter" => "auth"]);
$routes->get("/input-ruangan", "DataBMN\RuanganController::add", ["filter" => "auth"]);
$routes->get("/input-ruangan/(:any)", "DataBMN\RuanganController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-ruangan', 'DataBMN\RuanganController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-ruangan/(:any)', 'DataBMN\RuanganController::save/$1', ["filter" => "auth"]);
// Alat & Mesin
$routes->get("/data-alat", "DataBMN\AlatController::index", ["filter" => "auth"]);
$routes->get("/input-alat", "DataBMN\AlatController::add", ["filter" => "auth"]);
$routes->get("/input-alat/(:any)", "DataBMN\AlatController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-alat', 'DataBMN\AlatController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-alat/(:any)', 'DataBMN\AlatController::save/$1', ["filter" => "auth"]);
// Distribusi Alat & Mesin
$routes->get("/data-distalat", "DataBMN\DistAlatController::index", ["filter" => "auth"]);
$routes->get("/input-distalat", "DataBMN\DistAlatController::add", ["filter" => "auth"]);
$routes->get("/input-distalat/(:any)", "DataBMN\DistAlatController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-distalat', 'DataBMN\DistAlatController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-distalat/(:any)', 'DataBMN\DistAlatController::save/$1', ["filter" => "auth"]);
// Kategori Ruangan
$routes->get("/data-katruangan", "DataBMN\KatRuanganController::index", ["filter" => "auth"]);
$routes->get("/input-katruangan", "DataBMN\KatRuanganController::add", ["filter" => "auth"]);
$routes->get("/input-katruangan/(:any)", "DataBMN\KatRuanganController::edit/$1", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-katruangan', 'DataBMN\KatRuanganController::save/', ["filter" => "auth"]);
$routes->match(['get', 'post'], 'save-katruangan/(:any)', 'DataBMN\KatRuanganController::save/$1', ["filter" => "auth"]);

// Permintaan Masuk - Pengadaan
$routes->get("/pengadaan-atk-req", "Pengadaan\ReqAtkController::index", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'atk-req-approve/(:any)', 'Pengadaan\ReqAtkController::save/$1', ["filter" => "auth"]);
$routes->get("/pengadaan-cetakan-req", "Pengadaan\ReqCetakanController::index", ["filter" => "auth"]);
// Permintaan Masuk - Peminjaman
$routes->get("/peminjaman-rupat-req", "Peminjaman\ReqRupatController::index", ["filter" => "auth"]);
$routes->get("/peminjaman-alat-req", "Peminjaman\ReqAlatController::index", ["filter" => "auth"]);
$routes->get("/peminjaman-randis-req", "Peminjaman\ReqRandisController::index", ["filter" => "auth"]);
$routes->match(['get', 'post'], 'randis-req-approve/(:any)', 'Peminjaman\ReqRandisController::save/$1', ["filter" => "auth"]);

// Permintaan User - Pengadaan
$routes->get("/pengadaan-atk", "Pengadaan\AtkController::index", ["filter" => "auth"]);
$routes->match(['get', 'post'], '/save-pengadaan-atk', "Pengadaan\AtkController::save", ["filter" => "auth"]);
$routes->get("/pengadaan-cetakan", "Pengadaan\CetakanController::index", ["filter" => "auth"]);
$routes->match(['get', 'post'], '/save-pengadaan-cetakan', "Pengadaan\CetakanController::save", ["filter" => "auth"]);
// Permintaan User - Peminjaman
$routes->get("/peminjaman-rupat", "Peminjaman\RupatController::index", ["filter" => "auth"]);
$routes->get("/peminjaman-alat", "Peminjaman\AlatController::index", ["filter" => "auth"]);
$routes->get("/peminjaman-randis", "Peminjaman\RandisController::index", ["filter" => "auth"]);
$routes->match(['get', 'post'], '/save-peminjaman-randis', "Peminjaman\RandisController::save", ["filter" => "auth"]);
// Permintaan User - Pemeliharaan
$routes->get("/pemeliharaan-gedung", "Pemeliharaan\GedungController::index", ["filter" => "auth"]);
$routes->get("/pemeliharaan-randis", "Pemeliharaan\RandisController::index", ["filter" => "auth"]);
$routes->get("/pemeliharaan-alat", "Pemeliharaan\AlatController::index", ["filter" => "auth"]);

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
