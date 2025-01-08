<?php

namespace App\Models;

use CodeIgniter\Model;

class KesimpulanModel extends Model
{
    protected $table = 'kesimpulan';
    protected $primaryKey = 'no_rm'; // Dihapus jika no_rm bukan primary key
    protected $allowedFields = [
        'no_rm', 'pemeriksaan_fisik', 'thorax', 'laboratorium',
        'saran', 'imt', 'tatalaksana'
    ];
    protected $useTimestamps = true;

    // Mengambil kesimpulan berdasarkan no_rm
    public function getKesimpulan($no_rm = false)
    {
        if ($no_rm === false) {
            return $this->select('kesimpulan.*, pasien.nama')
                        ->join('pasien', 'pasien.no_rm = kesimpulan.no_rm')
                        ->findAll();
        }

        return $this->select('kesimpulan.*, pasien.nama')
                    ->join('pasien', 'pasien.no_rm = kesimpulan.no_rm')
                    ->where(['kesimpulan.no_rm' => $no_rm])
                    ->first();
    }

    // Mengambil semua kesimpulan dengan pagination
    public function getAllKesimpulan($limit = 10, $offset = 0)
    {
        return $this->select('kesimpulan.*, pasien.nama')
                    ->join('pasien', 'pasien.no_rm = kesimpulan.no_rm')
                    ->limit($limit, $offset)
                    ->findAll();
    }

    // Pencarian berdasarkan kata kunci
    public function searchKesimpulan($keyword = null, $limit = 10, $offset = 0)
    {
        $builder = $this->select('kesimpulan.*, pasien.nama')
                        ->join('pasien', 'pasien.no_rm = kesimpulan.no_rm');

        if ($keyword) {
            $builder->groupStart()
                    ->like('pasien.nama', $keyword)
                    ->orLike('pemeriksaan_fisik', $keyword)
                    ->orLike('thorax', $keyword)
                    ->orLike('laboratorium', $keyword)
                    ->orLike('saran', $keyword)
                    ->orLike('imt', $keyword)
                    ->orLike('tatalaksana', $keyword)
                    ->groupEnd();
        }

        return [
            'results' => $builder->limit($limit, $offset)->get()->getResultArray(),
            'total' => $builder->countAllResults()
        ];
    }
}
