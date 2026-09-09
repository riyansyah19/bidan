<?php


namespace App\Controllers;

use App\Models\general;
use App\Models\kartu;
use App\Models\kartup;
use App\Models\kartur;

class KartuIbu extends BaseController
{
    protected $kar;
    protected $karp;
    protected $karr;
    protected $general;
    public function __construct()
    {
        $this->kar = new kartu();
        $this->karp = new kartup();
        $this->karr = new kartur();
        $this->general = new general();
    }
    public function kartuibu(): string
    {
        $data = [
            'validation' => session()->getFlashdata('validation'),
            'kartuibu' => $this->general->findAll()
        ];
        return view('KartuIbu', $data);
    }
    public function kartuibulain(): string
    {
        $data = [
            'kartuibu' => $this->kar->findAll()
        ];
        return view('kartuIbulain', $data);
    }
    public function getRekamMedis_ibu($id_k_ibu)
    {
        $data = $this->general->find($id_k_ibu);

        if ($data) {
            return $this->response->setJSON([
                'no_rm' => $data['nomor_rekam_medis_gc'],
                'nik' => $data['nik'],
                'nama_ibu' => $data['nama_pasien'],
                'tgl_lahir' => $data['tanggal_lahir'],
                'no_telp' => $data['no_hp_pasien'],
                'alamat' => $data['alamat_pasien'],

            ]);
        } else {
            return $this->response->setJSON([
                'no_rm' => '',
                'nik' => '',
                'nama_ibu' => '',
                'tgl_lahir' => '',
                'no_telp' => '',
                'alamat' => '',

            ]);
        }
    }
    public function save()
    {
        $data = [
            'nama_suami' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Suami tidak boleh kosong!'
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin tidak boleh kosong!'
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Agama tidak boleh kosong!'
                ]
            ],
            'suku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Suku tidak boleh kosong!'
                ]
            ],
            'bahasa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bahasa tidak boleh kosong!'
                ]
            ],
            'rt_rw' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RT/RW tidak boleh kosong!'
                ]
            ],
            'desa_kel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Desa/Kel tidak boleh kosong!'
                ]
            ],
            'kec' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamatan tidak boleh kosong!'
                ]
            ],
            'kota_kab' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota/Kab tidak boleh kosong!'
                ]
            ],
            'kode_pos' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Pos tidak boleh kosong!'
                ]
            ],
            'prov' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Provinsi tidak boleh kosong!'
                ]
            ],
            'negara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Negara tidak boleh kosong!'
                ]
            ],
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendidikan tidak boleh kosong!'
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan tidak boleh kosong!'
                ]
            ],
            'status_per' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Pernikahan tidak boleh kosong!'
                ]
            ],
            'bayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembayaran tidak boleh kosong!'
                ]
            ],
            'posdu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Posyandu tidak boleh kosong!'
                ]
            ],
            'nama_kad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kader tidak boleh kosong!'
                ]
            ],
            'disab' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Disabilitas tidak boleh kosong!'
                ]
            ],
            'tgl_regis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Registrasi tidak boleh kosong!'
                ]
            ],
            'id_general' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID General tidak boleh kosong!'
                ]
            ],
            // Tambahkan field lain di sini jika perlu
        ];

        if (!$this->validate($data)) {
            return redirect()->to('/Kartu')->withInput()->with('validation', \Config\Services::validation());
        }

        $id = $this->kar->generateID();
        $this->kar->insert([
            'id_kartu_ibu' => $id,
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama_lengkap_ibu' => $this->request->getVar('nama_ibu'),
            'nama_suami' => $this->request->getVar('nama_suami'),
            'tanggal_lahir' => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'agama' => $this->request->getVar('agama'),
            'suku' => $this->request->getVar('suku'),
            'bahasa' => $this->request->getVar('bahasa'),
            'alamat' => $this->request->getVar('alamat'),
            'rt_or_rw' => $this->request->getVar('rt/rw'),
            'desa_or_kelurahan' => $this->request->getVar('desa/kel'),
            'kecamatan' => $this->request->getVar('kec'),
            'kota_or_kabupaten' => $this->request->getVar('kota/kab'),
            'kode_pos' => $this->request->getVar('kode'),
            'provinsi' => $this->request->getVar('prov'),
            'negara' => $this->request->getVar('negara'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'status_pernikahan' => $this->request->getVar('status_per'),
            'pembayaran' => $this->request->getVar('bayar'),
            'posyandu' => $this->request->getVar('posdu'),
            'nama_kader' => $this->request->getVar('nama_kad'),
            'disabilitas' => $this->request->getVar('disab'),
            'tanggal_registrasi' => $this->request->getVar('tgl_regis'),
            'no_telp' => $this->request->getVar('no_telp'),
            'id_general_k' => $this->request->getVar('id_general'),
        ]);


        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/Kartu');
    }
    public function savekarp_r()
    {
        $idp = $this->karp->generateID();
        $this->karp->insert([
            'id_kartu_ibu_p' => $idp,
            'tanggal_periksa' => $this->request->getVar('tgl_peri'),
            'tanggal_hpht' => $this->request->getVar('tgl_hpht'),
            'taksiran_persalinan' => $this->request->getVar('taksiran'),
            'tanggal_persalinan_sebelumnya' => $this->request->getVar('tgl_per_s'),
            'bb_sebelum_hamil' => $this->request->getVar('bb_s_h'),
            'bb_saat_ini' => $this->request->getVar('bb_s_i'),
            'pendidikan_ibu' => $this->request->getVar('pendidikan_ib'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ib'),
            'tinggi_badan' => $this->request->getVar('tinggi_b'),
            'lila' => $this->request->getVar('lila'),
            'gol_darah' => $this->request->getVar('goldar'),
            'riwayat_kb' => $this->request->getVar('KB'),
            'buku_kia' => $this->request->getVar('KIA'),
            'riwayat_persalinan' => $this->request->getVar('riwayat_persalinan_s'),
            'status_gizi' => $this->request->getVar('status_g'),
            'riwayat_komplikasi' => $this->request->getVar('riwayat_k'),
            'riwayat_penyakit' => $this->request->getVar('riwayat_penyakit'),
            'id_kartu_ibup' => $this->request->getVar('id_k_ibu'),
            'nomor_rekam_medis' => $this->request->getVar('no_rekam'),
        ]);

        $idr = $this->karr->generateID();
        $this->karr->insert([
            'id_kartu_ibu_r' => $idr,
            'gravida' => $this->request->getVar('grav'),
            'partus' => $this->request->getVar('par'),
            'abortus' => $this->request->getVar('abor'),
            'hidup' => $this->request->getVar('hidup'),
            'catatan_khusus' => $this->request->getVar('catatan'),
            'id_kartu_ibur' => $this->request->getVar('id_k_ibu'),
            'nomor_rekam_medis' => $this->request->getVar('no_rekam'),
        ]);

        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/Kartu');
    }

    public function tedit($id)
    {
        $data = [
            'kar' => $this->kar->where(['id_kartu_ibu' => $id])->first(),
            'karp' => $this->karp->where(['id_kartu_ibu_p' => $id])->first(),
            'karr' => $this->karr->where(['id_kartu_ibu_r' => $id])->first(),
            'gen' => $this->general->findAll()
        ];

        return view('edit/KartuIbu', $data);
    }

    public function update($id)
    {
        $this->kar->update($id, [
            'nomor_rekam_medis' => $this->request->getVar('no_rm'),
            'nik' => $this->request->getVar('nik'),
            'nama_lengkap_ibu' => $this->request->getVar('nama_ibu'),
            'nama_suami' => $this->request->getVar('nama_suami'),
            'tanggal_lahir' => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'agama' => $this->request->getVar('agama'),
            'suku' => $this->request->getVar('suku'),
            'bahasa' => $this->request->getVar('bahasa'),
            'alamat' => $this->request->getVar('alamat'),
            'rt_or_rw' => $this->request->getVar('rt/rw'),
            'desa_or_kelurahan' => $this->request->getVar('desa/kel'),
            'kecamatan' => $this->request->getVar('kec'),
            'kota_or_kabupaten' => $this->request->getVar('kota/kab'),
            'kode_pos' => $this->request->getVar('kode'),
            'provinsi' => $this->request->getVar('prov'),
            'negara' => $this->request->getVar('negara'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'status_pernikahan' => $this->request->getVar('status_per'),
            'pembayaran' => $this->request->getVar('bayar'),
            'posyandu' => $this->request->getVar('posdu'),
            'nama_kader' => $this->request->getVar('nama_kad'),
            'disabilitas' => $this->request->getVar('disab'),
            'tanggal_registrasi' => $this->request->getVar('tgl_regis'),
            'no_telp' => $this->request->getVar('no_telp'),
            'id_general_k' => $this->request->getVar('id_general'),
        ]);

        $this->karp->where('id_kartu_ibup', $id)->set([
            'tanggal_periksa' => $this->request->getVar('tgl_peri'),
            'tanggal_hpht' => $this->request->getVar('tgl_hpht'),
            'taksiran_persalinan' => $this->request->getVar('taksiran'),
            'tanggal_persalinan_sebelumnya' => $this->request->getVar('tgl_per_s'),
            'bb_sebelum_hamil' => $this->request->getVar('bb_s_h'),
            'bb_saat_ini' => $this->request->getVar('bb_s_i'),
            'pendidikan_ibu' => $this->request->getVar('pendidikan_ib'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ib'),
            'tinggi_badan' => $this->request->getVar('tinggi_b'),
            'lila' => $this->request->getVar('lila'),
            'gol_darah' => $this->request->getVar('goldar'),
            'riwayat_kb' => $this->request->getVar('KB'),
            'buku_kia' => $this->request->getVar('KIA'),
            'riwayat_persalinan' => $this->request->getVar('riwayat_persalinan_s'),
            'status_gizi' => $this->request->getVar('status_g'),
            'riwayat_komplikasi' => $this->request->getVar('riwayat_k'),
            'riwayat_penyakit' => $this->request->getVar('riwayat_penyakit'),
        ])->update();

        $this->karr->where('id_kartu_ibur', $id)->set([
            'gravida' => $this->request->getVar('grav'),
            'partus' => $this->request->getVar('par'),
            'abortus' => $this->request->getVar('abor'),
            'hidup' => $this->request->getVar('hidup'),
            'catatan_khusus' => $this->request->getVar('catatan'),
        ])->update();


        session()->setFlashdata('pesan', 'data berhasil diedit');
        return redirect()->to('/daftar');
    }
    public function delete($id)
    {
        // Hapus dari tabel anak terlebih dahulu
        $this->karp->where('id_kartu_ibup', $id)->delete();
        $this->karr->where('id_kartu_ibur', $id)->delete();

        // Hapus dari tabel induk
        $this->kar->delete($id);

        session()->setFlashdata('pesan1', 'Data berhasil dihapus');
        return redirect()->to('/daftar');
    }
}
