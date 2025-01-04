<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            [
                'name' => 'admin_sirs',
                'description' => 'Administrator Sistem Informasi Rumah Sakit',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'loket',
                'description' => 'Petugas Loket',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'dokter', 
                'description' => 'Dokter',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'user_lab',
                'description' => 'User Laboratorium',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'admin_lab',
                'description' => 'Admin Laboratorium',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'user_rad',
                'description' => 'User Radiologi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'admin_rad',
                'description' => 'Admin Radiologi',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
