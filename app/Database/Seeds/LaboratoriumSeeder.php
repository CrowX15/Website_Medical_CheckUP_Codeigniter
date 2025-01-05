<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaboratoriumSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('laboratorium')->insertBatch([
            [
                'no_rm' => 'RM001',
                'id_tipeperiksa_lab' => 1,
                'hasil_lab' => 'Normal',
                'biaya' => 500000,
            ],
            [
                'no_rm' => 'RM002',
                'id_tipeperiksa_lab' => 2,
                'hasil_lab' => 'Abnormal',
                'biaya' => 750000,
            ],
            [
                'no_rm' => 'RM003',
                'id_tipeperiksa_lab' => 3,
                'hasil_lab' => 'Normal',
                'biaya' => 600000,
            ],
            [
                'no_rm' => 'RM004',
                'id_tipeperiksa_lab' => 4,
                'hasil_lab' => 'Abnormal',
                'biaya' => 800000,
            ],
            [
                'no_rm' => 'RM005',
                'id_tipeperiksa_lab' => 5,
                'hasil_lab' => 'Normal',
                'biaya' => 550000,
            ],
        ]);
    }
}
