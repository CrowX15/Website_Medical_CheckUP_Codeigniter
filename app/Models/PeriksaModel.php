<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriksaModel extends Model
{
    protected $table = 'periksa';
    protected $primaryKey = 'no_rm';
    protected $allowedFields = [
        'no_rm', 'batuk_darah', 'kencing_batu', 'hepatitis', 
        'hernia', 'hipertensi', 'hemoroid', 'diabetes',
        'tinggi_badan', 'berat_badan', 'nadi', 'tekanan_darah',
        'visus', 'buta_warna'
    ];
    protected $useTimestamps = true;

    public function getHasilPeriksa($no_rm = false)
    {
        if ($no_rm === false) {
            return $this->select('periksa.*, pasien.nama')
                       ->join('pasien', 'pasien.no_rm = periksa.no_rm')
                       ->findAll();
        }
        return $this->where(['no_rm' => $no_rm])->first();
    }
}
