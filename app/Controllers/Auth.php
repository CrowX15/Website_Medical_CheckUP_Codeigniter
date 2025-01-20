<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
    }

    public function index()
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if ($this->session->has('logged_in')) {
            return $this->redirectToDashboard();
        }
        
        return view('auth/login', [
            'title' => 'Login - Medical Checkup'
        ]);
    }

    public function login()
    {
       if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'role_id' => $user['role_id'],
                    'logged_in' => true
                ];

                $this->session->set($sessionData);
                return $this->redirectToDashboard();
            } else {
                $this->session->setFlashdata('error', 'Password salah');
                return redirect()->back()->withInput();
            }
        } else {
            $this->session->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->back()->withInput();
        }
    }


    public function register()
    {
        $roleModel = new \App\Models\RoleModel();
        $roles = $roleModel->getNonAdminRoles();

        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Lengkap harus diisi'
                    ]
                ],
                'username' => [
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'required' => 'Username harus diisi',
                        'is_unique' => 'Username sudah digunakan'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[user.email]',
                    'errors' => [
                        'required' => 'Email harus diisi',
                        'valid_email' => 'Format email tidak valid',
                        'is_unique' => 'Email sudah digunakan'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                        'required' => 'Password harus diisi',
                        'min_length' => 'Password minimal 6 karakter'
                    ]
                ],
                'confirm_password' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Konfirmasi password harus diisi',
                        'matches' => 'Konfirmasi password tidak cocok'
                    ]
                ],
                'role_id' => [
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => 'Role harus dipilih',
                        'integer' => 'Role tidak valid'
                    ]
                ]
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'role_id' => $this->request->getPost('role_id'),
            ];

            try {
                $this->userModel->insert($data);
                $this->session->setFlashdata('success', 'Registrasi berhasil, silahkan login');
                return redirect()->to('/login');
            } catch (\Exception $e) {
                log_message('error', 'Error saat registrasi: ' . $e->getMessage());
                $this->session->setFlashdata('error', 'Terjadi kesalahan saat registrasi. Mohon coba lagi.');
                return redirect()->back()->withInput();
            }
        }

        return view('auth/register',[
            'title' => 'Register - Medical Checkup',
            'roles' => $roles,
        ]);
    }


    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }

    private function redirectToDashboard()
    {
        return redirect()->to(base_url('dashboard'));
    }
}