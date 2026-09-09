<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Form register</p>
            <h1 class="page-title">Register Persalinan</h1>
            <p class="page-subtitle">Catat proses persalinan dan penolong dengan format yang lebih jelas dan mudah dipantau.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-clipboard2-heart"></i>
            Persalinan
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="<?= site_url('epersalinan/' . $per['id_register_persalinan']) ?>" method="post" class="modern-form">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="no_rm">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" name="no_rm" id="no_rm" value="<?= $per['nomor_rekam_medis'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nik">NIK</label>
                    <input class="field-input" type="text" name="nik" id="nik" value="<?= $per['nik'] ?>">
                </div>
            </div>
            <hr style="background-color:rgba(22, 88, 52, 0.98); border: none; " size="7">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nama">Nama</label>
                    <input class="field-input" type="text" name="nama" id="nama" value="<?= $per['nama'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="jk">Jenis Kelamin</label>
                    <select class="field-input" name="jk" id="jk">
                        <option value="" selected></option>
                        <option value="tidak diketahui">0.Tidak diketahui</option>
                        <option value="laki laki">1. Laki-Laki</option>
                        <option value="perempuan">2. Perempuan</option>
                        <option value="tidak dapat ditentukan">3. Tidak dapat ditentukan</option>
                        <option value="tidak mengetahui">4. Tidak Mengetahui</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_lahir">Tanggal Lahir</label>
                    <input class="field-input" type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $per['tanggal_lahir'] ?>">
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="alamat_lengkap">Alamat Lengkap</label>
                    <input class="field-input" type="text" name="alamat_lengkap" id="alamat_lengkap" value="<?= $per['alamat_lengkap'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_telp">Nomor Telepon</label>
                    <input class="field-input" type="text" name="no_telp" id="no_telp" value="<?= $per['no_telepon'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="penolong">Penolong</label>
                    <select class="field-input" name="penolong" id="penolong">
                        <option value="" selected></option>
                        <option value="bidan">1. Bidan</option>
                        <option value="umum">2. dr. Umum</option>
                        <option value="spesialis">3. dr. Spesialis</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="tempat">Tempat</label>
                    <select class="field-input" name="tempat" id="tempat">
                        <option value="" selected></option>
                        <option value="pustu">1. Pustu</option>
                        <option value="puskesmas">2. Puskesmas</option>
                        <option value="pmb">3. PMB</option>
                        <option value="RSIA">3. RSIA</option>
                        <option value="RS">3. RS</option>
                        <option value="klinik">3. Klinik</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="pendamping">Pendamping</label>
                    <select class="field-input" name="pendamping" id="pendamping">
                        <option value="" selected></option>
                        <option value="suami">1. Suami</option>
                        <option value="keluarga">2. Keluarga</option>
                        <option value="teman">3. Teman</option>
                        <option value="lain lain">4. Lain-lain</option>
                        <option value="tidak ada">5. Tidak ada</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="transportasi">Transportasi</label>
                    <select class="field-input" name="transportasi" id="transportasi">
                        <option value="" selected></option>
                        <option value="suami">1. Suami</option>
                        <option value="keluarga">2. Keluarga</option>
                        <option value="teman">3. Teman</option>
                        <option value="lain lain">4. Lain-lain</option>
                        <option value="tidak ada">5. Tidak ada</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="donor_darah">Pendonor Darah</label>
                    <select class="field-input" name="donor_darah" id="donor_darah">
                        <option value="" selected></option>
                        <option value="suami">1. Suami</option>
                        <option value="keluarga">2. Keluarga</option>
                        <option value="teman">3. Teman</option>
                        <option value="lain lain">4. Lain-lain</option>
                        <option value="tidak ada">5. Tidak ada</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="id_informed">ID Informed Consent</label>
                    <select class="field-input selectpicker" data-live-search="true" name="id_informed" id="id_informed" title="Pilih ID informed">
                        <?php foreach ($inf as $b): ?>
                            <option value="<?= $b['id_informed_consent_p'] ?>">
                                <?= $b['id_informed_consent_p'] ?> - <?= $b['nomor_rekam_medis'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
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
