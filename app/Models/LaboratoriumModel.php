<?php

namespace App\Models;

use CodeIgniter\Model;

class LaboratoriumModel extends Model
{
    protected $table = 'laboratorium';
    protected $allowedFields = ['no_rm', 'id_tipeperiksa_lab', 'hasil_lab', 'biaya'];
    protected $useTimestamps = true;

    public function getHasilLab($no_rm = false)
    {
        if ($no_rm === false) {
            return $this->select('laboratorium.*, pasien.nama, master_lab.tipeperiksa_lab')
                        ->join('pasien', 'pasien.no_rm = laboratorium.no_rm')
                        ->join('master_lab', 'master_lab.id_tipeperiksa_lab = laboratorium.id_tipeperiksa_lab')
                        ->findAll(); // Mengambil semua data
        }
        
        return $this->select('laboratorium.*, pasien.nama, master_lab.tipeperiksa_lab')
                    ->join('pasien', 'pasien.no_rm = laboratorium.no_rm')
                    ->join('master_lab', 'master_lab.id_tipeperiksa_lab = laboratorium.id_tipeperiksa_lab')
                    ->where('laboratorium.no_rm', $no_rm)
                    ->first(); // Mengambil satu data berdasarkan no_rm
    }

    // Tambahkan method untuk pencarian dan pagination
    public function searchHasilLab($keyword = null, $limit = 10, $offset = 0)
    {
        $builder = $this->select('laboratorium.*, pasien.nama, master_lab.tipeperiksa_lab')
                        ->join('pasien', 'pasien.no_rm = laboratorium.no_rm')
                        ->join('master_lab', 'master_lab.id_tipeperiksa_lab = laboratorium.id_tipeperiksa_lab');

        if ($keyword) {
            $builder->groupStart()
                    ->like('pasien.nama', $keyword)
                    ->orLike('pasien.no_rm', $keyword)
                    ->orLike('master_lab.tipeperiksa_lab', $keyword)
                    ->groupEnd();
        }

        return [
            'results' => $builder->limit($limit, $offset)->get()->getResultArray(),
            'total' => $builder->countAllResults()
        ];
    }
}
