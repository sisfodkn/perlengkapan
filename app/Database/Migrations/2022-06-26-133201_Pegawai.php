<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nip_nrp' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'nama_pegawai' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'pangkat' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'id_jabatan' => [
                'type' => 'int',
                'unsigned' => true
            ],
            'id_unit' => [
                'type' => 'int',
                'unsigned' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        //
    }
}
