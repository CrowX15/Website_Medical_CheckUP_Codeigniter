<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];


     // Method baru untuk mengambil roles non-admin
     public function getNonAdminRoles()
     {
         return $this->where('name !=', 'admin_sirs')->findAll();
     }

    // Method untuk mendapatkan role berdasarkan ID
    public function getRoleById($id)
    {
        return $this->find($id);
    }
}
