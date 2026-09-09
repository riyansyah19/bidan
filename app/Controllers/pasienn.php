<?php

namespace App\Controllers;

use App\Models\pasien;

class pasienn extends BaseController
{
    protected $pasien;
    public function __construct()
    {
        $this->pasien = new pasien();
    }
    public function pasiennn(): string
    {
        return view('pasien');
    }
    public function save()
    {
        $id = $this->pasien->generateID();
        $this->pasien->insert([
            'id_pasien' => $id,
            'nomor_rekam_medis' => $this->request->getVar('nomor_rekam'),
            'nik' => $this->request->getVar('nik'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'alamat_lengkap' => $this->request->getVar('alamat'),
            'no_telepon' => $this->request->getVar('no_telp'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'agama' => $this->request->getVar('agama'),
        ]);
        session()->setFlashdata('pesanpasien', 'data berhasil ditambahkan');
        return view('pasien');
    }
    public function tedit($id)
    {
        $data = [
            'ps' => $this->pasien->where(['id_pasien' => $id])->first(),
        ];

        return view('edit/pasien', $data);
    }

    public function update($id)
    {
        $data = [
            'id_pasien' => $id,
            'nomor_rekam_medis' => $this->request->getVar('nomor_rekam'),
            'nik' => $this->request->getVar('nik'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'alamat_lengkap' => $this->request->getVar('alamat'),
            'no_telepon' => $this->request->getVar('no_telp'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'agama' => $this->request->getVar('agama'),
        ];

        // Gunakan $id sebagai parameter pertama
        $this->pasien->update($id, $data);

        session()->setFlashdata('pesanpasien', 'data berhasil diedit');
        return redirect()->to('/daftar');
    }

    public function delete($id)
    {
        $this->pasien->delete($id);
        return redirect()->to('/daftar');
    }
}
