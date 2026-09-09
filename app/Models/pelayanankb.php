<?php

namespace App\Models;

use CodeIgniter\Model;

class pelayanankb extends Model
{
    protected $table = 'register_pelayanan_kb';
    protected $primaryKey = 'id_register_pelayanan_kb';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_register_pelayanan_kb', 'nomor_rekam_medis', 'nik', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'nama_ibu', 'alamat_lengkap', 'jenis_pasien', 'nama_suami', 'jumlah_anak', 'gakin', '4t', 'metode', 'catatan_alki', 'id_informed'];
    public function generateID()
    {
        $allIDs = $this->where('id_register_pelayanan_kb LIKE', 'rk%')->findAll();

        // Ambil angka di belakang 'rk' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_register_pelayanan_kb'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'rk' . ($max + 1);
        return $newID;
    }
}
