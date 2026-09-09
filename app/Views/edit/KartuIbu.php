<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Form kartu ibu</p>
            <h1 class="page-title">Kartu Ibu</h1>
            <p class="page-subtitle">Catat identitas dan data ibu secara lengkap agar rekam medis dan pelayanan antenatal tetap terstruktur.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-file-earmark-medical-fill"></i>
            Kehamilan
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="<?= site_url('ekartu/' . $kar['id_kartu_ibu']) ?>" method="post" class="modern-form">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="no_rm">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" name="no_rm" id="no_rm" value="<?= $kar['nomor_rekam_medis'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nik">NIK</label>
                    <input class="field-input" type="text" name="nik" id="nik" value="<?= $kar['nik'] ?>">
                </div>
            </div>

            <hr style="background-color:rgba(22, 88, 52, 0.98); border: none; " size="7">

            <div class="form-section-header">
                <i class="bi bi-person-vcard-fill"></i> Identitas Ibu
            </div>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nama_ibu">Nama Lengkap Ibu</label>
                    <input class="field-input" type="text" name="nama_ibu" id="nama_ibu" value="<?= $kar['nama_lengkap_ibu'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_suami">Nama Suami</label>
                    <input class="field-input" type="text" name="nama_suami" id="nama_suami" value="<?= $kar['nama_suami'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_lahir">Tanggal Lahir</label>
                    <input class="field-input" type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $kar['tanggal_lahir'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="jk">Jenis Kelamin</label>
                    <select class="field-input" name="jk" id="jk">
                        <option value="" selected></option>
                        <option value="tidak diketahui">0.Tidak diketahui</option>
                        <option value="laki laki">1. Laki-Laki</option>
                        <option value="perempuan">2. Perempuan</option>
                        <option value="tidak dapat ditentukan">3. Tidak dapat ditentukan</option>
                        <option value="tidak mengisi">4. Tidak Mengisi</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="agama">Agama</label>
                    <select class="field-input" name="agama" id="agama">
                        <option value="" selected></option>
                        <option value="islam">1. Islam </option>
                        <option value="kristen (protestan)">2. Kristen (Protestan) </option>
                        <option value="katolik">3. Katolik </option>
                        <option value="hindu">4. Hindu </option>
                        <option value="budha">5. Budha </option>
                        <option value="kongkhucu">6. Konghucu </option>
                        <option value="penghayat">7. Penghayat </option>
                        <option value="lain lain">8. Lain-lain </option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="suku">Suku</label>
                    <input class="field-input" type="text" name="suku" id="suku" value="<?= $kar['suku'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="bahasa">Bahasa</label>
                    <input class="field-input" type="text" name="bahasa" id="bahasa" value="<?= $kar['bahasa'] ?>">
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="alamat">Alamat</label>
                    <input class="field-input" type="text" name="alamat" id="alamat" value="<?= $kar['alamat'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="rt/rw">RT/RW</label>
                    <input class="field-input" type="text" name="rt/rw" id="rt/rw" value="<?= $kar['rt_or_rw'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="desa/kel">Desa/Kelurahan</label>
                    <input class="field-input" type="text" name="desa/kel" id="desa/kel" value="<?= $kar['desa_or_kelurahan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="kec">Kecamatan</label>
                    <input class="field-input" type="text" name="kec" id="kec" value="<?= $kar['kecamatan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="kota/kab">Kota/Kabupaten</label>
                    <input class="field-input" type="text" name="kota/kab" id="kota/kab" value="<?= $kar['kota_or_kabupaten'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="kode">Kode Pos</label>
                    <input class="field-input" type="text" name="kode" id="kode" value="<?= $kar['kode_pos'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="prov">Provinsi</label>
                    <input class="field-input" type="text" name="prov" id="prov" value="<?= $kar['provinsi'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="negara">Negara</label>
                    <input class="field-input" type="text" name="negara" id="negara" value="<?= $kar['negara'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="pendidikan">Pendidikan</label>
                    <select class="field-input" name="pendidikan" id="pendidikan">
                        <option value="" selected></option>
                        <option value="tidak sekolah">1. Tidak Sekolah </option>
                        <option value="sd (protestan)">2. SD (Protestan) </option>
                        <option value="sltp sederajat">3. SLTP/Sederajat </option>
                        <option value="slta sederajat">4. SLTA/Sederajat </option>
                        <option value="d1-d3 sederajat">5. D1-D3/Sederajat </option>
                        <option value="d4">6. D4 </option>
                        <option value="s1">7. S1 </option>
                        <option value="s2">8. S2 </option>
                        <option value="s3">8. S3 </option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="pekerjaan">Pekerjaan</label>
                    <select class="field-input" name="pekerjaan" id="pekerjaan">
                        <option value="" selected></option>
                        <option value="tidak bekerja">0. Tidak Bekerja </option>
                        <option value="pns">1. PNS </option>
                        <option value="tni/polri">2. TNI/Polri </option>
                        <option value="bumn">3. BUMN</option>
                        <option value="pegawai swasta/wirausaha">4. Pegawai Swasta/Wirausaha </option>
                        <option value="lain lain">5. Lain-lain </option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="status_per">Status Pernikahan</label>
                    <select class="field-input" name="status_per" id="status_per">
                        <option value="" selected></option>
                        <option value="belum kawin">1. Belum Kawin </option>
                        <option value="kawin">2. Kawin </option>
                        <option value="cerai hidup">3. Cerai Hidup </option>
                        <option value="cerai mati">4. Cerai Mati </option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="bayar">Pembayaran</label>
                    <select class="field-input" name="bayar" id="bayar">
                        <option value="" selected></option>
                        <option value="jkn">1. JKN </option>
                        <option value="mandiri">2. Mandiri </option>
                        <option value="asuransi lainnya">3. Asuransi Lainnya </option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="posdu">Posyandu</label>
                    <input class="field-input" type="text" name="posdu" id="posdu" value="<?= $kar['posyandu'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_kad">Nama Kader</label>
                    <input class="field-input" type="text" name="nama_kad" id="nama_kad" value="<?= $kar['nama_kader'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="disab">Disabilitas</label>
                    <input class="field-input" type="text" name="disab" id="disab" value="<?= $kar['disabilitas'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_regis">Tanggal Registrasi</label>
                    <input class="field-input" type="date" name="tgl_regis" id="tgl_regis" value="<?= $kar['tanggal_registrasi'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_telp">No.Telepon</label>
                    <input class="field-input" type="text" name="no_telp" id="no_telp" value="<?= $kar['no_telp'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="id_general">ID General Consent</label>
                    <select class="field-input selectpicker" data-live-search="true" name="id_general" id="id_general" title="Pilih ID General">
                        <?php foreach ($gen as $b): ?>
                            <option value="<?= $b['id_general_consent'] ?>">
                                <?= $b['id_general_consent'] ?> - <?= $b['nomor_rekam_medis_gc'] ?> - <?= $b['nama_pasien'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-section-header">
                <i class="bi bi-hospital-fill"></i> Riwayat Obstektrik
            </div>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="grav">Gravida</label>
                    <input class="field-input" type="text" name="grav" id="grav" value="<?= $karr['gravida'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="par">Partus</label>
                    <input class="field-input" type="text" name="par" id="par" value="<?= $karr['partus'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="abor">Abortus</label>
                    <input class="field-input" type="text" name="abor" id="abor" value="<?= $karr['abortus'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="hidup">Hidup</label>
                    <input class="field-input" type="text" name="hidup" id="hidup" value="<?= $karr['hidup'] ?>">
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="catatan">Catatan Khusus</label>
                    <textarea class="field-input" name="catatan" id="catatan" rows="4" value="<?= $karr['catatan_khusus'] ?>"></textarea>
                </div>
            </div>

            <div class="form-section-header">
                <i class="bi bi-stethoscope"></i> Pemeriksaan Bidan
            </div>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="tgl_peri">Tanggal Periksa</label>
                    <input class="field-input" type="date" name="tgl_peri" id="tgl_peri" value="<?= $karp['tanggal_periksa'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_hpht">Tanggal HPHT</label>
                    <input class="field-input" type="date" name="tgl_hpht" id="tgl_hpht" value="<?= $karp['tanggal_hpht'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="taksiran">Taksiran Persalinan</label>
                    <input class="field-input" type="date" name="taksiran" id="taksiran" value="<?= $karp['taksiran_persalinan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_per_s">Tanggal Persalinan Sebelumnya</label>
                    <input class="field-input" type="date" name="tgl_per_s" id="tgl_per_s" value="<?= $karp['tanggal_persalinan_sebelumnya'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="bb_s_h">BB Sebelum Hamil</label>
                    <input class="field-input" type="text" name="bb_s_h" id="bb_s_h" value="<?= $karp['bb_sebelum_hamil'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="bb_s_i">BB Saat Ini</label>
                    <input class="field-input" type="text" name="bb_s_i" id="bb_s_i" value="<?= $karp['bb_saat_ini'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="pendidikan_ib">Pendidikan Ibu</label>
                    <select class="field-input" name="pendidikan_ib" id="pendidikan_ib">
                        <option value="" selected></option>
                        <option value="tidak sekolah">1. Tidak Sekolah </option>
                        <option value="sd">2. SD (Protestan) </option>
                        <option value="sltp sederajat">3. SLTP/Sederajat </option>
                        <option value="slta sederajat">4. SLTA/Sederajat </option>
                        <option value="d1-d3 sederajat">5. D1-D3/Sederajat </option>
                        <option value="d4">6. D4 </option>
                        <option value="s1">7. S1 </option>
                        <option value="s2">8. S2 </option>
                        <option value="s3">8. S3 </option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="pekerjaan_ib">Pekerjaan Ibu</label>
                    <select class="field-input" name="pekerjaan_ib" id="pekerjaan_ib">
                        <option value="" selected></option>
                        <option value="tidak bekerja">0. Tidak Bekerja </option>
                        <option value="pns">1. PNS </option>
                        <option value="tni/polri">2. TNI/Polri </option>
                        <option value="bumn">3. BUMN</option>
                        <option value="pegawai swasta/wirausaha">4. Pegawai Swasta/Wirausaha </option>
                        <option value="lain lain">5. Lain-lain </option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="tinggi_b">Tinggi Badan</label>
                    <input class="field-input" type="text" name="tinggi_b" id="tinggi_b" value="<?= $karp['tinggi_badan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="lila">LILA</label>
                    <input class="field-input" type="text" name="lila" id="lila" value="<?= $karp['lila'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="KB">Riwayat KB</label>
                    <select class="field-input" name="KB" id="KB">
                        <option value="" selected></option>
                        <option value="tidak pernah">0. Tidak Pernah </option>
                        <option value="pil kb">1. Pil KB </option>
                        <option value="implan">2. Implan</option>
                        <option value="IUD">3. IUD</option>
                        <option value="kondom">4. Kondom</option>
                        <option value="sterilisasi">5. Sterilisasi</option>
                        <option value="suntik">5. Suntik</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="goldar">Golongan Darah</label>
                    <select class="field-input" name="goldar" id="goldar">
                        <option value="" selected></option>
                        <option value="A+">1. A+</option>
                        <option value="A-">2. A-</option>
                        <option value="B+">3. B+</option>
                        <option value="B-">4. B-</option>
                        <option value="O+">5. O+</option>
                        <option value="O-">6. O-</option>
                        <option value="AB+">7. AB+</option>
                        <option value="AB-">8. AB-</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="KIA">Buku KIA</label>
                    <select class="field-input" name="KIA" id="KIA">
                        <option value="" selected></option>
                        <option value="memiliki">1. Memiliki </option>
                        <option value="tidak memiliki">2. Tidak Memiliki </option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="riwayat_persalinan_r">Riwayat Persalinan Sebelumnya</label>
                    <input class="field-input" type="text" name="riwayat_persalinan_s" id="riwayat_persalinan_r" value="<?= $karp['riwayat_persalinan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="status_g">Status Gizi</label>
                    <input class="field-input" type="text" name="status_g" id="status_g" value="<?= $karp['status_gizi'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="riwayat_k">Riwayat Komplikasi</label>
                    <input class="field-input" type="text" name="riwayat_k" id="riwayat_k" value="<?= $karp['riwayat_komplikasi'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label">Riwayat Penyakit</label>
                    <input class="field-input" type="text" name="riwayat_penyakit" value="<?= $karp['riwayat_penyakit'] ?>">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-save me-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(''); ?>
