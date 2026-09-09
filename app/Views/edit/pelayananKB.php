<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Form pelayanan</p>
            <h1 class="page-title">Pelayanan KB</h1>
            <p class="page-subtitle">Catat data pelayanan keluarga berencana agar riwayat pasien tersimpan rapi dan mudah ditelusuri.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-heart-fill"></i>
            KB
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="<?= site_url('epelayanan/' . $kb['id_register_pelayanan_kb']) ?>" method="post" class="modern-form">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="no_rm">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" name="no_rm" id="no_rm" value="<?= $kb['nomor_rekam_medis'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nik">NIK</label>
                    <input class="field-input" type="text" name="nik" id="nik" value="<?= $kb['nik'] ?>">
                </div>
            </div>

            <hr style="background-color:rgba(22, 88, 52, 0.98); border: none; " size="7">

            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nama">Nama</label>
                    <input class="field-input" type="text" name="nama" id="nama" value="<?= $kb['nama'] ?>">
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
                    <input class="field-input" type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $kb['tanggal_lahir'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_ibu">Nama Ibu</label>
                    <input class="field-input" type="text" name="nama_ibu" id="nama_ibu" value="<?= $kb['nama_ibu'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="alamat">Alamat</label>
                    <input class="field-input" type="text" name="alamat" id="alamat" value="<?= $kb['alamat_lengkap'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="jenis_pasien">Jenis Pasien</label>
                    <select class="field-input" name="jenis_pasien" id="jenis_pasien">
                        <option value="" selected></option>
                        <option value="pasien baru">1. Pasien Baru</option>
                        <option value="pasien lama">2. Pasien Lama</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_suami">Nama Suami</label>
                    <input class="field-input" type="text" name="nama_suami" id="nama_suami" value="<?= $kb['nama_suami'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="jumlah_anak">Jumlah Anak</label>
                    <input class="field-input" type="text" name="jumlah_anak" id="jumlah_anak" value="<?= $kb['jumlah_anak'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="gakin">Gakin</label>
                    <input class="field-input" type="text" name="gakin" id="gakin" value="<?= $kb['gakin'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="4t">4T</label>
                    <input class="field-input" type="text" name="4t" id="4t" value="<?= $kb['4t'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="metode">Metode</label>
                    <select class="field-input" name="metode" id="metode">
                        <option value="" selected></option>
                        <option value="pil kb">1. Pil KB</option>
                        <option value="implan">2. Implan</option>
                        <option value="IUD">3. IUD</option>
                        <option value="suntik">4. Suntik</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="id_informed">ID Informed</label>
                    <select class="field-input selectpicker" data-live-search="true" name="id_informed" id="id_informed" title="Pilih ID informed">
                        <?php foreach ($inf as $b): ?>
                            <option value="<?= $b['id_informed_consent_p'] ?>">
                                <?= $b['id_informed_consent_p'] ?> - <?= $b['nomor_rekam_medis'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="catatan_alki">Catatan ALKI(Anemia)/LILA</label>
                    <textarea class="field-input" name="catatan_alki" id="catatan_alki" rows="4" value="<?= $kb['catatan_alki'] ?>"></textarea>
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
