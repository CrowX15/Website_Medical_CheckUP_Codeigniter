<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterLabModel extends Model
{
    protected $table = 'master_lab';
    protected $primaryKey = 'id_tipeperiksa_lab';
    protected $allowedFields = ['tipeperiksa_lab'];
    protected $useTimestamps = true;

    // Method untuk mengambil semua tipe pemeriksaan lab atau berdasarkan id
    public function getTipePeriksaLab($id = false)
    {
        if ($id === false) {
            return $this->findAll(); // Mengambil semua data
        }

        return $this->where('id_tipeperiksa_lab', $id)->first(); // Mengambil data berdasarkan id
    }

    // Method untuk pencarian dan pagination
    public function searchTipePeriksaLab($keyword = null, $limit = 10, $offset = 0)
    {
        $builder = $this->builder();

        if ($keyword) {
            $builder->like('tipeperiksa_lab', $keyword);
        }

        return [
            'results' => $builder->limit($limit, $offset)->get()->getResultArray(),
            'total' => $builder->countAllResults()
        ];
    }

    // Method untuk mengambil data dengan pagination
    public function getAllTipePeriksaLab($limit = 10, $offset = 0)
    {
        return $this->limit($limit, $offset)->findAll(); // Mengambil data dengan limit dan offset
    }
}
