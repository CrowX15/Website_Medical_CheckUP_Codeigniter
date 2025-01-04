<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lengkap' => 'Fareza Dava Rabbani',
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'email' => 'farezadavarabbani@gmail.com',
                'role_id' => 1, // admin_sirs
                'last_login' => date('Y-m-d H:i:s')
            ]
        ];

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
