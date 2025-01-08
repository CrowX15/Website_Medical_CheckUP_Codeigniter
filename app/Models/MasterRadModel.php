<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterRadModel extends Model
{
    protected $table = 'master_rad';
    protected $primaryKey = 'id_tipeperiksa_rad';
    protected $allowedFields = ['tipeperiksa_rad'];
    protected $useTimestamps = true;

    // Method untuk mengambil semua tipe pemeriksaan rad atau berdasarkan ID
    public function getTipePeriksaRad($id = false)
    {
        if ($id === false) {
            return $this->findAll(); // Mengambil semua data
        }

        return $this->find($id); // Mengambil data berdasarkan ID
    }

    // Method untuk pencarian dan pagination
    public function searchTipePeriksaRad($keyword = null, $limit = 10, $offset = 0)
    {
        $builder = $this->builder();

        if ($keyword) {
            $builder->like('tipeperiksa_rad', $keyword);
        }

        return [
            'results' => $builder->limit($limit, $offset)->get()->getResultArray(),
            'total' => $builder->countAllResults()
        ];
    }

    // Method untuk mengambil semua tipe pemeriksaan rad dengan pagination
    public function getAllTipePeriksaRad($limit = 10, $offset = 0)
    {
        return $this->limit($limit, $offset)->findAll(); // Mengambil data dengan limit dan offset
    }
}
