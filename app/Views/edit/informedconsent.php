<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Form informed consent</p>
            <h1 class="page-title">Informed Consent</h1>
            <p class="page-subtitle">Dokumentasikan persetujuan tindakan medis dengan format yang lebih rapi dan profesional.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-file-text-fill"></i>
            Persetujuan
        </div>
    </div>

    <?php if (session()->getFlashdata('pesaninformed')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesaninformed'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="<?= site_url('einformed/' . $inf['id_informed_consent_p']) ?>" method="post" enctype="multipart/form-data" class="modern-form">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="no_rm">Nomor Rekam Medis</label>
                    <input class="field-input" type="text" name="no_rm" id="no_rm" value="<?= $inf['nomor_rekam_medis'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="nik">NIK</label>
                    <input class="field-input" type="text" name="nik" id="nik" value="<?= $inf['nik'] ?>">
                </div>
            </div>
            <hr style="background-color:rgba(22, 88, 52, 0.98); border: none; " size="7">
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="nama_pj">Nama Penanggung Jawab</label>
                    <input class="field-input" type="text" name="nama_pj" id="nama_pj" value="<?= $inf['nama_penanggung_jawab'] ?>">
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
                    <input class="field-input" type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $inf['tanggal_lahir'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="no_telp">No Telepon</label>
                    <input class="field-input" type="text" name="no_telp" id="no_telp" value="<?= $inf['no_telepon'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="hubungan_dengan_pasien">Hubungan dengan Pasien</label>
                    <select class="field-input" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien">
                        <option value="" selected></option>
                        <option value="suami">1. Suami </option>
                        <option value="ayah">2. Ayah </option>
                        <option value="ibu">3. Ibu </option>
                        <option value="anak">4. Anak </option>
                        <option value="saudara">5. Saudara </option>
                        <option value="diri sendiri">6. Diri Sendiri </option>
                        <option value="lain lain">7. Lain-lain </option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="diagnosa">Diagnosa</label>
                    <input class="field-input" type="text" name="diagnosa" id="diagnosa" value="<?= $inf['diagnosa'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tindakan_medis">Tindakan Medis</label>
                    <input class="field-input" type="text" name="tindakan_medis" id="tindakan_medis" value="<?= $inf['tindakan_medis'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tujuan">Tujuan</label>
                    <input class="field-input" type="text" name="tujuan" id="tujuan" value="<?= $inf['tujuan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="resiko_tindakan">Resiko Tindakan</label>
                    <input class="field-input" type="text" name="resiko_tindakan" id="resiko_tindakan" value="<?= $inf['resiko_tindakan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="prognosis">Prognosis</label>
                    <input class="field-input" type="text" name="prognosis" id="prognosis" value="<?= $inf['prognosis'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="ket">Keterangan</label>
                    <select class="field-input" name="ket" id="ket">
                        <option value="" selected></option>
                        <option value="menyetujui">1. Menyetujui</option>
                        <option value="menolak">2. Menolak</option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="nama_petugas">Nama Petugas</label>
                    <input class="field-input" type="text" name="nama_petugas" id="nama_petugas" value="<?= $inf['nama_petugas'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="tgl_pelaksanaan">Tanggal Pelaksaan</label>
                    <input class="field-input" type="date" name="tgl_pelaksanaan" id="tgl_pelaksanaan" value="<?= $inf['tanggal_pelaksanaan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="waktu_mulai">Waktu Mulai Tindakan</label>
                    <input class="field-input" type="time" name="waktu_mulai" id="waktu_mulai" value="<?= $inf['waktu_mulai_tindakan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="waktu_selesai">Waktu Selesai Tindakan</label>
                    <input class="field-input" type="time" name="waktu_selesai" id="waktu_selesai" value="<?= $inf['waktu_selesai_tindakan'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="alat_medis">Alat Medis</label>
                    <input class="field-input" type="text" name="alat_medis" id="alat_medis" value="<?= $inf['alat_medis'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="bmhp">BMHP</label>
                    <input class="field-input" type="text" name="bmhp" id="bmhp" value="<?= $inf['bmhp'] ?>">
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
                    <label class="field-label" for="id_k_ibu">ID Kartu Ibu</label>
                    <select class="field-input selectpicker" data-live-search="true" name="id_k_ibu" id="id_k_ibu" title="Pilih ID Kartu Ibu">
                        <?php foreach ($kar as $b): ?>
                            <option value="<?= $b['id_kartu_ibu'] ?>">
                                <?= $b['id_kartu_ibu'] ?> - <?= $b['nomor_rekam_medis'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label" for="vol_name">ICD</label>
                    <select class="field-input selectpicker <?= isset($validation) && $validation->hasError('vol_name') ? 'is-invalid' : '' ?>" data-live-search="true" name="vol_name" id="vol_name" title="Pilih ID ICD">
                        <?php foreach ($icd as $b): ?>
                            <option value="<?= $b['vol_name'] ?>">
                                <?= $b['vol_name'] ?> - <?= $b['vol_code'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('vol_name')): ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('vol_name') ?>
                        </div>
                    <?php endif; ?>
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
