<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RegisterKunjungan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_register_kunjungan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
                'unsigned'       => false,
            ],
            'nomor_rekam_medis' => [
                'type'       => 'INT',
            ],
            'nik' => [
                'type'       => 'BIGINT',
            ],
            'nama_penderita' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_lahir' => [
                'type'       => 'DATE',
            ],
            'agama' => [
                'type'       => 'ENUM',
                'constraint' => ['islam', 'kristen (protestan)', 'hindu', 'budha', 'katolik', 'konghucu', 'penghayat', 'lain lain'],
            ],
            'tanggal_masuk' => [
                'type'       => 'DATE',
            ],
            'petugas_bertanggung_jawab' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'kelurahan' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],
            'diagnosa' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'therapy_or_obat' => [
                'type'       => 'VARCHAR',
                'constraint' => 70,
            ],
            'jenis_kunjungan' => [
                'type'       => 'ENUM',
                'constraint' => ['pasien lama', 'pasien baru'],
            ],
            'jasa' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'icd' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],
            'id_user_petugas' => [
                'type'       => 'INT',
                'constraint' => 11,
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

        $this->forge->addKey('id_register_kunjungan', true);

        $this->forge->addForeignKey(
            'id_user_petugas',
            'user',
            'id_user',
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

        $this->forge->createTable('register_kunjungan');
    }

    public function down()
    {
        $this->forge->dropTable('register_kunjungan');
    }
}
