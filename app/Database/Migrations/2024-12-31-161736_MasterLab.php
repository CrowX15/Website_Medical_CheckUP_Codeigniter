<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterLab extends Migration
{
    public function up()
    {
        $this->forge->addField
        ([
            'id_tipeperiksa_lab' =>
            [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tipeperiksa_lab' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
        $this->forge->addKey('id_tipeperiksa_lab', true); // Primary Key
        $this->forge->createTable('master_lab');
    }


    public function down()
    {
        $this->forge->dropTable('master_lab', true);
    }
}
