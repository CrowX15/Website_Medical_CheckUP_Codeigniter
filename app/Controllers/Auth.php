<?php
namespace App\Controllers;
use App\Models\UserModel;

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
        return view('auth/v_login');
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

    public function register()
    {
        // Jika sudah login, redirect ke dashboard
        if ($this->session->get('logged_in')) {
            return redirect()->to(base_url('dashboard'));
        }
    
        // Ambil data roles untuk dropdown
        $roleModel = new \App\Models\RoleModel();
        $data['roles'] = $roleModel->getRegisterableRoles();
    
        if ($this->request->getMethod() === 'post') {
            // Validasi input
            $rules = [
                'nama_lengkap' => 'required|min_length[3]',
                'username' => 'required|min_length[3]|is_unique[users.username]',
                'password' => 'required|min_length[6]',
                'confirm_password' => 'required|matches[password]',
                'role_id' => 'required|numeric|is_not_unique[roles.id]'
            ];
        
            if (!$this->validate($rules)) {
                return redirect()->back()
                               ->withInput()
                               ->with('error', $this->validator->listErrors());
            }
        
            // Data yang akan disimpan
            $data = [
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role_id' => $this->request->getPost('role_id'),
                'created_at' => date('Y-m-d H:i:s')
            ];
        
            try {
                $this->userModel->insert($data);
                return redirect()->to(base_url('auth'))
                               ->with('success', 'Registrasi berhasil! Silakan login.');
            } catch (\Exception $e) {
                return redirect()->back()
                               ->withInput()
                               ->with('error', 'Terjadi kesalahan saat mendaftar.');
            }
        }
    
        // Tampilkan view register
        return view('auth/v_register', $data);
    }



}
