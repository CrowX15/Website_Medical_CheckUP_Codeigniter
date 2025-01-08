<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            //[
            //    'nama_lengkap' => 'Fareza Dava Rabbani',
            //    'username' => 'admin',
            //    'password' => password_hash('admin123', PASSWORD_DEFAULT),
            //    'email' => 'farezadavarabbani@gmail.com',
            //    'role_id' => 1, // admin_sirs
            //    'last_login' => date('Y-m-d H:i:s'),
            //    'created_at' => date('Y-m-d H:i:s'), // Tambahkan created_at
            //    'updated_at' => date('Y-m-d H:i:s'), // Tambahkan updated_at
            //],
            // Tambahkan lebih banyak pengguna jika perlu
            [
                'nama_lengkap' => 'Saya user laboratorium',
                'username' => 'user_radiologi',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'email' => 'userradiologi@gmail.com',
                'role_id' => 6, // admin_sirs
                'last_login' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'), // Tambahkan created_at
                'updated_at' => date('Y-m-d H:i:s'), // Tambahkan updated_at
            ],
        ];

        // Using Query Builder
        if ($this->db->table('user')->insertBatch($data)) {
            echo "Data berhasil ditambahkan.\n";
        } else {
            echo "Terjadi kesalahan saat menambahkan data.\n";
        }
    }
}
