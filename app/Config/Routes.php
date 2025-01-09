<?php

namespace Config;
use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();


$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(false);

// Rute untuk Auth
$routes->get('/', 'Auth::index');
$routes->get('login', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::register');
$routes->get('logout', 'Auth::logout');

// Rute yang membutuhkan autentikasi
$routes->group('', ['filter' => 'auth'], function($routes) {
    
    // Rute Dashboard berdasarkan Role
    $routes->get('dashboard', 'Dashboard::index');

    // Rute Manajemen Pasien
    $routes->group('Pasien', function($routes) {
        $routes->get('', 'Pasien::index'); // Menampilkan daftar pasien
        $routes->get('create', 'Pasien::store'); // Menampilkan form pembuatan pasien
        $routes->post('create', 'Pasien::store'); // Memproses pembuatan pasien
        $routes->get('edit/(:segment)', 'Pasien::update/$1'); // Menampilkan form edit pasien
        $routes->post('edit/(:segment)', 'Pasien::update/$1'); // Memproses pembaruan pasien
        $routes->post('delete/(:segment)', 'Pasien::delete/$1'); // Menghapus pasien
    });

    // Rute Pemeriksaan Fisik
    $routes->group('Periksa', function($routes) {
        $routes->get('', 'Periksa::index');
        $routes->get('create', 'Periksa::store');
        $routes->post('create', 'Periksa::store');
        $routes->get('edit/(:segment)', 'Periksa::update/$1');
        $routes->post('edit/(:segment)', 'Periksa::update/$1');
        $routes->post('delete/(:segment)', 'Periksa::delete/$1');
    });

    // Rute Laboratorium
    $routes->group('Laboratorium', function($routes) {
        $routes->get('', 'Laboratorium::index');
        $routes->get('create', 'Laboratorium::store');
        $routes->post('create', 'Laboratorium::store');
        $routes->get('edit/(:segment)', 'Laboratorium::update/$1');
        $routes->post('edit/(:segment)', 'Laboratorium::update/$1');
        $routes->post('delete/(:segment)', 'Laboratorium::delete/$1');
    });

    // Rute Master Lab
    $routes->group('MasterLab', function($routes) {
        $routes->get('', 'MasterLab::index');
        $routes->get('create', 'MasterLab::store');
        $routes->post('create', 'MasterLab::store');
        $routes->get('edit/(:segment)', 'MasterLab::update/$1');
        $routes->post('edit/(:segment)', 'MasterLab::update/$1');
        $routes->post('delete/(:segment)', 'MasterLab::delete/$1');
    });

    // Rute Radiologi
    $routes->group('Radiologi', function($routes) {
        $routes->get('', 'Radiologi::index');
        $routes->get('create', 'Radiologi::store');
        $routes->post('create', 'Radiologi::store');
        $routes->get('edit/(:segment)', 'Radiologi::update/$1');
        $routes->post('edit/(:segment)', 'Radiologi::update/$1');
        $routes->post('delete/(:segment)', 'Radiologi::delete/$1');
    });

    // Rute Master Radiologi
    $routes->group('MasterRad', function($routes) {
        $routes->get('', 'MasterRad::index');
        $routes->get('create', 'MasterRad::store');
        $routes->post('create', 'MasterRad::store');
        $routes->get('edit/(:segment)', 'MasterRad::update/$1');
        $routes->post('edit/(:segment)', 'MasterRad::update/$1');
        $routes->post('delete/(:segment)', 'MasterRad::delete/$1');
    });

    // Rute Kesimpulan
    $routes->group('Kesimpulan', function($routes) {
        $routes->get('', 'Kesimpulan::index');
        $routes->get('create', 'Kesimpulan::store');
        $routes->post('create', 'Kesimpulan::store');
        $routes->get('edit/(:segment)', 'Kesimpulan::update/$1');
        $routes->post('edit/(:segment)', 'Kesimpulan::update/$1');
        $routes->post('delete/(:segment)', 'Kesimpulan::delete/$1');
    });
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
