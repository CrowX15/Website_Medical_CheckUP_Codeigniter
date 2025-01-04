<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'no_rm';
    protected $allowedFields = ['no_rm', 'nama', 'perusahaan', 'nik', 'departemen', 'bagian', 'usia', 'tgl_mcu'];
    protected $useTimestamps = true;

    public function getPasien($no_rm = false)
    {
        if ($no_rm === false) {
            return $this->findAll();
        }
        return $this->where(['no_rm' => $no_rm])->first();
    }
}
