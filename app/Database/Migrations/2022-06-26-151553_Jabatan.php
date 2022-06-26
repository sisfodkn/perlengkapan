<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jabatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_jabatan' => [
                'type' => 'varchar',
                'constraint' => '100'
            ]
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('jabatan');
    }

    public function down()
    {
        //
    }
}
