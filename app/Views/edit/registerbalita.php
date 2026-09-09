<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Form register</p>
            <h1 class="page-title">Register Balita</h1>
            <p class="page-subtitle">Catat data balita secara rapi untuk monitoring tumbuh kembang dan pelayanan kesehatan dasar.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-clipboard2-pulse"></i>
            Balita
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="<?= site_url('ebalita/' . $bal['id_register_balita']) ?>" method="post" class="modern-form">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="no_rm">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" name="no_rm" id="no_rm" value="<?= $bal['nomor_rekam_medis'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nik">NIK</label>
                    <input class="field-input" type="text" name="nik" id="nik" value="<?= $bal['nik'] ?>">
                </div>
            </div>
            <hr style="background-color:rgba(22, 88, 52, 0.98); border: none; " size="7">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nama">Nama</label>
                    <input class="field-input" type="text" name="nama" id="nama" value="<?= $bal['nama'] ?>">
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
                    <input class="field-input" type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $bal['tanggal_lahir'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_ibu">Nama Ibu</label>
                    <input class="field-input" type="text" name="nama_ibu" id="nama_ibu" value="<?= $bal['nama_ibu'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="alamat">Alamat</label>
                    <input class="field-input" type="text" name="alamat" id="alamat" value="<?= $bal['alamat'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_telepon">Nomor Telepon</label>
                    <input class="field-input" type="text" name="no_telepon" id="no_telepon" value="<?= $bal['no_telepon'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="bb">Berat Badan</label>
                    <input class="field-input" type="text" name="bb" id="bb" value="<?= $bal['berat_badan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tb">Tinggi Badan</label>
                    <input class="field-input" type="text" name="tb" id="tb" value="<?= $bal['tinggi_badan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="anak_ke">Anak Ke</label>
                    <input class="field-input" type="text" name="anak_ke" id="anak_ke" value="<?= $bal['anak_ke'] ?>">
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="catatan_imunisasi">Catatan Imunisasi</label>
                    <textarea class="field-input" name="catatan_imunisasi" id="catatan_imunisasi" rows="4" value="<?= $bal['catatan_imunisasi'] ?>"></textarea>
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

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-save me-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(''); ?>
