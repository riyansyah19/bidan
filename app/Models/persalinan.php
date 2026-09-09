<?php

namespace App\Models;

use CodeIgniter\Model;

class persalinan extends Model
{
    protected $table = 'register_persalinan';
    protected $primaryKey = 'id_register_persalinan';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_register_persalinan', 'nomor_rekam_medis', 'nik', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat_lengkap', 'no_telepon', 'penolong', 'tempat', 'pendamping', 'transportasi', 'pendonor_darah', 'id_informed'];
    public function generateID()
    {
        $allIDs = $this->where('id_register_persalinan LIKE', 'rk%')->findAll();

        // Ambil angka di belakang 'rk' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_register_persalinan'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'rk' . ($max + 1);
        return $newID;
    }
}
