<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mastericd extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_icd' => [
                'type'           => 'BIGINT',
                'auto_increment' => true,
            ],
            'vol_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'vol_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_icd', true);

        $this->forge->createTable('master_icd10');
    }

    public function down()
    {
        $this->forge->dropTable('master_icd10');
    }
}
