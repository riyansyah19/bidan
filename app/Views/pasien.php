<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Form pasien</p>
            <h1 class="page-title">Data Pasien</h1>
            <p class="page-subtitle">Kelola informasi pasien secara terstruktur agar data rekam medis tetap rapi dan mudah diakses.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-people-fill"></i>
            Pendaftaran
        </div>
    </div>

    <?php if (session()->getFlashdata('pesanpasien')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesanpasien'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="ppasien" method="post" class="modern-form">
            <?= csrf_field(); ?>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nomor_rekam">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" id="nomor_rekam" name="nomor_rekam">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nik">NIK</label>
                    <input class="field-input" type="text" id="nik" name="nik">
                </div>
            </div>
            <hr style="background-color:rgba(22, 88, 52, 0.98); border: none; " size="7">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nama_pasien">Nama Pasien</label>
                    <input class="field-input" type="text" id="nama_pasien" name="nama_pasien">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <input class="field-input" type="date" id="tanggal_lahir" name="tanggal_lahir">
                </div>
                <div class="field-group">
                    <label class="field-label" for="alamat">Alamat Lengkap</label>
                    <input class="field-input" type="text" id="alamat" name="alamat">
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_telp">Nomor Telepon</label>
                    <input class="field-input" type="text" id="no_telp" name="no_telp">
                </div>
                <div class="field-group">
                    <label class="field-label" for="jk">Jenis Kelamin</label>
                    <select class="field-input" name="jk" id="jk">
                        <option value="" selected></option>
                        <option value="tidak diketahui">0. Tidak diketahui</option>
                        <option value="laki laki">1. Laki-Laki</option>
                        <option value="perempuan">2. Perempuan</option>
                        <option value="tidak dapat ditentukan">3. Tidak dapat ditentukan</option>
                        <option value="tidak mengetahui">4. Tidak Mengetahui</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="agama">Agama</label>
                    <select class="field-input" name="agama" id="agama">
                        <option value="" selected></option>
                        <option value="islam">1. Islam</option>
                        <option value="kristen (protestan)">2. Kristen (Protestan)</option>
                        <option value="katolik">3. Katolik</option>
                        <option value="hindu">4. Hindu</option>
                        <option value="budha">5. Budha</option>
                        <option value="kongkhucu">6. Konghucu</option>
                        <option value="penghayat">7. Penghayat</option>
                        <option value="lain lain">8. Lain-lain</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-plus-circle me-2"></i>Tambah
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(''); ?>