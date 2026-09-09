<?php

namespace App\Models;

use CodeIgniter\Model;

class balita extends Model
{
    protected $table = 'register_balita';
    protected $primaryKey = 'id_register_balita';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_register_balita', 'nomor_rekam_medis', 'nik', 'nama', 'alamat', 'jenis_kelamin', 'tanggal_lahir', 'no_telepon', 'nama_ibu', 'berat_badan', 'tinggi_badan', 'anak_ke', 'catatan_imunisasi', 'id_general_b'];
    public function generateID()
    {
        $allIDs = $this->where('id_register_balita LIKE', 'rk%')->findAll();

        // Ambil angka di belakang 'rk' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_register_balita'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'rk' . ($max + 1);
        return $newID;
    }
}
