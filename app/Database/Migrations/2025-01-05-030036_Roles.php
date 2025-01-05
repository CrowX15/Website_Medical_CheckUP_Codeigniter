<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
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
            'name' => [ // Ubah 'roles' menjadi 'name' agar lebih sesuai
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'description' => [ // Tambah deskripsi role
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [ // Tambah created_at
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [ // Tambah updated_at
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ]
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('roles');

        // Tambahkan data default roles
        $seeder = \Config\Database::seeder();
        $seeder->call('RoleSeeder');

    }

    public function down()
    {
        $this->forge->dropTable('roles', true);
    }
}
