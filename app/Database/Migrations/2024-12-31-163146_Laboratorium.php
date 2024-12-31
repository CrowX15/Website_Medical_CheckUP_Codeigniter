<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laboratorium extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_rm' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'id_tipeperiksa_lab' => 
            [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            ],
            'hasil_lab' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'biaya' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
        ]);
        $this->forge->addForeignKey('no_rm', 'pasien', 'no_rm', 'CASCADE', 'CASCADE'); // Foreign Key
        $this->forge->addForeignKey('id_tipeperiksa_lab', 'master_lab', 'id_tipeperiksa_lab', 'CASCADE', 'CASCADE'); // Relasi dengan tabel master_lab
        $this->forge->createTable('laboratorium');
    }


    public function down()
    {
        $this->forge->dropTable('laboratorium', true);
    }
}
