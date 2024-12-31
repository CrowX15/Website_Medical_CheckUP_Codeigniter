<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kesimpulan extends Migration
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
            'pemeriksaan_fisik' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'thorax' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'laboratorium' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'saran' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'imt' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'tatalaksana' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addForeignKey('no_rm', 'pasien', 'no_rm', 'CASCADE', 'CASCADE'); // Foreign Key
        $this->forge->createTable('kesimpulan');
    }


    public function down()
    {
        $this->forge->dropTable('kesimpulan', true);
    }
}
