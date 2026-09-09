<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Generalconsent extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_general_consent' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'nomor_rekam_medis' => [
                'type'       => 'INT',
            ],
            'nik' => [
                'type'       => 'BIGINT',
            ],
            'tanggal_lahir' => [
                'type'       => 'DATE',
            ],
            'nama_pasien' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_hp_pasien' => [
                'type'       => 'BIGINT',
            ],
            'alamat_pasien' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'nama_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_lahir_wali' => [
                'type'       => 'DATE',
            ],
            'alamat_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'hubungan_dengan_pasien' => [
                'type'       => 'ENUM',
                'constraint' => ['suami', 'ayah', 'ibu', 'anak', 'saudara', 'diri sendiri', 'lain lain'],
            ],
            'no_hp_wali' => [
                'type'       => 'BIGINT',
            ],
            'penanggung_jawab' => [
                'type'       => 'MEDIUMBLOB',
            ],
            'saksi' => [
                'type'       => 'MEDIUMBLOB',
            ],
            'petugas' => [
                'type'       => 'MEDIUMBLOB',
            ],
            'id_kunjungan' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'id_pasien' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
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

        $this->forge->addKey('id_general_consent', true);

        $this->forge->addForeignKey(
            'id_kunjungan',
            'register_kunjungan',
            'id_register_kunjungan',
            'RESTRICT',
            'SET NULL',
        );

        $this->forge->addForeignKey(
            'id_pasien',
            'pasien',
            'id_pasien',
            'RESTRICT',
            'SET NULL',
        );

        $this->forge->createTable('general_consent');
    }

    public function down()
    {
        $this->forge->dropTable('general_consent');
    }
}
