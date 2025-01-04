<?php

namespace App\Models;

use CodeIgniter\Model;

class RadiologiModel extends Model
{
    protected $table = 'radiologi';
    protected $allowedFields = ['no_rm', 'id_tipeperiksa_rad', 'hasil_rad', 'kesimpulan'];
    protected $useTimestamps = true;

    public function getHasilRad($no_rm = false)
    {
        if ($no_rm === false) {
            return $this->select('radiologi.*, pasien.nama, master_rad.tipeperiksa_rad')
                       ->join('pasien', 'pasien.no_rm = radiologi.no_rm')
                       ->join('master_rad', 'master_rad.id_tipeperiksa_rad = radiologi.id_tipeperiksa_rad')
                       ->findAll();
        }
        return $this->where(['no_rm' => $no_rm])->findAll();
    }
}
