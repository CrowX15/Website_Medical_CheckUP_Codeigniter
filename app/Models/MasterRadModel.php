<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterRadModel extends Model
{
    protected $table = 'master_rad';
    protected $primaryKey = 'id_tipeperiksa_rad';
    protected $allowedFields = ['tipeperiksa_rad'];
    protected $useTimestamps = true;

    public function getTipePeriksaRad($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->find($id);
    }
}
