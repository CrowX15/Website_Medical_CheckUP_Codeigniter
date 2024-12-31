<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Radiologi extends Migration
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
            'id_tipeperiksa_rad' => 
            [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'hasil_rad' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kesimpulan' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addForeignKey('no_rm', 'pasien', 'no_rm', 'CASCADE', 'CASCADE'); // Foreign Key
        $this->forge->addForeignKey('id_tipeperiksa_rad','master_rad','id_tipeperiksa_rad','CASCADE', 'CASCADE');
        $this->forge->createTable('radiologi');
    }


    public function down()
    {
        $this->forge->dropTable('radiologi', true);
    }
}
