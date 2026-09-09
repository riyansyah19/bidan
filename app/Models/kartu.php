<?php

namespace App\Models;

use CodeIgniter\Model;

class kartu extends Model
{
    protected $table = 'kartu_ibu_identitas';
    protected $primaryKey = 'id_kartu_ibu';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_kartu_ibu', 'nomor_rekam_medis', 'nik', 'nama_lengkap_ibu', 'nama_suami', 'jenis_kelamin', 'tanggal_lahir', 'no_telepon', 'agama', 'suku', 'bahasa', 'alamat', 'rt_or_rw', 'desa_or_kelurahan', 'kecamatan', 'kota_or_kabupaten', 'kode_pos', 'provinsi', 'negara', 'pendidikan', 'pekerjaan', 'status_pernikahan', 'pembayaran', 'posyandu', 'nama_kader', 'disabilitas', 'tanggal_registrasi', 'no_telp', 'id_general_k'];
    public function getAll($No_RM = null)
    {
        $builder = $this->db->table('kartu_ibu_identitas');


        if ($No_RM !== null) {
            $builder->where('kartu_ibu_identitas.nomor_rekam_medis', $No_RM);
        }

        $query = $builder->get();
        return $query->getResult();
    }
    public function generateID()
    {
        $allIDs = $this->where('id_kartu_ibu LIKE', 'rk%')->findAll();

        // Ambil angka di belakang 'rk' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_kartu_ibu'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'rk' . ($max + 1);
        return $newID;
    }
}

class kartup extends Model
{
    protected $table = 'kartu_ibu_pemeriksaan';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_kartu_ibu_p', 'tanggal_hpht', 'tanggal_periksa', 'taksiran_persalinan', 'tanggal_persalinan_sebelumnya', 'bb_sebelum_hamil', 'bb_saat_ini', 'pendidikan_ibu', 'pekerjaan_ibu', 'lila', 'tinggi_badan', 'gol_darah', 'riwayat_kb', 'buku_kia', 'riwayat_persalinan', 'status_gizi', 'riwayat_komplikasi', 'riwayat_penyakit', 'id_kartu_ibup', 'nomor_rekam_medis'];
    public function generateID()
    {
        $allIDs = $this->where('id_kartu_ibu_p LIKE', 'rk%')->findAll();

        // Ambil angka di belakang 'rk' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_kartu_ibu_p'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'rk' . ($max + 1);
        return $newID;
    }
}

class kartur extends Model
{
    protected $table = 'kartu_ibu_riwayat';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_kartu_ibu_r', 'gravida', 'partus', 'abortus', 'hidup', 'catatan_khusus', 'id_kartu_ibur', 'nomor_rekam_medis'];
    public function generateID()
    {
        $allIDs = $this->where('id_kartu_ibu_r LIKE', 'rk%')->findAll();

        // Ambil angka di belakang 'rk' dan cari angka terbesar
        $max = 0;
        foreach ($allIDs as $row) {
            $angka = intval(substr($row['id_kartu_ibu_r'], 2));
            if ($angka > $max) {
                $max = $angka;
            }
        }

        $newID = 'rk' . ($max + 1);
        return $newID;
    }
}
