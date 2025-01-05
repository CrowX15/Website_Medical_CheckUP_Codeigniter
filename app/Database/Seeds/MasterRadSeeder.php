<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterRadSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_tipeperiksa_rad' => 1,
                'tipeperiksa_rad' => 'X-Ray Thorax',
            ],
            [
                'id_tipeperiksa_rad' => 2,
                'tipeperiksa_rad' => 'CT Scan Kepala',
            ],
            [
                'id_tipeperiksa_rad' => 3,
                'tipeperiksa_rad' => 'MRI Otak',
            ],
            [
                'id_tipeperiksa_rad' => 4,
                'tipeperiksa_rad' => 'Ultrasonografi (USG) Abdomen',
            ],
            [
                'id_tipeperiksa_rad' => 5,
                'tipeperiksa_rad' => 'X-Ray Dada',
            ],
            [
                'id_tipeperiksa_rad' => 6,
                'tipeperiksa_rad' => 'CT Scan Abdomen',
            ],
            [
                'id_tipeperiksa_rad' => 7,
                'tipeperiksa_rad' => 'MRI Punggung',
            ],
            [
                'id_tipeperiksa_rad' => 8,
                'tipeperiksa_rad' => 'X-Ray Sendi',
            ],
        ];

        // Insert batch data into the database
        $this->db->table('master_rad')->insertBatch($data);
    }
}
