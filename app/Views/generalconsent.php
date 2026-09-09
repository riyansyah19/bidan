<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Form general consent</p>
            <h1 class="page-title">General Consent</h1>
            <p class="page-subtitle">Kelola persetujuan umum pasien dan wali dengan formulir yang rapi, lengkap, dan mudah diakses.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-shield-plus"></i>
            Persetujuan
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="/general" method="post" enctype="multipart/form-data" class="modern-form">
            <?= csrf_field(); ?>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nomor_rekam_medis">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" id="nomor_rekam_medis" name="nomor_rekam_medis">
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
                    <label class="field-label" for="alamat_pasien">Alamat Pasien</label>
                    <input class="field-input" type="text" id="alamat_pasien" name="alamat_pasien">
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_hp_pasien">No HP Pasien</label>
                    <input class="field-input" type="text" id="no_hp_pasien" name="no_hp_pasien">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_wali">Nama Wali</label>
                    <input class="field-input" type="text" id="nama_wali" name="nama_wali">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tanggal_lahir_wali">Tanggal Lahir Wali</label>
                    <input class="field-input" type="date" id="tanggal_lahir_wali" name="tanggal_lahir_wali">
                </div>
                <div class="field-group">
                    <label class="field-label" for="alamat_wali">Alamat Wali</label>
                    <input class="field-input" type="text" id="alamat_wali" name="alamat_wali">
                </div>
                <div class="field-group">
                    <label class="field-label" for="hubungan_dengan_pasien">Hubungan dengan Pasien</label>
                    <select class="field-input" id="hubungan_dengan_pasien" name="hubungan_dengan_pasien">
                        <option value="" selected></option>
                        <option value="suami">Suami</option>
                        <option value="ayah">Ayah</option>
                        <option value="ibu">Ibu</option>
                        <option value="anak">Anak</option>
                        <option value="saudara">Saudara</option>
                        <option value="diri sendiri">Diri Sendiri</option>
                        <option value="lain lain">Lain-lain</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_hp_wali">No HP Wali</label>
                    <input class="field-input" type="text" id="no_hp_wali" name="no_hp_wali">
                </div>
                <div class="field-group">
                    <label class="field-label" for="saksi">Saksi</label>
                    <input class="field-input" type="file" id="saksi" name="saksi" accept="image/*" required>
                </div>
                <div class="field-group">
                    <label class="field-label" for="penanggung_jawab">Penanggung Jawab</label>
                    <input class="field-input" type="file" id="penanggung_jawab" name="penanggung_jawab" accept="image/*" required>
                </div>
                <div class="field-group">
                    <label class="field-label" for="petugas">Petugas</label>
                    <input class="field-input" type="file" id="petugas" name="petugas" accept="image/*" required>
                </div>
                <div class="field-group">
                    <label class="field-label" for="id_kunjungan">ID Kunjungan</label>
                    <select class="field-input selectpicker" data-live-search="true" name="id_kunjungan" id="id_kunjungan" title="Pilih ID kunjungan">
                        <?php foreach ($gen as $b): ?>
                            <option value="<?= $b['id_register_kunjungan'] ?>"><?= $b['id_register_kunjungan'] ?> - <?= $b['nomor_rekam_medis'] ?> - <?= $b['nama_penderita'] ?></option>
                        <?php endforeach; ?>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const idKunjungan = document.getElementById('id_kunjungan');
        const noRekam = document.getElementById('nomor_rekam_medis');
        const nik = document.getElementById('nik');
        const namaPasien = document.getElementById('nama_pasien');
        const alamatPasien = document.getElementById('alamat_pasien');

        if (idKunjungan) {
            idKunjungan.addEventListener('change', function() {
                const id = this.value;
                if (!id) return;

                fetch('/getRekamMedis_g/' + id)
                    .then(response => response.json())
                    .then(data => {
                        if (noRekam) noRekam.value = data.nomor_rekam_medis || '';
                        if (nik) nik.value = data.nik || '';
                        if (namaPasien) namaPasien.value = data.nama_pasien || '';
                        if (alamatPasien) alamatPasien.value = data.alamat_pasien || '';
                    })
                    .catch(error => console.error('Gagal mengambil data:', error));
            });
        }
    });
</script>
<?= $this->endSection(); ?>