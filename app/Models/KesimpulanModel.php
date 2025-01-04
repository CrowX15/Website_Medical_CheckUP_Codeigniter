<?php

namespace App\Models;

use CodeIgniter\Model;

class KesimpulanModel extends Model
{
    protected $table = 'kesimpulan';
    protected $primaryKey = 'no_rm';
    protected $allowedFields = [
        'no_rm', 'pemeriksaan_fisik', 'thorax', 'laboratorium',
        'saran', 'imt', 'tatalaksana'
    ];
    protected $useTimestamps = true;

    public function getKesimpulan($no_rm = false)
    {
        if ($no_rm === false) {
            return $this->select('kesimpulan.*, pasien.nama')
                       ->join('pasien', 'pasien.no_rm = kesimpulan.no_rm')
                       ->findAll();
        }
        return $this->where(['no_rm' => $no_rm])->first();
    }
}
