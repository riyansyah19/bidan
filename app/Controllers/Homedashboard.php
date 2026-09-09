<?php

namespace App\Controllers;

use App\Models\rekam;

class Homedashboard extends BaseController
{
    protected $rekam;
    public function __construct()
    {
        $this->rekam = new rekam();
    }
    public function dashboard(): string
    {
        $model = $this->rekam;

        // Ambil tanggal hari ini dalam format 'Y-m-d'
        $today = date('Y-m-d');

        // Hitung jumlah kunjungan hari ini
        $jumlahKunjunganHariIni = $model
            ->where('DATE(created_at)', $today)
            ->countAllResults();

        $jumlahPasienBaruHariIni = $model
            ->where('DATE(created_at)', $today)
            ->where('jenis_kunjungan', 'pasien baru')
            ->countAllResults();


        // Jumlah hari unik (jumlah hari berbeda di mana ada kunjungan)
        $db = \Config\Database::connect();
        $builder = $db->table('register_kunjungan');

        $totalKunjungan = $builder->countAllResults();

        $jumlahHariUnik = $builder
            ->select('DATE(created_at) as tanggal')
            ->groupBy('DATE(created_at)')
            ->get()
            ->getNumRows();

        // Hitung rata-rata kunjungan per hari
        $rataRataKunjungan = ($jumlahHariUnik > 0) ? round($totalKunjungan / $jumlahHariUnik, 2) : 0;

        $awalGrafik = date('Y-m-d', strtotime('-6 days'));
        $akhirGrafik = date('Y-m-d');
        $dataKunjungan = $db->table('register_kunjungan')
            ->select('DATE(created_at) as tanggal, COUNT(*) as jumlah')
            ->where('created_at >=', $awalGrafik . ' 00:00:00')
            ->where('created_at <=', $akhirGrafik . ' 23:59:59')
            ->groupBy('DATE(created_at)')
            ->orderBy('tanggal', 'ASC')
            ->get()
            ->getResultArray();

        $jumlahPerTanggal = [];
        foreach ($dataKunjungan as $row) {
            $jumlahPerTanggal[$row['tanggal']] = (int) $row['jumlah'];
        }

        $grafikKunjunganLabels = [];
        $grafikKunjunganData = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = date('Y-m-d', strtotime("-{$i} days"));
            $grafikKunjunganLabels[] = date('d/m', strtotime($tanggal));
            $grafikKunjunganData[] = $jumlahPerTanggal[$tanggal] ?? 0;
        }

        return view('dashboard', [
            'jumlahHariIni' => $jumlahKunjunganHariIni,
            'jumlahPasienBaru' => $jumlahPasienBaruHariIni,
            'rataRataKunjungan' => $rataRataKunjungan,
            'grafikKunjunganLabels' => $grafikKunjunganLabels,
            'grafikKunjunganData' => $grafikKunjunganData,
        ]);
    }
}
