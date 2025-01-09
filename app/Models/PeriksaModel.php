<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriksaModel extends Model
{
    protected $table = 'periksa';
    protected $primaryKey = 'no_rm';
    protected $allowedFields = [
        'batuk_darah', 'kencing_batu', 'hepatitis', 
        'hernia', 'hipertensi', 'hemoroid', 'diabetes',
        'tinggi_badan', 'berat_badan', 'nadi', 'tekanan_darah',
        'visus', 'buta_warna'
    ];
    protected $useTimestamps = true;

    // Mengambil hasil pemeriksaan berdasarkan no_rm
    public function getHasilPeriksa($no_rm = false)
    {
        if ($no_rm === false) {
            return $this->select('periksa.*, pasien.nama')
                        ->join('pasien', 'pasien.no_rm = periksa.no_rm')
                        ->findAll();
        }

        return $this->select('periksa.*, pasien.nama')
                    ->join('pasien', 'pasien.no_rm = periksa.no_rm')
                    ->where(['periksa.no_rm' => $no_rm])
                    ->first();
    }

    // Method untuk pencarian hasil pemeriksaan berdasarkan keyword
    public function searchHasilPeriksa($keyword = null, $limit = 10, $offset = 0)
    {
        $builder = $this->select('periksa.*, pasien.nama')
                        ->join('pasien', 'pasien.no_rm = periksa.no_rm');

        if ($keyword) {
            $builder->groupStart()
                    ->like('pasien.nama', $keyword)
                    ->orLike('periksa.no_rm', $keyword) 
                    ->orLike('batuk_darah', $keyword)
                    ->orLike('kencing_batu', $keyword)
                    ->orLike('hepatitis', $keyword)
                    ->orLike('hernia', $keyword)
                    ->orLike('hipertensi', $keyword)
                    ->orLike('hemoroid', $keyword)
                    ->orLike('diabetes', $keyword)
                    ->groupEnd();
        }

        return [
            'results' => $builder->limit($limit, $offset)->get()->getResultArray(),
            'total' => $builder->countAllResults()
        ];
    }

    // Method untuk mengambil semua hasil pemeriksaan dengan pagination
    public function getAllHasilPeriksa($limit = 10, $offset = 0)
    {
        return $this->select('periksa.*, pasien.nama')
                    ->join('pasien', 'pasien.no_rm = periksa.no_rm')
                    ->limit($limit, $offset)
                    ->findAll();
    }
}
