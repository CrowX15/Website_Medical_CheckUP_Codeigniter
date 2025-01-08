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
    $routes->get('admin/dashboard', 'Admin::dashboard', ['filter' => 'role:1']);
    $routes->get('loket/dashboard', 'Loket::dashboard', ['filter' => 'role:2']);
    $routes->get('dokter/dashboard', 'Dokter::dashboard', ['filter' => 'role:3']);
    $routes->get('laboratorium/dashboard', 'Laboratorium::dashboard', ['filter' => 'role:4']);
    $routes->get('adminlab/dashboard', 'AdminLab::dashboard', ['filter' => 'role:5']);
    $routes->get('radiologi/dashboard', 'Radiologi::dashboard', ['filter' => 'role:6']);
    $routes->get('adminrad/dashboard', 'AdminRad::dashboard', ['filter' => 'role:7']);

    // Rute Manajemen Pasien
    $routes->group('pasien', function($routes) {
        $routes->get('', 'Pasien::index');
        $routes->get('create', 'Pasien::create');
        $routes->post('create', 'Pasien::create');
        $routes->get('edit/(:segment)', 'Pasien::edit/$1');
        $routes->post('edit/(:segment)', 'Pasien::edit/$1');
        $routes->get('delete/(:segment)', 'Pasien::delete/$1');
        
    });

    // Rute Pemeriksaan Fisik
    $routes->group('periksa', function($routes) {
        $routes->get('', 'Periksa::index');
        $routes->get('create', 'Periksa::create');
        $routes->post('create', 'Periksa::create');
        $routes->get('edit/(:segment)', 'Periksa::edit/$1');
        $routes->post('edit/(:segment)', 'Periksa::edit/$1');
        $routes->get('delete/(:segment)', 'Periksa::delete/$1');
    });

    // Rute Laboratorium
    $routes->group('laboratorium', function($routes) {
        $routes->get('', 'Laboratorium::index');
        $routes->get('create', 'Laboratorium::create');
        $routes->post('create', 'Laboratorium::create');
        $routes->get('edit/(:segment)', 'Laboratorium::edit/$1');
        $routes->post('edit/(:segment)', 'Laboratorium::edit/$1');
        $routes->get('delete/(:segment)', 'Laboratorium::delete/$1');
    });

    // Rute Master Lab
    $routes->group('masterlab', function($routes) {
        $routes->get('', 'masterlab::index');
        $routes->get('create', 'masterlab::create');
        $routes->post('create', 'masterlab::create');
        $routes->get('edit/(:segment)', 'masterlab::edit/$1');
        $routes->post('edit/(:segment)', 'masterlab::edit/$1');
        $routes->get('delete/(:segment)', 'masterlab::delete/$1');
    });

    // Rute Radiologi
    $routes->group('radiologi', function($routes) {
        $routes->get('', 'Radiologi::index');
        $routes->get('create', 'Radiologi::create');
        $routes->post('create', 'Radiologi::create');
        $routes->get('edit/(:segment)', 'Radiologi::edit/$1');
        $routes->post('edit/(:segment)', 'Radiologi::edit/$1');
        $routes->get('delete/(:segment)', 'Radiologi::delete/$1');
    });

    // Rute Master Radiologi
    $routes->group('masterrad', function($routes) {
        $routes->get('', 'masterrad::index');
        $routes->get('create', 'masterrad::create');
        $routes->post('create', 'masterrad::create');
        $routes->get('edit/(:segment)', 'masterrad::edit/$1');
        $routes->post('edit/(:segment)', 'masterrad::edit/$1');
        $routes->get('delete/(:segment)', 'masterrad::delete/$1');
    });

    // Rute Kesimpulan
    $routes->group('kesimpulan', function($routes) {
        $routes->get('', 'Kesimpulan::index');
        $routes->get('create', 'Kesimpulan::create');
        $routes->post('create', 'Kesimpulan::create');
        $routes->get('edit/(:segment)', 'Kesimpulan::edit/$1');
        $routes->post('edit/(:segment)', 'Kesimpulan::edit/$1');
        $routes->get('delete/(:segment)', 'Kesimpulan::delete/$1');
    });
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
