<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterLabModel extends Model
{
    protected $table = 'master_lab';
    protected $primaryKey = 'id_tipeperiksa_lab';
    protected $allowedFields = ['tipeperiksa_lab'];
    protected $useTimestamps = true;

    public function getTipePeriksaLab($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->find($id);
    }
}
