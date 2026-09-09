<?php

namespace App\Models;

use CodeIgniter\Model;

class pasien extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_pasien', 'nomor_rekam_medis', 'nik', 'nama_pasien', 'tanggal_lahir', 'alamat_lengkap', 'no_telepon', 'jenis_kelamin', 'agama'];

    public function generateID()
    {
        $allIDs = $this->where('id_pasien LIKE', 'ps%')->findAll();

        // Ambil angka di belakang 'ps' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_pasien'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'ps' . ($max + 1);
        return $newID;
    }
}
