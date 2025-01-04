<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default redirect ke login
$routes->get('/', 'Auth::index');

// Routes untuk auth
$routes->group('auth', function($routes) {
    $routes->get('', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::register');
    $routes->get('logout', 'Auth::logout');
});


// Routes yang membutuhkan authentication
$routes->group('', ['filter' => 'auth'], function($routes) {
    
    // 1. Admin SIRS (role_id = 1)
    $routes->group('admin', ['filter' => 'role:1'], function($routes) {
        $routes->get('dashboard', 'Admin::dashboard');
        $routes->get('users', 'Admin::users');
        
        // CRUD Pasien
        $routes->get('pasien', 'Admin::pasien');
        $routes->post('pasien/create', 'Admin::createPasien');
        $routes->get('pasien/edit/(:num)', 'Admin::editPasien/$1');
        $routes->put('pasien/update/(:num)', 'Admin::updatePasien/$1');
        $routes->delete('pasien/delete/(:num)', 'Admin::deletePasien/$1');
        
        // CRUD Laboratorium
        $routes->get('laboratorium', 'Admin::laboratorium');
        $routes->post('laboratorium/create', 'Admin::createLab');
        $routes->get('laboratorium/edit/(:num)', 'Admin::editLab/$1');
        $routes->put('laboratorium/update/(:num)', 'Admin::updateLab/$1');
        $routes->delete('laboratorium/delete/(:num)', 'Admin::deleteLab/$1');
        
        // CRUD Radiologi
        $routes->get('radiologi', 'Admin::radiologi');
        $routes->post('radiologi/create', 'Admin::createRadiologi');
        $routes->get('radiologi/edit/(:num)', 'Admin::editRadiologi/$1');
        $routes->put('radiologi/update/(:num)', 'Admin::updateRadiologi/$1');
        $routes->delete('radiologi/delete/(:num)', 'Admin::deleteRadiologi/$1');
    });

    // 2. Loket (role_id = 2)
    $routes->group('loket', ['filter' => 'role:2'], function($routes) {
        $routes->get('dashboard', 'Loket::dashboard');
        $routes->get('pasien', 'Loket::pasien');
        $routes->post('pasien/create', 'Loket::createPasien');
        $routes->put('pasien/update/(:num)', 'Loket::updatePasien/$1');
        $routes->delete('pasien/delete/(:num)', 'Loket::deletePasien/$1');
    });

    // 3. Dokter (role_id = 3)
    $routes->group('dokter', ['filter' => 'role:3'], function($routes) {
        $routes->get('dashboard', 'Dokter::dashboard');
        $routes->get('pemeriksaan', 'Dokter::pemeriksaan');
        $routes->post('pemeriksaan/create', 'Dokter::createPemeriksaan');
        $routes->get('kesimpulan', 'Dokter::kesimpulan');
        $routes->post('kesimpulan/create', 'Dokter::createKesimpulan');
    });

    // 4. User Laboratorium (role_id = 4)
    $routes->group('laboratorium', ['filter' => 'role:4'], function($routes) {
        $routes->get('dashboard', 'Laboratorium::dashboard');
        $routes->get('hasil', 'Laboratorium::hasil');
        $routes->post('hasil/create', 'Laboratorium::createHasil');
        $routes->put('hasil/update/(:num)', 'Laboratorium::updateHasil/$1');
        $routes->delete('hasil/delete/(:num)', 'Laboratorium::deleteHasil/$1');
    });

    // 5. Admin Laboratorium (role_id = 5)
    $routes->group('admin-lab', ['filter' => 'role:5'], function($routes) {
        $routes->get('dashboard', 'AdminLab::dashboard');
        $routes->get('master-lab', 'AdminLab::masterLab');
        $routes->get('hasil-lab', 'AdminLab::hasilLab');
    });

    // 6. User Radiologi (role_id = 6)
    $routes->group('radiologi', ['filter' => 'role:6'], function($routes) {
        $routes->get('dashboard', 'Radiologi::dashboard');
        $routes->get('hasil', 'Radiologi::hasil');
        $routes->post('hasil/create', 'Radiologi::createHasil');
        $routes->put('hasil/update/(:num)', 'Radiologi::updateHasil/$1');
        $routes->delete('hasil/delete/(:num)', 'Radiologi::deleteHasil/$1');
    });

    // 7. Admin Radiologi (role_id = 7)
    $routes->group('admin-rad', ['filter' => 'role:7'], function($routes) {
        $routes->get('dashboard', 'AdminRad::dashboard');
        $routes->get('master-rad', 'AdminRad::masterRad');
        $routes->get('hasil-rad', 'AdminRad::hasilRad');
    });
});

// 404 Override
$routes->set404Override(function() {
    return view('errors/404');
});