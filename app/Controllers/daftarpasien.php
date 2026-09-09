<?php

namespace App\Controllers;

use App\Models\rekam;
use App\Models\general;
use App\Models\informed;
use App\Models\kartu;
use App\Models\kartup;
use App\Models\kartur;
use App\Models\pelayanankb;
use App\Models\persalinan;
use App\Models\balita;
use App\Models\bayi;
use App\Models\pasien;

class daftarpasien extends BaseController
{
    protected $rekam;
    protected $gen;
    protected $inf;
    protected $per;
    protected $pel;
    protected $bay;
    protected $bal;
    protected $kar;
    protected $karp;
    protected $karr;
    protected $pasien;
    public function __construct()
    {
        $this->rekam = new rekam();
        $this->gen = new general();
        $this->inf = new informed();
        $this->per = new persalinan();
        $this->pel = new pelayanankb();
        $this->bay = new bayi();
        $this->bal = new balita();
        $this->kar = new kartu();
        $this->karp = new kartup();
        $this->karr = new kartur();
        $this->pasien = new pasien();
    }
    public function daftar(): string
    {
        $keyword = $this->request->getVar('keyword');

        if (!empty($keyword)) {
            $rekame = $this->pasien
                ->like('nomor_rekam_medis', $keyword)
                ->orLike('nik', $keyword)
                ->orLike('nama_pasien', $keyword)
                ->orderBy('created_at', 'desc')
                ->findAll();
        } else {
            $rekame = $this->pasien
                ->orderBy('created_at', 'desc')
                ->findAll();
        }

        $data = [
            'rek' => $rekame,
            'keyword' => $keyword
        ];

        return view('daftarpasien', $data);
    }

    public function lihat($nomor_rekam_medis)
    {
        $data = [
            'reke' => $this->rekam->where(['nomor_rekam_medis' => $nomor_rekam_medis])->first(),
            'gen' => $this->gen->where(['nomor_rekam_medis_gc' => $nomor_rekam_medis])->findAll(),
            'inf' => $this->inf->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll(),
            'per' => $this->per->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll(),
            'pel' => $this->pel->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll(),
            'bal' => $this->bal->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll(),
            'bay' => $this->bay->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll(),
            'kar' => $this->kar->getAll($nomor_rekam_medis),
            'karp' => $this->karp->where(['nomor_rekam_medis' => $nomor_rekam_medis])
                ->orderBy('created_at', 'DESC')
                ->findAll(),
            'karr' => $this->karr->where(['nomor_rekam_medis' => $nomor_rekam_medis])
                ->orderBy('created_at', 'DESC')
                ->findAll(),
            're' => $this->rekam->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll()

        ];

        return view('lihat', $data);
    }
    public function tampilkanGambar_gen($id, $field = 'saksi')
    {
        $gena = $this->gen->where('nomor_rekam_medis_gc', $id);
        $query = $gena->get();
        $data = $query->getRow();

        if ($data && isset($data->$field)) {
            $gambar = $data->$field;
            return $this->response
                ->setHeader('Content-Type', 'image/jpg') // ganti sesuai mime type
                ->setBody($gambar);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Gambar tidak ditemukan.");
        }
    }
    public function tampilkanGambar_inf($id, $field = 'saksi')
    {
        $infor = $this->inf->where('nomor_rekam_medis', $id);
        $query = $infor->get();
        $data = $query->getRow();

        if ($data && isset($data->$field)) {
            $gambar = $data->$field;
            return $this->response
                ->setHeader('Content-Type', 'image/jpg') // ganti sesuai mime type
                ->setBody($gambar);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Gambar tidak ditemukan.");
        }
    }

    public function resume($nomor_rekam_medis)
    {
        $data = [
            'reke' => $this->rekam->where(['nomor_rekam_medis' => $nomor_rekam_medis])->first(),
            'gen' => $this->gen->where(['nomor_rekam_medis_gc' => $nomor_rekam_medis])->findAll(),
            'inf' => $this->inf->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll(),
            'per' => $this->per->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll(),
            'pel' => $this->pel->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll(),
            'bal' => $this->bal->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll(),
            'bay' => $this->bay->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll(),
            'kar' => $this->kar->getAll($nomor_rekam_medis),
            're' => $this->rekam->where(['nomor_rekam_medis' => $nomor_rekam_medis])->findAll()

        ];
        return view('resume', $data);
    }
}
