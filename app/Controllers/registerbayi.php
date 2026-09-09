<?php

namespace App\Controllers;

use App\Models\general;
use App\Models\bayi;

class registerbayi extends BaseController
{
    protected $general;
    protected $bayi;
    public function __construct()
    {
        $this->general = new general();
        $this->bayi = new bayi();
    }
    public function bayi(): string
    {
        $data = [
            'validation' => session()->getFlashdata('validation'),
            'bayi' => $this->general->findAll(),
        ];

        return view('registerbayi', $data);
    }
    public function getRekamMedis_b($id_general)
    {
        $data = $this->general->find($id_general);

        if ($data) {
            return $this->response->setJSON([
                'no_rm' => $data['nomor_rekam_medis_gc'],
                'nik' => $data['nik'],
                'nama_bayi' => $data['nama_pasien'],
                'alamat_lengkap' => $data['alamat_pasien'],
                'tanggal_lahir' => $data['tanggal_lahir'],
            ]);
        } else {
            return $this->response->setJSON([
                'no_rm' => '',
                'nik' => '',
                'nama' => '',
                'alamat_lengkap' => '',
                'tanggal_lahir' => '',
            ]);
        }
    }
    public function save()
    {
        $data = [
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin tidak boleh kosong!'
                ]
            ],
            'alamat_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!'
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama ibu tidak boleh kosong!'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!'
                ]
            ],
            'BB_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berat badan tidak boleh kosong!'
                ]
            ],
            'panjang_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Panjang lahir tidak boleh kosong!'
                ]
            ],
            'id_general' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'id general tidak boleh kosong!'
                ]
            ],
            // Tambahkan field lain di sini jika perlu
        ];

        if (!$this->validate($data)) {
            return redirect()->to('/bayi')->withInput()->with('validation', \Config\Services::validation());
        }
        $id = $this->bayi->generateID();
        $this->bayi->insert([
            'id_register_bayi' => $id,
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama_bayi' => $this->request->getVar('nama_bayi'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'alamat_lengkap' => $this->request->getVar('alamat_lengkap'),
            'no_telepon' => $this->request->getVar('no_telp'),
            'berat_badan' => $this->request->getVar('BB_lahir'),
            'panjang_lahir' => $this->request->getVar('panjang_lahir'),
            'memili_buku_kia' => $this->request->getVar('buku_kia'),
            'catatan_neonatal' => $this->request->getVar('catatan_neonatal'),
            'id_general' => $this->request->getVar('id_general'),
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/bayi');
    }
    public function tedit($id)
    {
        $data = [
            'bay' => $this->bayi->where(['id_register_bayi' => $id])->first(),
            'gen' => $this->general->findAll()
        ];

        return view('edit/registerbayi', $data);
    }

    public function update($id)
    {
        $data = [
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama_bayi' => $this->request->getVar('nama_bayi'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'alamat_lengkap' => $this->request->getVar('alamat_lengkap'),
            'no_telepon' => $this->request->getVar('no_telp'),
            'berat_badan' => $this->request->getVar('BB_lahir'),
            'panjang_lahir' => $this->request->getVar('panjang_lahir'),
            'memili_buku_kia' => $this->request->getVar('buku_kia'),
            'catatan_neonatal' => $this->request->getVar('catatan_neonatal'),
            'id_general' => $this->request->getVar('id_general'),
        ];

        // Gunakan $id sebagai parameter pertama
        $this->bayi->update($id, $data);

        session()->setFlashdata('pesanbayi', 'data berhasil diedit');
        return redirect()->to('/daftar');
    }
    public function delete($id)
    {
        $this->bayi->delete($id);
        return redirect()->to('/daftar');
    }
}
