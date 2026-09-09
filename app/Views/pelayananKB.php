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
        <form action="pelayanankb" method="post" class="modern-form">
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
                    <label class="field-label" for="nama">Nama</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" id="nama">
                    <?php if (isset($validation) && $validation->hasError('nama')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('nama') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="jk">Jenis Kelamin</label>
                    <select class="field-input <?= isset($validation) && $validation->hasError('jk') ? 'is-invalid' : '' ?>" name="jk" id="jk">
                        <option value="" selected></option>
                        <option value="tidak diketahui">0.Tidak diketahui</option>
                        <option value="laki laki">1. Laki-Laki</option>
                        <option value="perempuan">2. Perempuan</option>
                        <option value="tidak dapat ditentukan">3. Tidak dapat ditentukan</option>
                        <option value="tidak mengetahui">4. Tidak Mengetahui</option>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('jk')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('jk') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_lahir">Tanggal Lahir</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('tgl_lahir') ? 'is-invalid' : '' ?>" type="date" name="tgl_lahir" id="tgl_lahir">
                    <?php if (isset($validation) && $validation->hasError('tgl_lahir')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('tgl_lahir') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_ibu">Nama Ibu</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('nama_ibu') ? 'is-invalid' : '' ?>" type="text" name="nama_ibu" id="nama_ibu">
                    <?php if (isset($validation) && $validation->hasError('nama_ibu')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('nama_ibu') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="alamat">Alamat</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('alamat') ? 'is-invalid' : '' ?>" type="text" name="alamat" id="alamat">
                    <?php if (isset($validation) && $validation->hasError('alamat')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('alamat') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="jenis_pasien">Jenis Pasien</label>
                    <select class="field-input <?= isset($validation) && $validation->hasError('jenis_pasien') ? 'is-invalid' : '' ?>" name="jenis_pasien" id="jenis_pasien">
                        <option value="" selected></option>
                        <option value="pasien baru">1. Pasien Baru</option>
                        <option value="pasien lama">2. Pasien Lama</option>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('jenis_pasien')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('jenis_pasien') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_suami">Nama Suami</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('nama_suami') ? 'is-invalid' : '' ?>" type="text" name="nama_suami" id="nama_suami">
                    <?php if (isset($validation) && $validation->hasError('nama_suami')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('nama_suami') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="jumlah_anak">Jumlah Anak</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('jumlah_anak') ? 'is-invalid' : '' ?>" type="text" name="jumlah_anak" id="jumlah_anak">
                    <?php if (isset($validation) && $validation->hasError('jumlah_anak')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('jumlah_anak') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="gakin">Gakin</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('gakin') ? 'is-invalid' : '' ?>" type="text" name="gakin" id="gakin">
                    <?php if (isset($validation) && $validation->hasError('gakin')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('gakin') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="4t">4T</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('4t') ? 'is-invalid' : '' ?>" type="text" name="4t" id="4t">
                    <?php if (isset($validation) && $validation->hasError('4t')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('4t') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="metode">Metode</label>
                    <select class="field-input <?= isset($validation) && $validation->hasError('metode') ? 'is-invalid' : '' ?>" name="metode" id="metode">
                        <option value="" selected></option>
                        <option value="pil kb">1. Pil KB</option>
                        <option value="implan">2. Implan</option>
                        <option value="IUD">3. IUD</option>
                        <option value="suntik">4. Suntik</option>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('metode')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('metode') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="id_informed">ID Informed</label>
                    <select class="field-input selectpicker <?= isset($validation) && $validation->hasError('id_informed') ? 'is-invalid' : '' ?>" data-live-search="true" name="id_informed" id="id_informed" title="Pilih ID informed" data-width="100%">
                        <?php foreach ($pelayanankb as $b): ?>
                            <option value="<?= $b['id_informed_consent_p'] ?>">
                                <?= $b['id_informed_consent_p'] ?> - <?= $b['nomor_rekam_medis'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('id_informed')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('id_informed') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="catatan_alki">Catatan ALKI(Anemia)/LILA</label>
                    <textarea class="field-input" name="catatan_alki" id="catatan_alki" rows="4"></textarea>
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
        var idinformedselect = document.getElementById('id_informed');
        var noRekamMedisInput = document.getElementById('no_rm');
        var NIKInput = document.getElementById('nik');



        idinformedselect.addEventListener('change', function() {
            var idinformed = this.value;

            if (idinformed !== "") {
                fetch('/getRekamMedis_kb/' + idinformed)
                    .then(response => response.json())
                    .then(data => {
                        noRekamMedisInput.value = data.no_rm;
                        NIKInput.value = data.nik;

                    })
                    .catch(error => {
                        console.error('Gagal mengambil data:', error);
                        noRekamMedisInput.value = '';
                        NIKInput.value = '';

                    });
            } else {
                noRekamMedisInput.value = '';
            }
        });
    });
</script>
<?= $this->endSection(''); ?>
