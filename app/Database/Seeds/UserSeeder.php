<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lengkap' => 'Admin SIRS',
                'username' => 'admin_sirs',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'email' => 'admin_sirs@gmail.com',
                'role_id' => 1, // admin_sirs
                'last_login' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_lengkap' => 'Loket User',
                'username' => 'user_loket',
                'password' => password_hash('loket123', PASSWORD_DEFAULT),
                'email' => 'user_loket@gmail.com',
                'role_id' => 2, // loket
                'last_login' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_lengkap' => 'Dokter User',
                'username' => 'user_dokter',
                'password' => password_hash('dokter123', PASSWORD_DEFAULT),
                'email' => 'user_dokter@gmail.com',
                'role_id' => 3, // dokter
                'last_login' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_lengkap' => 'User Laboratorium',
                'username' => 'user_lab',
                'password' => password_hash('lab123', PASSWORD_DEFAULT),
                'email' => 'user_lab@gmail.com',
                'role_id' => 4, // user_lab
                'last_login' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_lengkap' => 'Admin Laboratorium',
                'username' => 'admin_lab',
                'password' => password_hash('adminlab123', PASSWORD_DEFAULT),
                'email' => 'admin_lab@gmail.com',
                'role_id' => 5, // admin_lab
                'last_login' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_lengkap' => 'User Radiologi',
                'username' => 'user_rad',
                'password' => password_hash('rad123', PASSWORD_DEFAULT),
                'email' => 'user_rad@gmail.com',
                'role_id' => 6, // user_rad
                'last_login' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_lengkap' => 'Admin Radiologi',
                'username' => 'admin_rad',
                'password' => password_hash('adminrad123', PASSWORD_DEFAULT),
                'email' => 'admin_rad@gmail.com',
                'role_id' => 7, // admin_rad
                'last_login' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
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
