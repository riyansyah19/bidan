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
        <form action="bayi" method="post" class="modern-form">
            <?= csrf_field(); ?>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="no_rm">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" name="no_rm" id="no_rm">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nik">NIK</label>
                    <input class="field-input" type="text" name="nik" id="nik">
                </div>
            </div>
            <hr style="background-color:rgba(22, 88, 52, 0.98); border: none; " size="7">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nama_bayi">Nama Bayi</label>
                    <input class="field-input" type="text" name="nama_bayi" id="nama_bayi">
                </div>
                <div class="field-group">
                    <label class="field-label" for="jk">Jenis Kelamin</label>
                    <select class="field-input" name="jk" id="jk">
                        <option value="" selected></option>
                        <option value="0">0. Tidak diketahui</option>
                        <option value="1">1. Laki-Laki</option>
                        <option value="2">2. Perempuan</option>
                        <option value="3">3. Tidak dapat ditentukan</option>
                        <option value="4">4. Tidak Mengetahui</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <input class="field-input" type="date" name="tanggal_lahir" id="tanggal_lahir">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_ibu">Nama Ibu</label>
                    <input class="field-input" type="text" name="nama_ibu" id="nama_ibu">
                </div>
                <div class="field-group">
                    <label class="field-label" for="alamat_lengkap">Alamat</label>
                    <input class="field-input" type="text" name="alamat_lengkap" id="alamat_lengkap">
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_telp">Nomor Telepon</label>
                    <input class="field-input" type="text" name="no_telp" id="no_telp">
                </div>
                <div class="field-group">
                    <label class="field-label" for="BB_lahir">Berat Lahir</label>
                    <input class="field-input" type="text" name="BB_lahir" id="BB_lahir">
                </div>
                <div class="field-group">
                    <label class="field-label" for="panjang_lahir">Panjang Lahir</label>
                    <input class="field-input" type="text" name="panjang_lahir" id="panjang_lahir">
                </div>
                <div class="field-group">
                    <label class="field-label" for="buku_kia">Memiliki Buku KIA</label>
                    <select class="field-input" name="buku_kia" id="buku_kia">
                        <option value="" selected></option>
                        <option value="memiliki">Memiliki</option>
                        <option value="tidak memiliki">Tidak Memiliki</option>
                    </select>
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="catatan_neonatal">Catatan Neonatal</label>
                    <textarea class="field-input" name="catatan_neonatal" id="catatan_neonatal" rows="4"></textarea>
                </div>
                <div class="field-group">
                    <label class="field-label" for="id_general">ID General Consent</label>
                    <select class="field-input selectpicker" data-live-search="true" name="id_general" id="id_general" title="Pilih ID General">
                        <?php foreach ($bayi as $b): ?>
                            <option value="<?= $b['id_general_consent'] ?>"><?= $b['id_general_consent'] ?> - <?= $b['nomor_rekam_medis_gc'] ?> - <?= $b['nama_pasien'] ?></option>
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
        var idgeneralselect = document.getElementById('id_general');
        var noRekamMedisInput = document.getElementById('no_rm');
        var NIKInput = document.getElementById('nik');
        var NamaInput = document.getElementById('nama_bayi');
        var AlamatInput = document.getElementById('alamat_lengkap');
        var TTLInput = document.getElementById('tanggal_lahir');

        if (idgeneralselect) {
            idgeneralselect.addEventListener('change', function() {
                var idgeneral = this.value;
                if (!idgeneral) return;

                fetch('/getRekamMedis_b/' + idgeneral)
                    .then(response => response.json())
                    .then(data => {
                        noRekamMedisInput.value = data.no_rm || '';
                        NIKInput.value = data.nik || '';
                        NamaInput.value = data.nama_bayi || '';
                        AlamatInput.value = data.alamat_lengkap || '';
                        TTLInput.value = data.tanggal_lahir || '';
                    })
                    .catch(error => console.error('Gagal mengambil data:', error));
            });
        }
    });
</script>
<?= $this->endSection(''); ?>