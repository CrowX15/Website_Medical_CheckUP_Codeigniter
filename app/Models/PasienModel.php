<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'no_rm';
    protected $allowedFields = ['nama', 'perusahaan', 'nik', 'departemen', 'bagian', 'usia', 'tgl_mcu'];
    protected $useTimestamps = true;

    public function getPasien($no_rm = false)
    {
        if ($no_rm === false) {
            return $this->findAll();
        }
        return $this->where(['no_rm' => $no_rm])->first();
    }

    // Tambahkan method untuk pencarian dan pagination
    public function searchPasien($keyword = null, $limit = 10, $offset = 0)
    {
        $builder = $this->builder();

        if ($keyword) {
            $builder->groupStart()
                    ->like('no_rm', $keyword)
                    ->orLike('nama', $keyword)
                    ->orLike('nik', $keyword)
                    ->orLike('perusahaan', $keyword)
                    ->orLike('departemen', $keyword)
                    ->orLike('bagian', $keyword)
                    ->groupEnd();
        }

        return [
            'results' => $builder->limit($limit, $offset)->get()->getResultArray(),
            'total' => $builder->countAllResults()
        ];
    }
}
