<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Form riwayat pemeriksaan</p>
            <h1 class="page-title">Kartu Ibu - Riwayat Pemeriksaan</h1>
            <p class="page-subtitle">Catat riwayat pemeriksaan dan data kesehatan ibu hamil secara lengkap untuk monitoring kehamilan.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-calendar-check-fill"></i>
            Riwayat Pemeriksaan
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="/kartuibulain" method="post" class="modern-form">
            <?= csrf_field(); ?>

            <!-- Section: Riwayat Obstetrik -->
            <div class="form-section-header">
                <i class="bi bi-hospital-fill"></i> Riwayat Obstetrik
            </div>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="grav">Gravida</label>
                    <input class="field-input" type="text" id="grav" name="grav">
                </div>
                <div class="field-group">
                    <label class="field-label" for="par">Partus</label>
                    <input class="field-input" type="text" id="par" name="par">
                </div>
                <div class="field-group">
                    <label class="field-label" for="abor">Abortus</label>
                    <input class="field-input" type="text" id="abor" name="abor">
                </div>
                <div class="field-group">
                    <label class="field-label" for="hidup">Hidup</label>
                    <input class="field-input" type="text" id="hidup" name="hidup">
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="catatan">Catatan Khusus</label>
                    <textarea class="field-input" id="catatan" name="catatan" rows="4"></textarea>
                </div>
            </div>

            <!-- Section: Pemeriksaan Bidan -->
            <div class="form-section-header">
                <i class="bi bi-stethoscope"></i> Pemeriksaan Bidan
            </div>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="tgl_peri">Tanggal Periksa</label>
                    <input class="field-input" type="date" id="tgl_peri" name="tgl_peri">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_hpht">Tanggal HPHT</label>
                    <input class="field-input" type="date" id="tgl_hpht" name="tgl_hpht">
                </div>
                <div class="field-group">
                    <label class="field-label" for="taksiran">Taksiran Persalinan</label>
                    <input class="field-input" type="date" id="taksiran" name="taksiran">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_per_s">Tanggal Persalinan Sebelumnya</label>
                    <input class="field-input" type="date" id="tgl_per_s" name="tgl_per_s">
                </div>
                <div class="field-group">
                    <label class="field-label" for="bb_s_h">BB Sebelum Hamil</label>
                    <input class="field-input" type="text" id="bb_s_h" name="bb_s_h" placeholder="kg">
                </div>
                <div class="field-group">
                    <label class="field-label" for="bb_s_i">BB Saat Ini</label>
                    <input class="field-input" type="text" id="bb_s_i" name="bb_s_i" placeholder="kg">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tinggi_b">Tinggi Badan</label>
                    <input class="field-input" type="text" id="tinggi_b" name="tinggi_b" placeholder="cm">
                </div>
                <div class="field-group">
                    <label class="field-label" for="lila">LILA (Lingkar Lengan Atas)</label>
                    <input class="field-input" type="text" id="lila" name="lila" placeholder="cm">
                </div>
                <div class="field-group">
                    <label class="field-label" for="pendidikan_ib">Pendidikan Ibu</label>
                    <select class="field-input" id="pendidikan_ib" name="pendidikan_ib">
                        <option value="" selected></option>
                        <option value="tidak sekolah">1. Tidak Sekolah</option>
                        <option value="sd">2. SD (Protestan)</option>
                        <option value="sltp sederajat">3. SLTP/Sederajat</option>
                        <option value="slta sederajat">4. SLTA/Sederajat</option>
                        <option value="d1-d3 sederajat">5. D1-D3/Sederajat</option>
                        <option value="d4">6. D4</option>
                        <option value="s1">7. S1</option>
                        <option value="s2">8. S2</option>
                        <option value="s3">9. S3</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="pekerjaan_ib">Pekerjaan Ibu</label>
                    <select class="field-input" id="pekerjaan_ib" name="pekerjaan_ib">
                        <option value="" selected></option>
                        <option value="tidak bekerja">0. Tidak Bekerja</option>
                        <option value="pns">1. PNS</option>
                        <option value="tni/polri">2. TNI/Polri</option>
                        <option value="bumn">3. BUMN</option>
                        <option value="pegawai swasta/wirausaha">4. Pegawai Swasta/Wirausaha</option>
                        <option value="lain lain">5. Lain-lain</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="KB">Riwayat KB</label>
                    <select class="field-input" id="KB" name="KB">
                        <option value="" selected></option>
                        <option value="tidak pernah">0. Tidak Pernah</option>
                        <option value="pil kb">1. Pil KB</option>
                        <option value="implan">2. Implan</option>
                        <option value="IUD">3. IUD</option>
                        <option value="kondom">4. Kondom</option>
                        <option value="sterilisasi">5. Sterilisasi</option>
                        <option value="suntik">6. Suntik</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="goldar">Golongan Darah</label>
                    <select class="field-input" id="goldar" name="goldar">
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
                    <select class="field-input" id="KIA" name="KIA">
                        <option value="" selected></option>
                        <option value="memiliki">1. Memiliki</option>
                        <option value="tidak memiliki">2. Tidak Memiliki</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="riwayat_persalinan_s">Riwayat Persalinan Sebelumnya</label>
                    <input class="field-input" type="text" id="riwayat_persalinan_s" name="riwayat_persalinan_s">
                </div>
                <div class="field-group">
                    <label class="field-label" for="status_g">Status Gizi</label>
                    <input class="field-input" type="text" id="status_g" name="status_g">
                </div>
                <div class="field-group">
                    <label class="field-label" for="riwayat_k">Riwayat Komplikasi</label>
                    <input class="field-input" type="text" id="riwayat_k" name="riwayat_k">
                </div>
                <div class="field-group">
                    <label class="field-label" for="riwayat_penyakit">Riwayat Penyakit</label>
                    <input class="field-input" type="text" name="riwayat_penyakit">
                </div>
            </div>

            <!-- Section: Identifikasi Data -->
            <div class="form-section-header">
                <i class="bi bi-person-badge-fill"></i> Identifikasi Data
            </div>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="id_k_ibu">ID Kartu Ibu</label>
                    <select class="field-input selectpicker" data-live-search="true" name="id_k_ibu" id="id_k_ibu" title="Pilih ID kartu ibu">
                        <?php foreach ($kartuibu as $b): ?>
                            <option value="<?= $b['id_kartu_ibu'] ?>">
                                <?= $b['id_kartu_ibu'] ?> - <?= $b['nomor_rekam_medis'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_rekam">Nomor Rekam Medis</label>
                    <select class="field-input selectpicker" data-live-search="true" name="no_rekam" id="no_rekam" title="Pilih Nomor Rekam Medis">
                        <?php foreach ($kartuibu as $b): ?>
                            <option value="<?= $b['nomor_rekam_medis'] ?>">
                                <?= $b['nomor_rekam_medis'] ?> - <?= $b['nama_lengkap_ibu'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Riwayat
                </button>
                <a href="javascript:history.back()" class="btn btn-outline-secondary btn-lg">
                    <i class="bi bi-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>