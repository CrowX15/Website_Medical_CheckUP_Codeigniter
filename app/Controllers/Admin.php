<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
        
        // Cek apakah user sudah login
        if (!$this->session->get('logged_in')) {
            return redirect()->to(base_url('auth'));
        }
        
        // Cek apakah role sesuai
        if ($this->session->get('role_id') != 1) {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }
    }

    public function dashboard()
    {
        $data['username'] = $this->session->get('username');
        return view('admin/dashboard', $data);
    }
}
