<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description'];


    public function getRegisterableRoles()
    {
        return $this->where('id !=', 1) // Kecuali admin
                    ->findAll();
    }
}

