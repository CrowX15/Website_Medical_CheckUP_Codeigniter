<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Periksa extends Migration
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
            'batuk_darah' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'kencing_batu' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'hepatitis' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'hernia' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'hipertensi' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'hemoroid' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'diabetes' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'tinggi_badan' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'berat_badan' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'nadi' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'tekanan_darah' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'visus' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'buta_warna' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
        ]);
        $this->forge->addForeignKey('no_rm', 'pasien', 'no_rm', 'CASCADE', 'CASCADE'); // Foreign Key
        $this->forge->createTable('periksa');
    }


    public function down()
    {
        $this->forge->dropTable('periksa', true);
    }
}
