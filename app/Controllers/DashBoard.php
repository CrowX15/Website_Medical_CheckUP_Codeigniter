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

        $data = [
            'title' => 'Dashboard',
            'nama_user' => session()->get('nama_lengkap') // Ambil dari session
        ];

        return view('dashboard', $data);
    }
}
