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
    <div class="col-auto ">
        <button type="submit" class="btn btn-primary btn-lg mb-3">
            <a style="color: white;" class="bi bi-plus-circle me-2" href="/tambahkarlain">Tambah Riwayat Pemeriksaan </a>
        </button>
    </div>
    <div class="modern-form-panel">
        <form action="/kartuibu" method="post" class="modern-form">
            <?= csrf_field(); ?>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="no_rm">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" id="no_rm" name="no_rm">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nik">NIK</label>
                    <input class="field-input" type="text" id="nik" name="nik">
                </div>
            </div>
            <hr style="background-color:rgba(22, 88, 52, 0.98); border: none; " size="7">
            <div class="form-grid">

                <div class="field-group">
                    <label class="field-label" for="nama_ibu">Nama Ibu</label>
                    <input class="field-input" type="text" id="nama_ibu" name="nama_ibu">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_suami">Nama Suami</label>
                    <input class="field-input" type="text" id="nama_suami" name="nama_suami">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_lahir">Tanggal Lahir</label>
                    <input class="field-input" type="date" id="tgl_lahir" name="tgl_lahir">
                </div>
                <div class="field-group">
                    <label class="field-label" for="jk">Jenis Kelamin</label>
                    <select class="field-input" id="jk" name="jk">
                        <option value="" selected></option>
                        <option value="laki laki">1. Laki-Laki</option>
                        <option value="perempuan">2. Perempuan</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="agama">Agama</label>
                    <select class="field-input" id="agama" name="agama">
                        <option value="" selected></option>
                        <option value="islam">1. Islam</option>
                        <option value="kristen">2. Kristen</option>
                        <option value="katolik">3. Katolik</option>
                        <option value="hindu">4. Hindu</option>
                        <option value="budha">5. Budha</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="suku">Suku</label>
                    <input class="field-input" type="text" id="suku" name="suku">
                </div>
                <div class="field-group">
                    <label class="field-label" for="bahasa">Bahasa</label>
                    <input class="field-input" type="text" id="bahasa" name="bahasa">
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="alamat">Alamat</label>
                    <input class="field-input" type="text" id="alamat" name="alamat">
                </div>
                <div class="field-group">
                    <label class="field-label" for="rt_rw">RT/RW</label>
                    <input class="field-input" type="text" id="rt_rw" name="rt_rw">
                </div>
                <div class="field-group">
                    <label class="field-label" for="desa_kel">Desa/Kel</label>
                    <input class="field-input" type="text" id="desa_kel" name="desa_kel">
                </div>
                <div class="field-group">
                    <label class="field-label" for="kec">Kecamatan</label>
                    <input class="field-input" type="text" id="kec" name="kec">
                </div>
                <div class="field-group">
                    <label class="field-label" for="kota_kab">Kota/Kab</label>
                    <input class="field-input" type="text" id="kota_kab" name="kota_kab">
                </div>
                <div class="field-group">
                    <label class="field-label" for="kode_pos">Kode Pos</label>
                    <input class="field-input" type="text" id="kode_pos" name="kode_pos">
                </div>
                <div class="field-group">
                    <label class="field-label" for="prov">Provinsi</label>
                    <input class="field-input" type="text" id="prov" name="prov">
                </div>
                <div class="field-group">
                    <label class="field-label" for="negara">Negara</label>
                    <input class="field-input" type="text" id="negara" name="negara">
                </div>
                <div class="field-group">
                    <label class="field-label" for="pendidikan">Pendidikan</label>
                    <input class="field-input" type="text" id="pendidikan" name="pendidikan">
                </div>
                <div class="field-group">
                    <label class="field-label" for="pekerjaan">Pekerjaan</label>
                    <input class="field-input" type="text" id="pekerjaan" name="pekerjaan">
                </div>
                <div class="field-group">
                    <label class="field-label" for="status_per">Status Pernikahan</label>
                    <select class="field-input" id="status_per" name="status_per">
                        <option value="" selected></option>
                        <option value="menikah">Menikah</option>
                        <option value="belum menikah">Belum Menikah</option>
                        <option value="cerai">Cerai</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="bayar">Pembayaran</label>
                    <input class="field-input" type="text" id="bayar" name="bayar">
                </div>
                <div class="field-group">
                    <label class="field-label" for="posdu">Posyandu</label>
                    <input class="field-input" type="text" id="posdu" name="posdu">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_kad">Nama Kader</label>
                    <input class="field-input" type="text" id="nama_kad" name="nama_kad">
                </div>
                <div class="field-group">
                    <label class="field-label" for="disab">Disabilitas</label>
                    <input class="field-input" type="text" id="disab" name="disab">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_regis">Tanggal Registrasi</label>
                    <input class="field-input" type="date" id="tgl_regis" name="tgl_regis">
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_telp">No Telepon</label>
                    <input class="field-input" type="text" id="no_telp" name="no_telp">
                </div>
                <div class="field-group">
                    <label class="field-label" for="id_general">ID General Consent</label>
                    <select class="field-input selectpicker" data-live-search="true" name="id_general" id="id_general" title="Pilih ID general">
                        <?php foreach ($kartuibu as $b): ?>
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
        const idGeneral = document.getElementById('id_general');
        const noRm = document.getElementById('no_rm');
        const nik = document.getElementById('nik');
        const namaIbu = document.getElementById('nama_ibu');
        const namaSuami = document.getElementById('nama_suami');
        const tglLahir = document.getElementById('tgl_lahir');
        const alamat = document.getElementById('alamat');
        const noTelp = document.getElementById('no_telp');

        if (idGeneral) {
            idGeneral.addEventListener('change', function() {
                const id = this.value;
                if (!id) return;

                fetch('/getRekamMedis_ibu/' + id)
                    .then(response => response.json())
                    .then(data => {
                        if (noRm) noRm.value = data.no_rm || '';
                        if (nik) nik.value = data.nik || '';
                        if (namaIbu) namaIbu.value = data.nama_ibu || '';
                        if (tglLahir) tglLahir.value = data.tgl_lahir || '';
                        if (noTelp) noTelp.value = data.no_telp || '';
                        if (alamat) alamat.value = data.alamat || '';
                    })
                    .catch(error => console.error('Gagal mengambil data:', error));
            });
        }
    });
</script>
<?= $this->endSection(); ?>