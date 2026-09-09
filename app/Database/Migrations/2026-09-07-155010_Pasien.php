<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pasien extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pasien' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'nomor_rekam_medis' => [
                'type'       => 'INT',
            ],
            'nik' => [
                'type'       => 'BIGINT',
            ],
            'nama_pasien' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_lahir' => [
                'type'       => 'DATE',
            ],
            'alamat_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'no_telepon' => [
                'type'       => 'BIGINT',
            ],
            'jenis_kelamin' => [
                'type'       => 'ENUM',
                'constraint' => ['perempuan', 'laki-laki', 'tidak diketahui', 'tidak dapat ditentukan', 'tidak mengisi'],
            ],
            'agama' => [
                'type'       => 'ENUM',
                'constraint' => ['islam', 'kristen (protestan)', 'hindu', 'budha', 'katolik', 'konghucu', 'penghayat', 'lain lain'],
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

        $this->forge->addKey('id_pasien', true);

        $this->forge->createTable('pasien');
    }

    public function down()
    {
        $this->forge->dropTable('pasien');
    }
}
