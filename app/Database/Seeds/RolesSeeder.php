<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $data = 
        [
            ['role_name' => 'Loked'],
            ['role_name' => 'Dokter'],
            ['role_name' => 'Pasien'],
        ];

        // Insert data ke tabel roles
        $this->db->table('roles')->insertBatch($data);
    }
}
