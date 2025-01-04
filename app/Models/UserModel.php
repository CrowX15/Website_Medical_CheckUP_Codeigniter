<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email', 'role_id', 'nama_lengkap'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    protected $validationRules = [
        'username' => 'required|min_length[4]|is_unique[user.username]',
        'password' => 'required|min_length[6]',
        'email'    => 'permit_empty|valid_email|is_unique[user.email]', // ubah required menjadi permit_empty
        'role_id'  => 'required|numeric',
        'nama_lengkap' => 'required'
    ];
    
    protected $validationMessages = [
        'username' => [
            'required' => 'Username harus diisi',
            'min_length' => 'Username minimal 4 karakter',
            'is_unique' => 'Username sudah digunakan'
        ],
        // tambahkan pesan error lainnya
    ];
}
