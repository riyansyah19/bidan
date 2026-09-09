<?php


namespace App\Controllers;

use App\Models\general;
use App\Models\balita;

class registerbalita extends BaseController
{
    protected $general;
    protected $bal;
    public function __construct()
    {
        $this->general = new general();
        $this->bal = new balita();
    }
    public function balita(): string
    {
        $data = [
            'validation' => session()->getFlashdata('validation'),
            'balita' => $this->general->findAll()
        ];
        return view('registerbalita', $data);
    }
    public function getRekamMedis_ba($id_general)
    {
        $data = $this->general->find($id_general);

        if ($data) {
            return $this->response->setJSON([
                'no_rm' => $data['nomor_rekam_medis_gc'],
                'nik' => $data['nik'],
                'nama' => $data['nama_pasien'],
                'alamat' => $data['alamat_pasien'],
                'tgl_lahir' => $data['tanggal_lahir'],
            ]);
        } else {
            return $this->response->setJSON([
                'no_rm' => '',
                'nik' => '',
                'nama' => '',
                'alamat' => '',
                'tgl_lahir' => '',
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
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama ibu tidak boleh kosong!'
                ]
            ],
            'no_telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomer Telepon tidak boleh kosong!'
                ]
            ],
            'bb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berat badan tidak boleh kosong!'
                ]
            ],
            'tb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tinggi Badan tidak boleh kosong!'
                ]
            ],
            'anak_ke' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'anak ke tidak boleh kosong!'
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
            return redirect()->to('/balita')->withInput()->with('validation', \Config\Services::validation());
        }

        $id = $this->bal->generateID();
        $this->bal->insert([
            'id_register_balita' => $id,
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tgl_lahir'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'berat_badan' => $this->request->getVar('bb'),
            'tinggi_badan' => $this->request->getVar('tb'),
            'anak_ke' => $this->request->getVar('anak_ke'),
            'catatan_imunisasi' => $this->request->getVar('catatan_imunisasi'),
            'id_general_b' => $this->request->getVar('id_general'),
        ]);
        session()->setFlashdata('pesanbalita', 'data berhasil ditambahkan');
        return redirect()->to('/balita');
    }
    public function tedit($id)
    {
        $data = [
            'bal' => $this->bal->where(['id_register_balita' => $id])->first(),
            'gen' => $this->general->findAll()
        ];

        return view('edit/registerbalita', $data);
    }

    public function update($id)
    {
        $data = [
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tgl_lahir'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'berat_badan' => $this->request->getVar('bb'),
            'tinggi_badan' => $this->request->getVar('tb'),
            'anak_ke' => $this->request->getVar('anak_ke'),
            'catatan_imunisasi' => $this->request->getVar('catatan_imunisasi'),
            'id_general_b' => $this->request->getVar('id_general'),
        ];

        // Gunakan $id sebagai parameter pertama
        $this->bal->update($id, $data);

        session()->setFlashdata('pesan', 'data berhasil diedit');
        return redirect()->to('/daftar');
    }
    public function delete($id)
    {
        $this->bal->delete($id);
        return redirect()->to('/daftar');
    }
}
