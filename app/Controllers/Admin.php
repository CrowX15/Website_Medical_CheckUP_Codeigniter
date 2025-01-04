<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        // Ambil data user dari session
        $data = [
            'title' => 'Dashboard Admin',
            'nama_lengkap' => session()->get('nama_lengkap') // ambil nama dari session
        ];
        
        return view('admin/dashboard', $data);
    }
}
