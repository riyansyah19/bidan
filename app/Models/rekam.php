<?php

namespace App\Models;

use CodeIgniter\Model;

class rekam extends Model
{
    protected $table = 'register_kunjungan';
    protected $primaryKey = 'id_register_kunjungan';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_register_kunjungan', 'nomor_rekam_medis', 'nik', 'tanggal_lahir', 'nama_penderita', 'alamat', 'kelurahan', 'diagnosa', 'therapy_or_obat', 'jenis_kunjungan', 'jasa', 'keterangan', 'agama', 'tanggal_masuk', 'petugas_bertanggung_jawab', 'id_user_petugas', 'id_pasien', 'icd'];

    public function getAll($No_RM = null)
    {
        $builder = $this->db->table('register_kunjungan');
        $builder->join('general_consent', 'register_kunjungan.id_register_kunjungan = general_consent.id_kunjungan');
        $builder->join('register_bayi', 'general_consent.id_general_consent = register_bayi.id_general');
        $builder->join('kartu_ibu_identitas', 'general_consent.id_general_consent = kartu_ibu_identitas.id_general_k');
        $builder->join('register_balita', 'general_consent.id_general_consent = register_balita.id_general_b');
        $builder->join('informed_consent_persetujuan', 'kartu_ibu_identitas.id_kartu_ibu = informed_consent_persetujuan.id_k_ibu', 'left');
        $builder->join('register_persalinan', 'informed_consent_persetujuan.id_informed_consent_p = register_persalinan.id_informed', 'left');
        $builder->join('register_pelayanan_kb', 'informed_consent_persetujuan.id_informed_consent_p = register_pelayanan_kb.id_informed', 'left');


        if ($No_RM !== null) {
            $builder->where('register_kunjungan.nomor_rekam_medis', $No_RM);
        }

        $query = $builder->get();
        return $query->getResult();
    }
    public function generateID()
    {
        $allIDs = $this->where('id_register_kunjungan LIKE', 'rk%')->findAll();

        // Ambil angka di belakang 'rk' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_register_kunjungan'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'rk' . ($max + 1);
        return $newID;
    }
}
