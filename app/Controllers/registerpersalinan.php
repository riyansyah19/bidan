<?php


namespace App\Controllers;

use App\Models\informed;
use App\Models\persalinan;

class registerpersalinan extends BaseController
{
    protected $informed;
    protected $per;
    public function __construct()
    {
        $this->informed = new informed();
        $this->per = new persalinan();
    }
    public function persalinan(): string
    {
        $data = [
            'validation' => session()->getFlashdata('validation'),
            'persalinan' => $this->informed->findAll()
        ];
        return view('registerpersalinan', $data);
    }
    public function getRekamMedis_per($id_informed)
    {
        $data = $this->informed->find($id_informed);

        if ($data) {
            return $this->response->setJSON([
                'no_rm' => $data['nomor_rekam_medis'],
                'nik' => $data['nik'],
                'no_telp' => $data['no_telepon'],



            ]);
        } else {
            return $this->response->setJSON([
                'no_rm' => '',
                'nik' => '',
                'no_telp' => '',



            ]);
        }
    }
    public function save()
    {
        $data = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong!'
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin tidak boleh kosong!'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir tidak boleh kosong!'
                ]
            ],
            'alamat_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Lengkap tidak boleh kosong!'
                ]
            ],
            'penolong' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penolong tidak boleh kosong!'
                ]
            ],
            'tempat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat tidak boleh kosong!'
                ]
            ],
            'pendamping' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendamping tidak boleh kosong!'
                ]
            ],
            'transportasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Transportasi tidak boleh kosong!'
                ]
            ],
            'donor_darah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Donor Darah tidak boleh kosong!'
                ]
            ],
            'id_informed' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID Informed tidak boleh kosong!'
                ]
            ],
            // Tambahkan field lain di sini jika perlu
        ];

        if (!$this->validate($data)) {
            return redirect()->to('/persalinan')->withInput()->with('validation', \Config\Services::validation());
        }

        $id = $this->per->generateID();
        $this->per->insert([
            'id_register_persalinan' => $id,
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat_lengkap' => $this->request->getVar('alamat_lengkap'),
            'no_telepon' => $this->request->getVar('no_telp'),
            'penolong' => $this->request->getVar('penolong'),
            'tempat' => $this->request->getVar('tempat'),
            'pendamping' => $this->request->getVar('pendamping'),
            'transportasi' => $this->request->getVar('transportasi'),
            'pendonor_darah' => $this->request->getVar('donor_darah'),
            'id_informed' => $this->request->getVar('id_informed'),
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/persalinan');
    }
    public function tedit($id)
    {
        $data = [
            'per' => $this->per->where(['id_register_persalinan' => $id])->first(),
            'inf' => $this->informed->findAll()
        ];

        return view('edit/registerpersalinan', $data);
    }

    public function update($id)
    {
        $data = [
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat_lengkap' => $this->request->getVar('alamat_lengkap'),
            'no_telepon' => $this->request->getVar('no_telp'),
            'penolong' => $this->request->getVar('penolong'),
            'tempat' => $this->request->getVar('tempat'),
            'pendamping' => $this->request->getVar('pendamping'),
            'transportasi' => $this->request->getVar('transportasi'),
            'pendonor_darah' => $this->request->getVar('donor_darah'),
            'id_informed' => $this->request->getVar('id_informed'),
        ];

        // Gunakan $id sebagai parameter pertama
        $this->per->update($id, $data);

        session()->setFlashdata('pesan', 'data berhasil diedit');
        return redirect()->to('/daftar');
    }
    public function delete($id)
    {
        $this->per->delete($id);
        return redirect()->to('/daftar');
    }
}
