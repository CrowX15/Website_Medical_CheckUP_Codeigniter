<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Tambahkan ini untuk redirect ke halaman login
$routes->get('/', 'Auth::index');

$routes->group('', ['filter' => 'auth'], function($routes) {
    // Route untuk Admin SIRS (role_id = 1)
    $routes->group('admin', ['filter' => 'role:1'], function($routes) {
        $routes->get('dashboard', 'Admin::dashboard');
        // ... route lainnya
    });

    // Route untuk Loket (role_id = 2)
    $routes->group('loket', ['filter' => 'role:2'], function($routes) {
        $routes->get('dashboard', 'Loket::dashboard');
        $routes->get('pasien', 'Loket::pasien');
        // ... route lainnya
    });

    // Route untuk Dokter (role_id = 3)
    $routes->group('dokter', ['filter' => 'role:3'], function($routes) {
        $routes->get('dashboard', 'Dokter::dashboard');
        $routes->get('pemeriksaan', 'Dokter::pemeriksaan');
        // ... route lainnya
    });

    // Dan seterusnya untuk role lainnya...
});

// Route yang bisa diakses tanpa login
$routes->get('auth', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/register', 'Auth::register'); 
$routes->post('auth/register', 'Auth::register'); 
$routes->get('auth/logout', 'Auth::logout');
