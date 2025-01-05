<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'nama_lengkap',
        'username',
        'password',
        'email',
        'role_id',
        'last_login'
    ];

    protected $validationRules = [
        'nama_lengkap' => 'required',
        'username' => 'required|min_length[4]|is_unique[user.username,id,{id}]',
        'password' => 'required|min_length[6]',
        'email' => 'required|valid_email|is_unique[user.email,id,{id}]',
        'role_id' => 'required|numeric'
    ];
}
