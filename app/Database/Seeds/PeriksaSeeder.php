<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PeriksaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_rm' => 'RM001',
                'batuk_darah' => 'Ya',
                'kencing_batu' => 'Tidak',
                'hepatitis' => 'Tidak',
                'hernia' => 'Ya',
                'hipertensi' => 'Tidak',
                'hemoroid' => 'Tidak',
                'diabetes' => 'Ya',
                'tinggi_badan' => '170 cm',
                'berat_badan' => '65 kg',
                'nadi' => 'Normal',
                'tekanan_darah' => '120/80 mmHg',
                'visus' => 'Normal',
                'buta_warna' => 'Tidak',
            ],
            [
                'no_rm' => 'RM002',
                'batuk_darah' => 'Tidak',
                'kencing_batu' => 'Ya',
                'hepatitis' => 'Ya',
                'hernia' => 'Tidak',
                'hipertensi' => 'Ya',
                'hemoroid' => 'Tidak',
                'diabetes' => 'Tidak',
                'tinggi_badan' => '165 cm',
                'berat_badan' => '70 kg',
                'nadi' => 'Normal',
                'tekanan_darah' => '130/85 mmHg',
                'visus' => 'Normal',
                'buta_warna' => 'Ya',
            ],
            [
                'no_rm' => 'RM003',
                'batuk_darah' => 'Ya',
                'kencing_batu' => 'Tidak',
                'hepatitis' => 'Tidak',
                'hernia' => 'Ya',
                'hipertensi' => 'Tidak',
                'hemoroid' => 'Ya',
                'diabetes' => 'Ya',
                'tinggi_badan' => '180 cm',
                'berat_badan' => '80 kg',
                'nadi' => 'Normal',
                'tekanan_darah' => '120/80 mmHg',
                'visus' => 'Normal',
                'buta_warna' => 'Tidak',
            ],
            [
                'no_rm' => 'RM004',
                'batuk_darah' => 'Tidak',
                'kencing_batu' => 'Ya',
                'hepatitis' => 'Ya',
                'hernia' => 'Tidak',
                'hipertensi' => 'Ya',
                'hemoroid' => 'Tidak',
                'diabetes' => 'Tidak',
                'tinggi_badan' => '175 cm',
                'berat_badan' => '85 kg',
                'nadi' => 'Normal',
                'tekanan_darah' => '135/90 mmHg',
                'visus' => 'Normal',
                'buta_warna' => 'Ya',
            ],
            [
                'no_rm' => 'RM005',
                'batuk_darah' => 'Ya',
                'kencing_batu' => 'Tidak',
                'hepatitis' => 'Tidak',
                'hernia' => 'Ya',
                'hipertensi' => 'Ya',
                'hemoroid' => 'Tidak',
                'diabetes' => 'Ya',
                'tinggi_badan' => '160 cm',
                'berat_badan' => '75 kg',
                'nadi' => 'Normal',
                'tekanan_darah' => '125/80 mmHg',
                'visus' => 'Normal',
                'buta_warna' => 'Tidak',
            ],
            [
                'no_rm' => 'RM006',
                'batuk_darah' => 'Tidak',
                'kencing_batu' => 'Ya',
                'hepatitis' => 'Ya',
                'hernia' => 'Tidak',
                'hipertensi' => 'Ya',
                'hemoroid' => 'Ya',
                'diabetes' => 'Ya',
                'tinggi_badan' => '155 cm',
                'berat_badan' => '60 kg',
                'nadi' => 'Normal',
                'tekanan_darah' => '110/70 mmHg',
                'visus' => 'Normal',
                'buta_warna' => 'Ya',
            ],
            [
                'no_rm' => 'RM007',
                'batuk_darah' => 'Ya',
                'kencing_batu' => 'Tidak',
                'hepatitis' => 'Tidak',
                'hernia' => 'Ya',
                'hipertensi' => 'Tidak',
                'hemoroid' => 'Ya',
                'diabetes' => 'Tidak',
                'tinggi_badan' => '185 cm',
                'berat_badan' => '90 kg',
                'nadi' => 'Normal',
                'tekanan_darah' => '140/90 mmHg',
                'visus' => 'Normal',
                'buta_warna' => 'Tidak',
            ]
        ];

        // Insert batch data into the database
        $this->db->table('periksa')->insertBatch($data);
    }
}
