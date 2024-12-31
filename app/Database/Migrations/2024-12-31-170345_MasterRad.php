<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterRad extends Migration
{
    public function up()
    {
        $this->forge->addField
        ([
            'id_tipeperiksa_rad' => 
            [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tipeperiksa_rad' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
        $this->forge->addKey('id_tipeperiksa_rad', true); // Primary Key
        $this->forge->createTable('master_rad');
    }


    public function down()
    {
        $this->forge->dropTable('master_rad', true);
    }
}
