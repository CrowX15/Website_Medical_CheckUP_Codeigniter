<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
                'unique' => true, // Menambahkan unique constraint
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255, // Untuk menyimpan password yang dienkripsi
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
                'unique' => true, // Menambahkan unique constraint
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'last_login' => [
                'type' => 'TIMESTAMP',
                'default' => null, // Atur default menjadi null
                'null' => true,
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP', // Menambahkan timestamp untuk pencatatan waktu
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP', // Menambahkan timestamp untuk pencatatan waktu update
        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->addForeignKey('role_id', 'roles', 'id', 'CASCADE', 'CASCADE'); // Foreign Key
        $this->forge->createTable('user');

    }

    public function down()
    {
        $this->forge->dropTable('user', true);
    }
}
