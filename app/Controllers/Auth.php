<?php
namespace App\Controllers;

class Auth extends BaseController
{
    protected $session;
    protected $userModel;

    // Ini constructor buat inisialisasi session dan model
    public function __construct()
    {
        $this->session = session();
        $this->userModel = new \App\Models\UserModel();
    }

    // Method index buat nampilin halaman login
    public function index()
    {
        // Kalo udah login, langsung aja redirect ke dashboard
        if ($this->session->get('logged_in')) {
            return redirect()->to(base_url('dashboard'));
        }
        return view('login/v_login');
    }

    // Nah ini method buat proses loginnya
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cek username ada gak di database
        $user = $this->userModel->where('username', $username)->first();

        if ($user) {
            // Kalo password bener...
            if (password_verify($password, $user['password'])) {
                // Bikin session data
                $sessionData = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'logged_in' => TRUE
                ];
                $this->session->set($sessionData);

                // Arahin user ke halaman sesuai rolenya
                switch ($user['role_id']) {
                    case 1: return redirect()->to(base_url('admin/dashboard')); // admin_sirs
                    case 2: return redirect()->to(base_url('loket/dashboard')); // loket
                    case 3: return redirect()->to(base_url('dokter/dashboard')); // dokter
                    case 4: return redirect()->to(base_url('laboratorium/dashboard')); // user_lab
                    case 5: return redirect()->to(base_url('laboratorium/dashboard'));  // admin_lab
                    case 6: return redirect()->to(base_url('radiologi/dashboard'));  // user_radiologi
                    case 7: return redirect()->to(base_url('radiologi/dashboard')); // admin_radiologi 
                    // ... dst
                }
            }
        }

        // Kalo gagal login, kasih pesan error
        $this->session->setFlashdata('error', 'Username atau Password salah nih!');
        return redirect()->to(base_url('auth'));
    }

 
    public function logout()
    {
        // Simple aja nih, hancurin session terus redirect ke halaman login
        $this->session->destroy();

        // Bisa juga ditambahin pesan "Berhasil logout"
        $this->session->setFlashdata('success', 'Sampai jumpa lagi! 👋');

        return redirect()->to(base_url('auth'));
    }

}
