<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Data untuk dashboard
        $data = [
            'title' => 'Dashboard',
            'role_id' => session()->get('role_id'),
            'nama_lengkap' => session()->get('nama_lengkap'),
            'username' => session()->get('username')
        ];

        return view('admin/dashboard', $data);
    }
}
