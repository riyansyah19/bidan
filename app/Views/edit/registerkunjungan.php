<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Form kunjungan</p>
            <h1 class="page-title">Register Kunjungan</h1>
            <p class="page-subtitle">Catat informasi kunjungan pasien agar proses pelayanan dan dokumentasi menjadi lebih cepat dan terstandarisasi.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-journal-medical"></i>
            Pelayanan
        </div>
    </div>

    <?php if (session()->getFlashdata('pesankunjungan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesankunjungan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="<?= site_url('ekunjungan/' . $rek['id_register_kunjungan']) ?>" method="post" class="modern-form">
            <?= csrf_field(); ?>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nomor_rekam">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" id="nomor_rekam" name="nomor_rekam" value="<?= $rek['nomor_rekam_medis'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nik">NIK</label>
                    <input class="field-input" type="text" id="nik" name="nik" value="<?= $rek['nik'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_penderita">Nama Penderita</label>
                    <input class="field-input" type="text" id="nama_penderita" name="nama_penderita" value="<?= $rek['nama_penderita'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <input class="field-input" type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $rek['tanggal_lahir'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="alamat">Alamat</label>
                    <input class="field-input" type="text" id="alamat" name="alamat" value="<?= $rek['alamat'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="Kelurahan">Kelurahan</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('Kelurahan') ? 'is-invalid' : '' ?>" type="text" id="Kelurahan" name="Kelurahan" value="<?= $rek['kelurahan'] ?>">
                    <?php if (isset($validation) && $validation->hasError('Kelurahan')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('Kelurahan') ?></div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="agama">Agama</label>
                    <select class="field-input <?= isset($validation) && $validation->hasError('agama') ? 'is-invalid' : '' ?>" name="agama" id="agama">
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
                    <?php if (isset($validation) && $validation->hasError('agama')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('agama') ?></div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="Diagnosa">Diagnosa</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('Diagnosa') ? 'is-invalid' : '' ?>" type="text" id="Diagnosa" name="Diagnosa" value="<?= $rek['diagnosa'] ?>">
                    <?php if (isset($validation) && $validation->hasError('Diagnosa')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('Diagnosa') ?></div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="Terapi_Obat">Terapi Obat</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('Terapi_Obat') ? 'is-invalid' : '' ?>" type="text" id="Terapi_Obat" name="Terapi_Obat" value="<?= $rek['therapy_or_obat'] ?>">
                    <?php if (isset($validation) && $validation->hasError('Terapi_Obat')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('Terapi_Obat') ?></div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="tanggal_masuk">Tanggal Masuk</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('tanggal_masuk') ? 'is-invalid' : '' ?>" type="date" id="tanggal_masuk" name="tanggal_masuk" value="<?= $rek['tanggal_masuk'] ?>">
                    <?php if (isset($validation) && $validation->hasError('tanggal_masuk')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('tanggal_masuk') ?></div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="jenis_kunjungan">Jenis Kunjungan</label>
                    <select class="field-input <?= isset($validation) && $validation->hasError('jenis_kunjungan') ? 'is-invalid' : '' ?>" name="jenis_kunjungan" id="jenis_kunjungan">
                        <option value="" selected></option>
                        <option value="pasien lama">1. Pasien Lama</option>
                        <option value="pasien baru">2. Pasien Baru</option>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('jenis_kunjungan')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('jenis_kunjungan') ?></div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="Jasa">Jasa</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('Jasa') ? 'is-invalid' : '' ?>" type="text" id="Jasa" name="Jasa" value="<?= $rek['jasa'] ?>">
                    <?php if (isset($validation) && $validation->hasError('Jasa')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('Jasa') ?></div>
                    <?php endif; ?>
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label class="field-label" for="Keterangan">Keterangan</label>
                    <textarea class="field-input" id="Keterangan" name="Keterangan" rows="4" value="<?= $rek['keterangan'] ?>"></textarea>
                </div>
                <div class="field-group">
                    <label class="field-label" for="petugas">Petugas Yang Bertanggung Jawab</label>
                    <input class="field-input <?= isset($validation) && $validation->hasError('petugas') ? 'is-invalid' : '' ?>" type="text" id="petugas" name="petugas" value="<?= $rek['petugas_bertanggung_jawab'] ?>">
                    <?php if (isset($validation) && $validation->hasError('petugas')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('petugas') ?></div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="id_petugas">ID User dan Petugas</label>
                    <select class="field-input selectpicker <?= isset($validation) && $validation->hasError('id_petugas') ? 'is-invalid' : '' ?>" data-live-search="true" name="id_petugas" id="id_petugas" title="Pilih ID User dan Petugas">
                        <?php foreach ($kun as $b): ?>
                            <option value="<?= $b['id_user'] ?>"><?= $b['id_user'] ?> - <?= $b['username'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('id_petugas')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('id_petugas') ?></div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="id_pasien">ID Pasien</label>
                    <select class="field-input selectpicker <?= isset($validation) && $validation->hasError('id_pasien') ? 'is-invalid' : '' ?>" data-live-search="true" name="id_pasien" id="id_pasien" title="Pilih ID Pasien">
                        <?php foreach ($pasien as $b): ?>
                            <option value="<?= $b['id_pasien'] ?>"><?= $b['id_pasien'] ?> - <?= $b['nama_pasien'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('id_pasien')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('id_pasien') ?></div>
                    <?php endif; ?>
                </div>
                <div class="field-group">
                    <label class="field-label" for="vol_name">ICD</label>
                    <select class="field-input selectpicker <?= isset($validation) && $validation->hasError('vol_name') ? 'is-invalid' : '' ?>" data-live-search="true" name="vol_name" id="vol_name" title="Pilih ID ICD">
                        <?php foreach ($icd as $b): ?>
                            <option value="<?= $b['vol_name'] ?>"><?= $b['vol_name'] ?> - <?= $b['vol_code'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('vol_name')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('vol_name') ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i></i>edit
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
                var idpasienselect = document.getElementById('id_pasien');
                var noRekamMedisInput = document.getElementById('nikar NIKInput = document.getElementById('
                    nik ');
                    var NamaInput = document.getElementById('nama_penderita');
                    var AlamatInput = document.getElementById('alamat');
                    var TTLInput = document.getElementById('tanggal_lahir');

                    if (idpasienselect) {
                        idpasienselect.addEventListener('change', function() {
                            var idpasien = this.value;

                            if (idpasien !== "") {
                                fetch('/getRekamMedis/' + idpasien)
                                    .then(response => response.json())
                                    .then(data => {
                                        noRekamMedisInput.value = data.nomor_rekam;
                                        NIKInput.value = data.nik;
                                        NamaInput.value = data.nama_penderita;
                                        AlamatInput.value = data.alamat;
                                        TTLInput.value = data.tanggal_lahir;
                                    })
                                    .catch(error => {
                                        console.error('Gagal mengambil data:', error);
                                        noRekamMedisInput.value = '';
                                        NIKInput.value = '';
                                        NamaInput.value = '';
                                        TTLInput.value = '';
                                    });
                            } else {
                                noRekamMedisInput.value = '';
                            }
                        });
                    }
                });
</script>
<?= $this->endSection(''); ?>