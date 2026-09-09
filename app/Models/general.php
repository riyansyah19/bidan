<?php

namespace App\Models;

use CodeIgniter\Model;

class general extends Model
{
    protected $table = 'general_consent';
    protected $primaryKey = 'id_general_consent';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_general_consent', 'nomor_rekam_medis_gc', 'nik', 'tanggal_lahir', 'nama_pasien', 'no_hp_pasien', 'alamat_pasien', 'nama_wali', 'tanggal_lahir_wali', 'alamat_wali', 'hubungan_dengan_pasien', 'no_hp_wali', 'penanggung_jawab', 'saksi', 'pasien', 'petugas', 'id_kunjungan'];
    public function generateID()
    {
        $allIDs = $this->where('id_general_consent LIKE', 'rk%')->findAll();

        // Ambil angka di belakang 'rk' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_general_consent'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'rk' . ($max + 1);
        return $newID;
    }
}
