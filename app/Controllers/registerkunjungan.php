<?php

namespace App\Controllers;

use App\Models\rekam;
use App\Models\usermodel;
use App\Models\pasien;
use App\Models\icd;

class registerkunjungan extends BaseController
{
    protected $rekam;
    protected $user;
    protected $pasien;
    protected $icd;
    public function __construct()
    {
        $this->rekam = new rekam();
        $this->user = new usermodel();
        $this->pasien = new pasien();
        $this->icd = new icd();
    }
    public function pengunjung(): string
    {
        $data = [
            'validation' => session()->getFlashdata('validation'),
            'kun' => $this->user->findAll(),
            'pasien' => $this->pasien->findAll(),
            'icd' => $this->icd->findAll()
        ];
        return view('registerkunjungan', $data);
    }
    public function getRekamMedis($id_pasien)
    {
        $data = $this->pasien->find($id_pasien);

        if ($data) {
            return $this->response->setJSON([
                'nomor_rekam' => $data['nomor_rekam_medis'],
                'nik' => $data['nik'],
                'nama_penderita' => $data['nama_pasien'],
                'alamat' => $data['alamat_lengkap'],
                'tanggal_lahir' => $data['tanggal_lahir'],
            ]);
        } else {
            return $this->response->setJSON([
                'nomor_rekam' => '',
                'nik' => '',
                'nama_penderita' => '',
                'alamat' => '',
                'tanggal_lahir' => '',
            ]);
        }
    }
    public function save()
    {
        $data = [
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Agama tidak boleh kosong!'
                ]
            ],
            'Kelurahan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kelurahan tidak boleh kosong!'
                ]
            ],
            'Diagnosa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Diagnosa tidak boleh kosong!'
                ]
            ],
            'Terapi_Obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Terapi obat tidak boleh kosong!'
                ]
            ],
            'tanggal_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal masuk tidak boleh kosong!'
                ]
            ],
            'jenis_kunjungan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kunjungan tidak boleh kosong!'
                ]
            ],
            'Jasa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jasa tidak boleh kosong!'
                ]
            ],
            'petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Petugas tidak boleh kosong!'
                ]
            ],
            'id_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'id Petugas tidak boleh kosong!'
                ]
            ],
            'id_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'id Pasien tidak boleh kosong!'
                ]
            ],
            'vol_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'icd tidak boleh kosong!'
                ]
            ],
            // Tambahkan field lain di sini jika perlu
        ];

        if (!$this->validate($data)) {
            return redirect()->to('/kunjungan')->withInput()->with('validation', \Config\Services::validation());
        }
        $id = $this->rekam->generateID();
        $this->rekam->insert([
            'id_register_kunjungan' => $id,
            'nomor_rekam_medis' => $this->request->getVar('nomor_rekam'),
            'nik' => $this->request->getVar('nik'),
            'nama_penderita' => $this->request->getVar('nama_penderita'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'kelurahan' => $this->request->getVar('Kelurahan'),
            'diagnosa' => $this->request->getVar('Diagnosa'),
            'therapy_or_obat' => $this->request->getVar('Terapi_Obat'),
            'jenis_kunjungan' => $this->request->getVar('jenis_kunjungan'),
            'jasa' => $this->request->getVar('Jasa'),
            'keterangan' => $this->request->getVar('Keterangan'),
            'agama' => $this->request->getVar('agama'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'petugas_bertanggung_jawab' => $this->request->getVar('petugas'),
            'id_user_petugas' => $this->request->getVar('id_petugas'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'icd' => $this->request->getVar('vol_name'),
        ]);
        session()->setFlashdata('pesankunjungan', 'data berhasil ditambahkan');
        return redirect()->to('/kunjungan');
    }
    public function tedit($id)
    {
        $data = [
            'rek' => $this->rekam->where(['id_register_kunjungan' => $id])->first(),
            'kun' => $this->user->findAll(),
            'pasien' => $this->pasien->findAll(),
            'icd' => $this->icd->findAll()
        ];

        return view('edit/registerkunjungan', $data);
    }

    public function update($id)
    {
        $data = [
            'nomor_rekam_medis' => $this->request->getVar('nomor_rekam'),
            'nik' => $this->request->getVar('nik'),
            'nama_penderita' => $this->request->getVar('nama_penderita'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'kelurahan' => $this->request->getVar('Kelurahan'),
            'diagnosa' => $this->request->getVar('Diagnosa'),
            'therapy_or_obat' => $this->request->getVar('Terapi_Obat'),
            'jenis_kunjungan' => $this->request->getVar('jenis_kunjungan'),
            'jasa' => $this->request->getVar('Jasa'),
            'keterangan' => $this->request->getVar('Keterangan'),
            'agama' => $this->request->getVar('agama'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'petugas_bertanggung_jawab' => $this->request->getVar('petugas'),
            'id_user_petugas' => $this->request->getVar('id_petugas'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'icd' => $this->request->getVar('vol_name'),
        ];

        // Gunakan $id sebagai parameter pertama
        $this->rekam->update($id, $data);

        session()->setFlashdata('pesan', 'data berhasil diedit');
        return redirect()->to('/daftar');
    }

    public function delete($id)
    {
        $this->rekam->delete($id);
        return redirect()->to('/daftar');
    }
}
