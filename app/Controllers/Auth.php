<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\RoleModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $roleModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        // Tampilkan halaman login
        return view('auth/v_login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'user_id' => $user['id'],
                'username' => $user['username'], 
                'role_id' => $user['role_id'],
                'logged_in' => true
            ];
            
            session()->set($sessionData);

            // Redirect berdasarkan role
            switch ($user['role_id']) {
                case 1: return redirect()->to(base_url('admin/dashboard'));
                case 2: return redirect()->to(base_url('loket/dashboard')); 
                case 3: return redirect()->to(base_url('dokter/dashboard'));
                case 4: return redirect()->to(base_url('laboratorium/dashboard'));
                case 5: return redirect()->to(base_url('admin-lab/dashboard'));
                case 6: return redirect()->to(base_url('radiologi/dashboard'));
                case 7: return redirect()->to(base_url('admin-rad/dashboard'));
                default: return redirect()->to(base_url('auth'));
            }
        }

        // Jika login gagal
        session()->setFlashdata('error', 'Username atau Password salah');
        return redirect()->back();
    }

    public function register() 
    {
        helper(['form']);
        
        if ($this->request->getMethod() === 'post') {
            // Data yang akan divalidasi
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'confirm_password' => $this->request->getPost('confirm_password'),
                'email' => $this->request->getPost('email'),
                'role_id' => $this->request->getPost('role_id'),
                'nama_lengkap' => $this->request->getPost('nama_lengkap')
            ];
    
            // Validasi
            $rules = [
                'username' => 'required|min_length[4]|is_unique[user.username]',
                'password' => 'required|min_length[6]',
                'confirm_password' => 'required|matches[password]',
                'email' => 'permit_empty|valid_email|is_unique[user.email]',
                'role_id' => 'required|numeric',
                'nama_lengkap' => 'required'
            ];
    
            if (!$this->validate($rules)) {
                // Debug validasi error
                var_dump($this->validator->getErrors());
                
                return redirect()->back()
                               ->withInput()
                               ->with('error', $this->validator->getErrors());
            }
    
            // Hapus confirm_password dari data
            unset($data['confirm_password']);
            
            // Hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
            try {
                // Debug data sebelum insert
                var_dump($data);
                
                $this->userModel->insert($data);
                
                session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
                return redirect()->to(base_url('auth'));
            } catch (\Exception $e) {
                log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
                return redirect()->back()
                               ->withInput()
                               ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }
    
        $data['roles'] = $this->roleModel->findAll();
        return view('auth/v_register', $data);
    }
    


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth'));
    }
}
