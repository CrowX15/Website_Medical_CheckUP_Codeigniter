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
        
        return view('auth/login');
    }
    

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->get('logged_in')) {
            return $this->redirectBasedOnRole(session()->get('role_id'));
        }

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Validasi input
            if (empty($username) || empty($password)) {
                return redirect()->back()->with('error', 'Username dan password tidak boleh kosong');
            }

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Set session
                $sessionData = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'logged_in' => TRUE
                ];
                session()->set($sessionData);

                // Redirect berdasarkan role
                return $this->redirectBasedOnRole($user['role_id']);
            }


            // Hindari memberitahu pengguna apakah username atau password salah
            return redirect()->back()->with('error', 'Username atau password salah');
        }

        return view('auth/login');
    }

    
    private function redirectBasedOnRole($role_id)
    {
        switch ($role_id) {
            case 1: return redirect()->to('admin/dashboard');
            case 2: return redirect()->to('loket/dashboard');
            case 3: return redirect()->to('dokter/dashboard');
            case 4: return redirect()->to('laboratorium/dashboard');
            case 5: return redirect()->to('admin-lab/dashboard');
            case 6: return redirect()->to('radiologi/dashboard');
            case 7: return redirect()->to('admin-rad/dashboard');
            default: return redirect()->to('auth/login')->with('error', 'Role tidak valid');
        }
    }
    
    
    public function register()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->get('logged_in')) {
            return $this->redirectBasedOnRole(session()->get('role_id'));
        }
    
        $data = [
            'title' => 'Register',
            'roles' => $this->roleModel->findAll()
        ];
    
        if ($this->request->getMethod() === 'post') {
            // Atur rules validasi
            $rules = [
                'nama_lengkap' => 'required',
                'username' => 'required|min_length[4]|is_unique[user.username]',
                'password' => 'required|min_length[6]',
                'confirm_password' => 'required|matches[password]',
                'email' => 'required|valid_email|is_unique[user.email]',
                'role_id' => 'required'
            ];
    
            if ($this->validate($rules)) {
                $userData = [
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'username' => $this->request->getPost('username'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'email' => $this->request->getPost('email'),
                    'role_id' => $this->request->getPost('role_id'),
                    'last_login' => date('Y-m-d H:i:s')
                ];
    
                try {
                    $this->userModel->insert($userData);
                    session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
                    return redirect()->to('auth/login');
                } catch (\Exception $e) {
                    session()->setFlashdata('error', 'Gagal melakukan registrasi');
                    return redirect()->back()->withInput();
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
    
        return view('auth/register', $data);
    }
    

    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }


    

   
}
