<?php

namespace App\Models;

use CodeIgniter\Model;

class informed extends Model
{
    protected $table = 'informed_consent_persetujuan';
    protected $primaryKey = 'id_informed_consent_p';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_informed_consent_p', 'nomor_rekam_medis', 'nik', 'tanggal_lahir', 'nama_penanggung_jawab', 'jenis_kelamin', 'no_telepon', 'hubungan_dengan_pasien', 'diagnosa', 'tindakan_medis', 'tujuan', 'prognosis', 'resiko_tindakan', 'nama_petugas', 'tanggal_pelaksanaan', 'waktu_mulai_tindakan', 'waktu_selesai_tindakan', 'alat_medis', 'bmhp', 'keterangan', 'saksi', 'penanggung_jawab', 'petugas', 'id_k_ibu', 'icd'];
    public function generateID()
    {
        $allIDs = $this->where('id_informed_consent_p LIKE', 'rk%')->findAll();

        // Ambil angka di belakang 'rk' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_informed_consent_p'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'rk' . ($max + 1);
        return $newID;
    }
}
