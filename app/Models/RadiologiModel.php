<?php

namespace App\Models;

use CodeIgniter\Model;

class RadiologiModel extends Model
{
    protected $table = 'radiologi';
    protected $primaryKey = 'no_rm';
    protected $allowedFields = ['id_tipeperiksa_rad', 'hasil_rad', 'kesimpulan'];
    protected $useTimestamps = true;

    // Mengambil hasil radiologi berdasarkan no_rm
    public function getHasilRad($no_rm = false)
    {
        if ($no_rm === false) {
            return $this->select('radiologi.*, pasien.nama, master_rad.tipeperiksa_rad')
                        ->join('pasien', 'pasien.no_rm = radiologi.no_rm')
                        ->join('master_rad', 'master_rad.id_tipeperiksa_rad = radiologi.id_tipeperiksa_rad')
                        ->findAll();
        }

        return $this->select('radiologi.*, pasien.nama, master_rad.tipeperiksa_rad')
                    ->join('pasien', 'pasien.no_rm = radiologi.no_rm')
                    ->join('master_rad', 'master_rad.id_tipeperiksa_rad = radiologi.id_tipeperiksa_rad')
                    ->where(['radiologi.no_rm' => $no_rm])
                    ->findAll();
    }

    // Method untuk pencarian hasil radiologi berdasarkan keyword
    public function searchHasilRad($keyword = null, $limit = 10, $offset = 0)
    {
        $builder = $this->select('radiologi.*, pasien.nama, master_rad.tipeperiksa_rad')
                        ->join('pasien', 'pasien.no_rm = radiologi.no_rm')
                        ->join('master_rad', 'master_rad.id_tipeperiksa_rad = radiologi.id_tipeperiksa_rad');

        if ($keyword) {
            $builder->groupStart()
                    ->like('pasien.nama', $keyword)
                    ->orlike('radiologi.no_rm', $keyword)
                    ->orLike('hasil_rad', $keyword)
                    ->orLike('kesimpulan', $keyword)
                    ->groupEnd();
        }

        return [
            'results' => $builder->limit($limit, $offset)->get()->getResultArray(),
            'total' => $builder->countAllResults()
        ];
    }

    // Method untuk mengambil semua hasil radiologi dengan pagination
    public function getAllHasilRad($limit = 10, $offset = 0)
    {
        return $this->select('radiologi.*, pasien.nama, master_rad.tipeperiksa_rad')
                    ->join('pasien', 'pasien.no_rm = radiologi.no_rm')
                    ->join('master_rad', 'master_rad.id_tipeperiksa_rad = radiologi.id_tipeperiksa_rad')
                    ->limit($limit, $offset)
                    ->findAll();
    }
}
