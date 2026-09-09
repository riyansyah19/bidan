<?php


namespace App\Controllers;

use App\Models\informed;
use App\Models\pelayanankb;

class pelayananKBB extends BaseController
{
    protected $informed;
    protected $pelayanankb;
    public function __construct()
    {
        $this->informed = new informed();
        $this->pelayanankb = new pelayanankb();
    }
    public function kb(): string
    {
        $data = [
            'validation' => session()->getFlashdata('validation'),
            'pelayanankb' => $this->informed->findAll()
        ];
        return view('pelayananKB', $data);
    }
    public function getRekamMedis_kb($id_informed)
    {
        $data = $this->informed->find($id_informed);

        if ($data) {
            return $this->response->setJSON([
                'no_rm' => $data['nomor_rekam_medis'],
                'nik' => $data['nik'],


            ]);
        } else {
            return $this->response->setJSON([
                'no_rm' => '',
                'nik' => '',

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
                    'required' => 'Jenis kelamin tidak boleh kosong!'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir tidak boleh kosong!'
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama ibu tidak boleh kosong!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!'
                ]
            ],
            'jenis_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis pasien ke tidak boleh kosong!'
                ]
            ],
            'nama_suami' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama suami tidak boleh kosong!'
                ]
            ],
            'jumlah_anak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah anak tidak boleh kosong!'
                ]
            ],
            'gakin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'gakin tidak boleh kosong!'
                ]
            ],
            '4t' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '4T tidak boleh kosong!'
                ]
            ],
            'metode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Metode tidak boleh kosong!'
                ]
            ],
            'id_informed' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'id Informed tidak boleh kosong!'
                ]
            ],
            // Tambahkan field lain di sini jika perlu
        ];

        if (!$this->validate($data)) {
            return redirect()->to('/KB')->withInput()->with('validation', \Config\Services::validation());
        }
        $id = $this->pelayanankb->generateID();
        $this->pelayanankb->insert([
            'id_register_pelayanan_kb' => $id,
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tgl_lahir'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'alamat_lengkap' => $this->request->getVar('alamat'),
            'jenis_pasien' => $this->request->getVar('jenis_pasien'),
            'nama_suami' => $this->request->getVar('nama_suami'),
            'jumlah_anak' => $this->request->getVar('jumlah_anak'),
            'gakin' => $this->request->getVar('gakin'),
            '4t' => $this->request->getVar('4t'),
            'metode' => $this->request->getVar('metode'),
            'catatan_alki' => $this->request->getVar('catatan_alki'),
            'id_informed' => $this->request->getVar('id_informed'),
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/KB');
    }
    public function tedit($id)
    {
        $data = [
            'kb' => $this->pelayanankb->where(['id_register_pelayanan_kb' => $id])->first(),
            'inf' => $this->informed->findAll()
        ];

        return view('edit/pelayananKB', $data);
    }

    public function update($id)
    {
        $data = [
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tgl_lahir'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'alamat_lengkap' => $this->request->getVar('alamat'),
            'jenis_pasien' => $this->request->getVar('jenis_pasien'),
            'nama_suami' => $this->request->getVar('nama_suami'),
            'jumlah_anak' => $this->request->getVar('jumlah_anak'),
            'gakin' => $this->request->getVar('gakin'),
            '4t' => $this->request->getVar('4t'),
            'metode' => $this->request->getVar('metode'),
            'catatan_alki' => $this->request->getVar('catatan_alki'),
            'id_informed' => $this->request->getVar('id_informed'),
        ];

        // Gunakan $id sebagai parameter pertama
        $this->pelayanankb->update($id, $data);

        session()->setFlashdata('pesan', 'data berhasil diedit');
        return redirect()->to('/daftar');
    }
    public function delete($id)
    {
        $this->pelayanankb->delete($id);
        return redirect()->to('/daftar');
    }
}
