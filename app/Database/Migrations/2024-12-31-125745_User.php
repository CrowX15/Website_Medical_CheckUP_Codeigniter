<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration //2024-12-31-125745_User.php
{
    public function up()
    {
        $this->forge->addField
        ([
            'id' => 
            [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255, // Untuk menyimpan password yang dienkripsi
            ],
            'email' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'role_id' => 
            [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'last_login timestamp default now()'
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
