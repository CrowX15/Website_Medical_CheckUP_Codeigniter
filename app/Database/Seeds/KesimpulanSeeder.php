<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KesimpulanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_rm' => 'RM001',
                'pemeriksaan_fisik' => 'Normal',
                'thorax' => 'Tidak ada kelainan',
                'laboratorium' => 'Normal',
                'saran' => 'Perbanyak olahraga',
                'imt' => '22.5',
                'tatalaksana' => 'Pemantauan rutin',
            ],
            [
                'no_rm' => 'RM002',
                'pemeriksaan_fisik' => 'Pemeriksaan fisik menunjukkan gejala hipertensi',
                'thorax' => 'Kelainan ringan ditemukan',
                'laboratorium' => 'Hasil laboratorium menunjukkan kemungkinan hepatitis',
                'saran' => 'Segera lakukan pengobatan',
                'imt' => '28.5',
                'tatalaksana' => 'Obat antihipertensi',
            ],
            [
                'no_rm' => 'RM003',
                'pemeriksaan_fisik' => 'Tinggi badan normal, berat badan berlebih',
                'thorax' => 'Normal',
                'laboratorium' => 'Normal',
                'saran' => 'Menurunkan berat badan',
                'imt' => '30.1',
                'tatalaksana' => 'Diet ketat dan olahraga',
            ],
            [
                'no_rm' => 'RM004',
                'pemeriksaan_fisik' => 'Hipertensi sedang',
                'thorax' => 'Tidak ada kelainan',
                'laboratorium' => 'Hasil laboratorium normal',
                'saran' => 'Kontrol tekanan darah',
                'imt' => '27.8',
                'tatalaksana' => 'Obat antihipertensi dan diet',
            ],
            [
                'no_rm' => 'RM005',
                'pemeriksaan_fisik' => 'Kondisi fisik baik',
                'thorax' => 'Normal',
                'laboratorium' => 'Tidak ada kelainan',
                'saran' => 'Lakukan pemeriksaan rutin',
                'imt' => '24.2',
                'tatalaksana' => 'Pemantauan berkala',
            ]
        ];

        // Insert batch data into the database
        $this->db->table('kesimpulan')->insertBatch($data);
    }
}
