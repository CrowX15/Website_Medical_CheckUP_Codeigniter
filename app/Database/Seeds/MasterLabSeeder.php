<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterLabSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_tipeperiksa_lab' => 1,
                'tipeperiksa_lab' => 'Tes Darah Lengkap',
            ],
            [
                'id_tipeperiksa_lab' => 2,
                'tipeperiksa_lab' => 'Tes Gula Darah',
            ],
            [
                'id_tipeperiksa_lab' => 3,
                'tipeperiksa_lab' => 'Tes Kolesterol',
            ],
            [
                'id_tipeperiksa_lab' => 4,
                'tipeperiksa_lab' => 'Tes Asam Urat',
            ],
            [
                'id_tipeperiksa_lab' => 5,
                'tipeperiksa_lab' => 'Tes Urin',
            ],
            [
                'id_tipeperiksa_lab' => 6,
                'tipeperiksa_lab' => 'Tes Hemoglobin',
            ],
            [
                'id_tipeperiksa_lab' => 7,
                'tipeperiksa_lab' => 'Tes Elektrolit',
            ],
            [
                'id_tipeperiksa_lab' => 8,
                'tipeperiksa_lab' => 'Tes Fungsi Hati',
            ],
        ];

        // Insert batch data into the database
        $this->db->table('master_lab')->insertBatch($data);
    }
}
