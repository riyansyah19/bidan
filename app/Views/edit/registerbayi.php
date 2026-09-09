<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Form register</p>
            <h1 class="page-title">Register Bayi</h1>
            <p class="page-subtitle">Dokumentasikan kondisi bayi baru lahir secara konsisten agar pelayanan neonatal lebih terukur dan aman.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-person-heart"></i>
            Bayi
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="<?= site_url('ebayi/' . $bay['id_register_bayi']) ?>" method="post" class="modern-form">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="no_rm">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" name="no_rm" id="no_rm" value="<?= $bay['nomor_rekam_medis'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nik">NIK</label>
                    <input class="field-input" type="text" name="nik" id="nik" value="<?= $bay['nik'] ?>">
                </div>
            </div>
            <hr style="background-color:rgba(22, 88, 52, 0.98); border: none; " size="7">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nama_bayi">Nama Bayi</label>
                    <input class="field-input" type="text" name="nama_bayi" id="nama_bayi" value="<?= $bay['nama_bayi'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="jk">Jenis Kelamin</label>
                    <select class="field-input" name="jk" id="jk" value="<?= $bay['jenis_kelamin'] ?>">
                        <option value="" selected></option>
                        <option value="tidak diketahui">0.Tidak diketahui</option>
                        <option value="laki laki">1. Laki-Laki</option>
                        <option value="perempuan">2. Perempuan</option>
                        <option value="tidak dapat ditentukan">3. Tidak dapat ditentukan</option>
                        <option value="tidak mengetahui">4. Tidak Mengetahui</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <input class="field-input" type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= $bay['tanggal_lahir'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_ibu">Nama Ibu</label>
                    <input class="field-input" type="text" name="nama_ibu" id="nama_ibu" value="<?= $bay['nama_ibu'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="alamat_lengkap">Alamat</label>
                    <input class="field-input" type="text" name="alamat_lengkap" id="alamat_lengkap" value="<?= $bay['alamat_lengkap'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_telp">Nomor Telepon</label>
                    <input class="field-input" type="text" name="no_telp" id="no_telp" value="<?= $bay['no_telepon'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="BB_lahir">Berat Lahir</label>
                    <input class="field-input" type="text" name="BB_lahir" id="BB_lahir" value="<?= $bay['berat_badan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="panjang_lahir">Panjang Lahir</label>
                    <input class="field-input" type="text" name="panjang_lahir" id="panjang_lahir" value="<?= $bay['panjang_lahir'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="buku_kia">Memiliki Buku KIA</label>
                    <select class="field-input" name="buku_kia" id="buku_kia" value="<?= $bay['memiliki_buku_kia'] ?>">
                        <option value="" selected></option>
                        <option value="memiliki">1. Memiliki</option>
                        <option value="tidak memiliki">2. Tidak Memiliki</option>
                    </select>
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="catatan_neonatall">Catatan Neonatal</label>
                    <textarea class="field-input" name="catatan_neonatal" id="catatan_neonatall" rows="4" value="<?= $bay['catatan_neonatal'] ?>"></textarea>
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
