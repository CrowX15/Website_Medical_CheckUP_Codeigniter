<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pasien extends Migration
{
    public function up()
    {
        $this->forge->addField
        ([
            'no_rm' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'nama' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'perusahaan' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'nik' => 
            [
                'type' => 'INT',
                'constraint' => 16,
                'null' => true,
            ],
            'departemen' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'bagian' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'usia' => 
            [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
            ],
            'tgl_mcu' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('no_rm', true); // Primary Key
        $this->forge->createTable('pasien');
    }


    public function down()
    {
        $this->forge->dropTable('pasien', true);
    }
}
