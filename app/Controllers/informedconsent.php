<?php


namespace App\Controllers;

use App\Models\kartu;
use App\Models\informed;
use App\Models\icd;

class informedconsent extends BaseController
{
    protected $kartu;
    protected $inf;
    protected $icd;
    public function __construct()
    {
        $this->kartu = new kartu();
        $this->inf = new informed();
        $this->icd = new icd();
    }
    public function informed(): string
    {
        $data = [
            'validation' => session()->getFlashdata('validation'),
            'informed' => $this->kartu->findAll(),
            'icd' => $this->icd->findAll()
        ];
        return view('informedconsent', $data);
    }
    public function getRekamMedis_inf($id_k_ibu)
    {
        $data = $this->kartu->find($id_k_ibu);

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
            'nama_pj' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Penanggung Jawab tidak boleh kosong!'
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
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomer Telepon tidak boleh kosong!'
                ]
            ],
            'hubungan_dengan_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hubungan dengan pasien tidak boleh kosong!'
                ]
            ],
            'diagnosa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Diagnosa tidak boleh kosong!'
                ]
            ],
            'tindakan_medis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tindakan Medis ke tidak boleh kosong!'
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan tidak boleh kosong!'
                ]
            ],
            'resiko_tindakan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Resiko tindakan tidak boleh kosong!'
                ]
            ],
            'tindakan_medis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tindakan medis tidak boleh kosong!'
                ]
            ],
            'prognosis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prognosis tidak boleh kosong!'
                ]
            ],
            'ket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong!'
                ]
            ],
            // Tambahkan field lain di sini jika perlu
        ];

        if (!$this->validate($data)) {
            return redirect()->to('/informed')->withInput()->with('validation', \Config\Services::validation());
        }
        $fileSaksi = $this->request->getFile('saksi');
        $filePenanggung = $this->request->getFile('penanggung_jawab');
        $filePetugas = $this->request->getFile('petugas');
        $id = $this->inf->generateID();
        $this->inf->insert([
            'id_informed_consent_p' => $id,
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama_penanggung_jawab' => $this->request->getVar('nama_pj'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tgl_lahir'),
            'no_telepon' => $this->request->getVar('no_telp'),
            'hubungan_dengan_pasien' => $this->request->getVar('hubungan_dengan_pasien'),
            'diagnosa' => $this->request->getVar('diagnosa'),
            'tindakan_medis' => $this->request->getVar('tindakan_medis'),
            'tujuan' => $this->request->getVar('tujuan'),
            'resiko_tindakan' => $this->request->getVar('resiko_tindakan'),
            'prognosis' => $this->request->getVar('prognosis'),
            'nama_petugas' => $this->request->getVar('nama_petugas'),
            'tanggal_pelaksanaan' => $this->request->getVar('tgl_pelaksanaan'),
            'waktu_mulai_tindakan' => $this->request->getVar('waktu_mulai'),
            'waktu_selesai_tindakan' => $this->request->getVar('waktu_selesai'),
            'alat_medis' => $this->request->getVar('alat_medis'),
            'bmhp' => $this->request->getVar('bmhp'),
            'keterangan' => $this->request->getVar('ket'),
            'saksi' => file_get_contents($fileSaksi->getTempName()),
            'penanggung_jawab' => file_get_contents($filePenanggung->getTempName()),
            'petugas' => file_get_contents($filePetugas->getTempName()),
            'id_k_ibu' => $this->request->getVar('id_k_ibu'),
            'icd' => $this->request->getVar('vol_name'),
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/informed');
    }

    public function tedit($id)
    {
        $data = [
            'inf' => $this->inf->where(['id_informed_consent_p' => $id])->first(),
            'kar' => $this->kartu->findAll(),
            'icd' => $this->icd->findAll()
        ];

        return view('edit/informedconsent', $data);
    }

    public function update($id)
    {
        $fileSaksi = $this->request->getFile('saksi');
        $filePenanggung = $this->request->getFile('penanggung_jawab');
        $filePetugas = $this->request->getFile('petugas');
        $data = [
            'nomor_rekam_medis_gc' => $this->request->getVar('nomor_rekam_medis'),
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama_penanggung_jawab' => $this->request->getVar('nama_pj'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tgl_lahir'),
            'no_telepon' => $this->request->getVar('no_telp'),
            'hubungan_dengan_pasien' => $this->request->getVar('hubungan_dengan_pasien'),
            'diagnosa' => $this->request->getVar('diagnosa'),
            'tindakan_medis' => $this->request->getVar('tindakan_medis'),
            'tujuan' => $this->request->getVar('tujuan'),
            'resiko_tindakan' => $this->request->getVar('resiko_tindakan'),
            'prognosis' => $this->request->getVar('prognosis'),
            'nama_petugas' => $this->request->getVar('nama_petugas'),
            'tanggal_pelaksanaan' => $this->request->getVar('tgl_pelaksanaan'),
            'waktu_mulai_tindakan' => $this->request->getVar('waktu_mulai'),
            'waktu_selesai_tindakan' => $this->request->getVar('waktu_selesai'),
            'alat_medis' => $this->request->getVar('alat_medis'),
            'bmhp' => $this->request->getVar('bmhp'),
            'keterangan' => $this->request->getVar('ket'),
            'saksi' => file_get_contents($fileSaksi->getTempName()),
            'penanggung_jawab' => file_get_contents($filePenanggung->getTempName()),
            'petugas' => file_get_contents($filePetugas->getTempName()),
            'id_k_ibu' => $this->request->getVar('id_k_ibu'),
            'icd' => $this->request->getVar('vol_name'),
        ];

        // Gunakan $id sebagai parameter pertama
        $this->inf->update($id, $data);

        session()->setFlashdata('pesan', 'data berhasil diedit');
        return redirect()->to('/daftar');
    }
    public function delete($id)
    {
        $this->inf->delete($id);
        return redirect()->to('/daftar');
    }
}
