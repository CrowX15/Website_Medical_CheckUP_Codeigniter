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
        // Jika sudah login, redirect ke dashboard sesuai role
        if (session()->get('logged_in')) {
            return $this->redirectBasedOnRole(session()->get('role_id'));
        }
        
        return view('auth/v_login');
    }

    public function login()
    {
        // Pastikan tidak ada session aktif
        if (session()->get('logged_in')) {
            session()->destroy();
        }

        // Validasi input
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Username dan password harus diisi');
        }

        // Proses login
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
            
            // Update last login
            $this->userModel->update($user['id'], ['last_login' => date('Y-m-d H:i:s')]);
            
            return $this->redirectBasedOnRole($user['role_id']);
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function register()
    {
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'nama_lengkap' => 'required'
        ];
    
        if ($this->request->getMethod() === 'post') {
            if ($this->validate($rules)) {
                $userModel = new UserModel();
                
                $data = [
                    'username' => $this->request->getPost('username'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'email' => $this->request->getPost('email'),
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'role' => 'user'
                ];
    
                $userModel->save($data);
                session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
                return redirect()->to('/login');
            }
        }
        return view('auth/register');
    }
    

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth'))->with('success', 'Anda telah berhasil logout');
    }

    private function redirectBasedOnRole($roleId)
    {
        switch ($roleId) {
            case 1: return redirect()->to(base_url('admin/dashboard'));
            case 2: return redirect()->to(base_url('loket/dashboard'));
            case 3: return redirect()->to(base_url('dokter/dashboard'));
            case 4: return redirect()->to(base_url('laboratorium/dashboard'));
            case 5: return redirect()->to(base_url('admin-lab/dashboard'));
            case 6: return redirect()->to(base_url('radiologi/dashboard'));
            case 7: return redirect()->to(base_url('admin-rad/dashboard'));
            default: return redirect()->to(base_url('auth'))->with('error', 'Role tidak valid');
        }
    }
}
