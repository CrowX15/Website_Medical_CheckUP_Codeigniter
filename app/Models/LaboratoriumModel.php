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
                       ->findAll();
        }
        return $this->where(['no_rm' => $no_rm])->findAll();
    }
}
