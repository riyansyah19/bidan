<?php

namespace App\Models;

use CodeIgniter\Model;

class bayi extends Model
{
    protected $table = 'register_bayi';
    protected $primaryKey = 'id_register_bayi';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_register_bayi', 'nomor_rekam_medis', 'nik', 'nama_bayi', 'jenis_kelamin', 'tanggal_lahir', 'nama_ibu', 'alamat_lengkap', 'no_telepon', 'berat_badan', 'panjang_lahir', 'memiliki_buku_kia', 'catatan_neonatal', 'id_general'];
    public function generateID()
    {
        $allIDs = $this->where('id_register_bayi LIKE', 'rk%')->findAll();

        // Ambil angka di belakang 'rk' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_register_bayi'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'rk' . ($max + 1);
        return $newID;
    }
}
