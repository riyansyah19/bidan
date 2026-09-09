<?php

namespace App\Controllers;

use App\Models\rekam;
use App\Models\general;

class generalconsent extends BaseController
{
    protected $general;
    protected $rekam;
    public function __construct()
    {
        $this->general = new general();
        $this->rekam = new rekam();
    }
    public function general(): string
    {
        $data = [
            'validation' => session()->getFlashdata('validation'),
            'gen' => $this->rekam->findAll()
        ];
        return view('generalconsent', $data);
    }
    public function getRekamMedis_g($id_kunjungan)
    {
        $data = $this->rekam->find($id_kunjungan);

        if ($data) {
            return $this->response->setJSON([
                'nomor_rekam_medis' => $data['nomor_rekam_medis'],
                'nik' => $data['nik'],
                'nama_pasien' => $data['nama_penderita'],
                'alamat_pasien' => $data['alamat'],
            ]);
        } else {
            return $this->response->setJSON([
                'nomor_rekam_medis' => '',
                'nik' => '',
                'nama_pasien' => '',
                'alamat_pasien' => '',
            ]);
        }
    }
    public function save()
    {
        $data = [
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir tidak boleh kosong!'
                ]
            ],
            'no_hp_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomer HP Pasien tidak boleh kosong!'
                ]
            ],
            'nama_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Wali tidak boleh kosong!'
                ]
            ],
            'tanggal_lahir_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Wali tidak boleh kosong!'
                ]
            ],
            'alamat_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Wali tidak boleh kosong!'
                ]
            ],
            'hubungan_dengan_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hubungan Dengan Pasien tidak boleh kosong!'
                ]
            ],
            'no_hp_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomer HP Wali ke tidak boleh kosong!'
                ]
            ],
            'id_kunjungan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID Kunjungan tidak boleh kosong!'
                ]
            ],

        ];

        if (!$this->validate($data)) {
            return redirect()->to('/general')->withInput()->with('validation', \Config\Services::validation());
        }

        $fileSaksi = $this->request->getFile('saksi');
        $filePenanggung = $this->request->getFile('penanggung_jawab');
        $filePetugas = $this->request->getFile('petugas');
        $id = $this->general->generateID();
        $this->general->insert([
            'id_general_consent' => $id,
            'nomor_rekam_medis_gc' => $this->request->getVar('nomor_rekam_medis'),
            'nik' => $this->request->getVar('nik'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'no_hp_pasien' => $this->request->getVar('no_hp_pasien'),
            'alamat_pasien' => $this->request->getVar('alamat_pasien'),
            'nama_wali' => $this->request->getVar('nama_wali'),
            'tanggal_lahir_wali' => $this->request->getVar('tanggal_lahir_wali'),
            'alamat_wali' => $this->request->getVar('alamat_wali'),
            'hubungan_dengan_pasien' => $this->request->getVar('hubungan_dengan_pasien'),
            'no_hp_wali' => $this->request->getVar('no_hp_wali'),
            'saksi' => file_get_contents($fileSaksi->getTempName()),
            'penanggung_jawab' => file_get_contents($filePenanggung->getTempName()),
            'petugas' => file_get_contents($filePetugas->getTempName()),
            'id_kunjungan' => $this->request->getVar('id_kunjungan'),
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/general');
    }

    public function tedit($id)
    {
        $data = [
            'gen' => $this->general->where(['id_general_consent' => $id])->first(),
            'rek' => $this->rekam->findAll()
        ];

        return view('edit/generalconsent', $data);
    }

    public function update($id)
    {
        $fileSaksi = $this->request->getFile('saksi');
        $filePenanggung = $this->request->getFile('penanggung_jawab');
        $filePetugas = $this->request->getFile('petugas');
        $data = [
            'nomor_rekam_medis_gc' => $this->request->getVar('nomor_rekam_medis'),
            'nik' => $this->request->getVar('nik'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'no_hp_pasien' => $this->request->getVar('no_hp_pasien'),
            'alamat_pasien' => $this->request->getVar('alamat_pasien'),
            'nama_wali' => $this->request->getVar('nama_wali'),
            'tanggal_lahir_wali' => $this->request->getVar('tanggal_lahir_wali'),
            'alamat_wali' => $this->request->getVar('alamat_wali'),
            'hubungan_dengan_pasien' => $this->request->getVar('hubungan_dengan_pasien'),
            'no_hp_wali' => $this->request->getVar('no_hp_wali'),
            'saksi' => file_get_contents($fileSaksi->getTempName()),
            'penanggung_jawab' => file_get_contents($filePenanggung->getTempName()),
            'petugas' => file_get_contents($filePetugas->getTempName()),
            'id_kunjungan' => $this->request->getVar('id_kunjungan'),
        ];

        // Gunakan $id sebagai parameter pertama
        $this->general->update($id, $data);

        session()->setFlashdata('pesan', 'data berhasil diedit');
        return redirect()->to('/daftar');
    }

    public function delete($id)
    {
        $this->general->delete($id);
        return redirect()->to('/daftar');
    }
}
