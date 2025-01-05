<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RadiologiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_rm' => 'RM001',
                'id_tipeperiksa_rad' => 1,
                'hasil_rad' => 'Normal',
                'kesimpulan' => 'Tidak ditemukan kelainan pada X-Ray Thorax.',
            ],
            [
                'no_rm' => 'RM002',
                'id_tipeperiksa_rad' => 2,
                'hasil_rad' => 'Abnormal',
                'kesimpulan' => 'Terdapat pembengkakan pada jaringan otak di CT Scan Kepala.',
            ],
            [
                'no_rm' => 'RM003',
                'id_tipeperiksa_rad' => 3,
                'hasil_rad' => 'Normal',
                'kesimpulan' => 'Tidak ditemukan masalah pada MRI Otak.',
            ],
            [
                'no_rm' => 'RM004',
                'id_tipeperiksa_rad' => 4,
                'hasil_rad' => 'Abnormal',
                'kesimpulan' => 'Ada kelainan pada liver yang terlihat pada Ultrasonografi (USG) Abdomen.',
            ],
            [
                'no_rm' => 'RM005',
                'id_tipeperiksa_rad' => 5,
                'hasil_rad' => 'Normal',
                'kesimpulan' => 'Tidak ada kelainan pada X-Ray Dada.',
            ],
        ];

        // Insert batch data into the database
        $this->db->table('radiologi')->insertBatch($data);
    }
}
