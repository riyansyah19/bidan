<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<?php $role = session()->get('role'); ?>

<style>
    :root {
        --primary: #1c9a93;
        --primary-dark: #0e6d69;
        --text: #18312f;
        --text-soft: #5f7876;
        --line: rgba(20, 54, 50, 0.12);
    }

    body {
        font-family: "Inter", "Segoe UI", sans-serif;
        color: var(--text);
    }

    .lihat-container {
        height: auto;
        background-color: white;
        margin-top: 10px;
        margin-left: 10px;
        margin-right: 10px;
        border-radius: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .lihat-header {
        padding: 2rem;
        border-bottom: 2px solid var(--line);
    }

    .lihat-info-group {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
        flex-wrap: wrap;
    }

    .lihat-info-label {
        font-weight: 600;
        color: var(--text);
        min-width: 180px;
    }

    .lihat-info-value {
        color: var(--text-soft);
        flex: 1;
    }

    .btn-primary-theme {
        background-color: var(--primary) !important;
        border-color: var(--primary) !important;
        color: white;
    }

    .btn-primary-theme:hover {
        background-color: var(--primary-dark) !important;
        border-color: var(--primary-dark) !important;
    }

    .card-header-theme {
        background-color: var(--primary) !important;
        color: white;
        font-weight: 600;
    }

    .card-header-theme p,
    .card-header-theme a {
        color: white;
        margin: 0;
        cursor: pointer;
        padding: 0.5rem 0.75rem;
        transition: opacity 0.2s;
    }

    .card-header-theme p:hover,
    .card-header-theme a:hover {
        opacity: 0.8;
    }

    .menu-toggle {
        display: none;
        background: none;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0.5rem;
    }

    .menu-container {
        display: flex;
        gap: 0;
        align-items: center;
        flex-wrap: wrap;
    }

    #men {
        display: none;
    }

    .nav-section {
        border-bottom: 1px solid var(--line);
        padding: 0.75rem 0;
        margin: 0.5rem 0;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--text-soft);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    @media (max-width: 1024px) {
        .menu-toggle {
            display: block;
        }

        #men {
            display: block;
        }

        .menu-container {
            position: absolute;
            top: 60px;
            right: 0;
            flex-direction: column;
            background-color: var(--primary);
            min-width: 250px;
            border-radius: 0 0 0 10px;
            padding: 1rem 0;
            z-index: 1000;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .menu-container.active {
            max-height: 500px;
        }

        .menu-container p,
        .menu-container .dropdown {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            text-align: left;
            border: none;
            background: none;
        }

        .card-header {
            position: relative;
        }

        .card-body {
            width: 100% !important;
            position: relative !important;
            top: 0 !important;
            left: 0 !important;
        }

        .d-flex {
            flex-direction: column;
        }

        .card {
            width: 100% !important;
        }
    }

    hr.theme-divider {
        height: 3px;
        background-color: var(--primary);
        border: none;
        margin: 1rem 0;
    }

    .link-underline {
        text-decoration: none;
    }

    .link-underline:hover {
        text-decoration: underline;
    }
</style>

<div class="lihat-container">
    <div class="lihat-header">
        <div class="lihat-info-group">
            <p class="lihat-info-label">Nomer Rekam Medis:</p>
            <p class="lihat-info-value"><?= $reke['nomor_rekam_medis'] ?></p>
        </div>
        <div class="lihat-info-group">
            <p class="lihat-info-label">Nama:</p>
            <p class="lihat-info-value"><?= $reke['nama_penderita'] ?></p>
        </div>

        <button type="submit" class="btn btn-primary-theme" style="min-width:100px;">
            <a class="link-underline text-white" href="/resume/<?= $reke['nomor_rekam_medis'] ?>" style="color: white !important; text-decoration: none;">Resume</a>
        </button>
    </div>

    <div style="padding: 0;">
        <div class="card" style="border: none; border-radius: 0;">
            <div class="card-header card-header-theme d-flex justify-content-between align-items-center" style="position: relative;">
                <button class="menu-toggle" id="menuToggle">
                    <i class="bi bi-list"></i>
                </button>
                <div class="menu-container" id="menuContainer">
                    <div id="men" class="nav-section">Menu Rekam Medis</div>
                    <p onclick="showDiv(9)" style="cursor: pointer;">general consent</p>
                    <div class="dropdown">
                        <a class="btn text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; padding: 0.75rem 1rem;">
                            register
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">
                                    <h5 class="text-black" onclick="showDiv(10)">register kunjungan</h5>
                                </a></li>
                            <li><a class="dropdown-item" href="#">
                                    <h5 class="text-black" onclick="showDiv(3)">register bayi</h5>
                                </a></li>
                            <li><a class="dropdown-item" href="#">
                                    <h5 class="text-black" onclick="showDiv(4)">register balita</h5>
                                </a></li>
                            <li><a class="dropdown-item" href="#">
                                    <h5 class="text-black" onclick="showDiv(7)">register persalinan</h5>
                                </a></li>
                        </ul>
                    </div>
                    <p onclick="showDiv(5)" style="cursor: pointer;">kartu ibu</p>
                    <p onclick="showDiv(6)" style="cursor: pointer;">informed consent</p>
                    <p onclick="showDiv(8)" style="cursor: pointer;">pelayanan kb</p>
                </div>
            </div>
            <div class="card-body" style="display: none;" id="div10">
                <?php foreach ($re as $rb): ?>
                    <div class="card mt-3" style="width: 67rem;">
                        <div class="card-body">
                            <div class="d-flex">
                                <p>Nama : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['nama_penderita'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>Tanggal Lahir : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['tanggal_lahir'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>Agama : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['agama'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>Alamat : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['alamat'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>kelurahan : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['kelurahan'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>diagnosa : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['diagnosa'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>terapi/obat : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['therapy_or_obat'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>Tanggal Masuk : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['tanggal_masuk'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>jenis kunjungan : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['jenis_kunjungan'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>jasa : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['jasa'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>keterangan : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['keterangan'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>Petugas Yang Bertanggung Jawab : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['petugas_bertanggung_jawab'] ?></p>
                            </div>
                            <div class="d-flex">
                                <p>ICD : </p>
                                <p class="card-text" style="margin-left: 5px;"> <?= $rb['icd'] ?></p>
                            </div>
                            <div class="col-auto">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary-theme">
                                        <a class="link-underline link-underline-opacity-0 text-white" href="/ekunjungan/<?= $rb['id_register_kunjungan'] ?>">Edit</a>
                                    </button>
                                    <?php if (!in_array($role, ['staff', 'bidan'])) : ?>
                                        <form action="/delete_kun/<?= $rb['id_register_kunjungan']; ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-primary-theme" onclick="return confirm('apakah anda yakin menghapus data ini?');">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="card-body" style="display: none;" id="div9">
                <?php foreach ($gen as $general): ?>
                    <div class="card mt-3" style="width: 67rem;">
                        <div class="card-body">
                            <div class="d-flex">
                                <p>Tanggal Lahir :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $general['tanggal_lahir'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Nama Pasien :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $general['nama_pasien'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>No.Hp Pasien :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $general['no_hp_pasien'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Nama Wali :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $general['nama_wali'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Tanggal Lahir Wali :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $general['tanggal_lahir_wali'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Alamat Wali :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $general['alamat_wali'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Hubungan Dengan Pasien :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $general['hubungan_dengan_pasien'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>No.HP Wali :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $general['no_hp_wali'] ?> </p>
                            </div>
                            <div class="d-flex gap-3 mt-3">
                                <div class="d-flex">
                                    <p>Penanggung Jawab :</p>
                                    <img style="margin-left: 5px;" src="<?= base_url('gambar-general-consent/' . $general['nomor_rekam_medis_gc'] . '/penanggung_jawab') ?>" alt="Gambar General Consent" width="200" height="200">
                                </div>
                                <div class="d-flex ">
                                    <p>Saksi :</p>
                                    <img style="margin-left: 5px;" src="<?= base_url('gambar-general-consent/' . $general['nomor_rekam_medis_gc'] . '/saksi') ?>" alt="Gambar General Consent" width="200" height="200">
                                </div>
                                <div class="d-flex ">
                                    <p>Petugas :</p>
                                    <img style="margin-left: 5px;" src="<?= base_url('gambar-general-consent/' . $general['nomor_rekam_medis_gc'] . '/petugas') ?>" alt="Gambar General Consent" width="200" height="200">
                                </div>
                            </div>
                            <div class="col-auto d-flex gap-2 mt-3 justify-content-end">
                                <button type="submit" class="btn btn-primary-theme">
                                    <a class="link-underline link-underline-opacity-0 text-white" href="/egeneral/<?= $general['id_general_consent'] ?>">Edit</a>
                                </button>
                                <?php if (!in_array($role, ['staff', 'bidan'])) : ?>
                                    <form action="/delete_gen/<?= $general['id_general_consent']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-primary-theme" onclick="return confirm('apakah anda yakin menghapus data ini?');">Delete</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="card-body" style="display: none;" id="div3">
                <?php foreach ($bay as $bayi): ?>
                    <div class="card mt-3" style="">
                        <div class="card-body">
                            <div class="d-flex ">
                                <p>Nama Bayi :</p>
                                <p class="card-text"><?= $bayi['nama_bayi'] ?> </p>
                            </div>
                            <div class="d-flex ">
                                <p>Jenis Kelamin :</p>
                                <p class="card-text"><?= $bayi['jenis_kelamin'] ?> </p>
                            </div>
                            <div class="d-flex ">
                                <p>Tanggal Lahir :</p>
                                <p class="card-text"><?= $bayi['tanggal_lahir'] ?> </p>
                            </div>
                            <div class="d-flex ">
                                <p>Nama Ibu :</p>
                                <p class="card-text"><?= $bayi['nama_ibu'] ?> </p>
                            </div>
                            <div class="d-flex ">
                                <p>Alamat Lengkap :</p>
                                <p class="card-text"><?= $bayi['alamat_lengkap'] ?> </p>
                            </div>
                            <div class="d-flex ">
                                <p>No.Telepon :</p>
                                <p class="card-text"><?= $bayi['no_telepon'] ?> </p>
                            </div>
                            <div class="d-flex ">
                                <p>Berat Badan :</p>
                                <p class="card-text"><?= $bayi['berat_badan'] ?> </p>
                            </div>
                            <div class="d-flex ">
                                <p>Panjang Lahir :</p>
                                <p class="card-text"><?= $bayi['panjang_lahir'] ?> </p>
                            </div>
                            <div class="d-flex ">
                                <p>Memiliki Buku KIA :</p>
                                <p class="card-text"><?= $bayi['memiliki_buku_kia'] ?> </p>
                            </div>
                            <div class="d-flex ">
                                <p>Catatan Neonatal :</p>
                                <p class="card-text"><?= $bayi['catatan_neonatal'] ?> </p>
                            </div>
                            <div class="col-auto d-flex gap-2">
                                <button type="submit" class="btn btn-primary-theme">
                                    <a class="link-underline link-underline-opacity-0 text-white" href="/ebayi/<?= $bayi['id_register_bayi'] ?>">Edit</a>
                                </button>
                                <?php if (!in_array($role, ['staff', 'bidan'])) : ?>
                                    <form action="/delete_bay/<?= $bayi['id_register_bayi']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-primary-theme" onclick="return confirm('apakah anda yakin menghapus data ini?');">Delete</button>
                                    </form>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="card-body" style="display: none;" id="div4">
                <?php foreach ($bal as $balita): ?>
                    <div class="card mt-3" style="width: 67rem;">
                        <div class="card-body">
                            <div class="d-flex">
                                <p>Nama Balita :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $balita['nama'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Alamat :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $balita['alamat'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Jenis Kelamin :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $balita['jenis_kelamin'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Tanggal Lahir :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $balita['tanggal_lahir'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Nama Ibu :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $balita['nama_ibu'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>No.Telepon :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $balita['no_telepon'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Berat Badan :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $balita['berat_badan'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Tinggi Badan :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $balita['tinggi_badan'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Anak Ke :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $balita['anak_ke'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Catatan Imunisasi :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $balita['catatan_imunisasi'] ?> </p>
                            </div>

                            <div class="col-auto d-flex gap-2">
                                <button type="submit" class="btn btn-primary-theme">
                                    <a class="link-underline link-underline-opacity-0 text-white" href="/ebalita/<?= $balita['id_register_balita'] ?>">Edit</a>
                                </button>
                                <?php if (!in_array($role, ['staff', 'bidan'])) : ?>
                                    <form action="/delete_bal/<?= $balita['id_register_balita']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-primary-theme" onclick="return confirm('apakah anda yakin menghapus data ini?');">Delete</button>
                                    </form>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="card-body" style="display: none;" id="div5">

                <div class="card mt-3" style="width: 67rem;">
                    <div class="card-body">
                        <?php foreach ($kar as $kartu_ibu): ?>
                            <div>
                                <h3>Kartu Ibu Identitas</h3>
                                <hr class="" style="height: 5px; background-color: var(--primary); border: none;">
                                <div class="d-flex">
                                    <p>Nama Lengkap Ibu :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->nama_lengkap_ibu ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Nama Suami :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->nama_suami ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Tanggal Lahir :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->tanggal_lahir ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Jenis Kelamin :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->jenis_kelamin ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Agama :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->agama ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Suku :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->suku ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Bahasa :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->bahasa ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Alamat :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->alamat ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>RT RW :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->rt_or_rw ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Desa/Kelurahan :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->desa_or_kelurahan ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Kecamatan :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->kecamatan ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Kota/Kabupaten :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->kota_or_kabupaten ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Kode_Pos :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->kode_pos ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Provinsi :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->provinsi ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Negara :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->negara ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Pendidikan :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->pendidikan ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Pekerjaan :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->pekerjaan ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Status Pernikahan :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->status_pernikahan ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Pembayaran :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->pembayaran ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Posyandu :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->posyandu ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Nama Kader :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->nama_kader ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Disabilitas :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->disabilitas ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>Tanggal Registrasi :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->tanggal_registrasi ?> </p>
                                </div>
                                <div class="d-flex">
                                    <p>No Telepon :</p>
                                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->no_telp ?> </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="d-flex">

                            <?php foreach ($karp as $kartu_ibup): ?>
                                <div>
                                    <h3>Kartu Ibu Pemeriksaan</h3>
                                    <hr class="" style="height: 5px; background-color: var(--primary); border: none;">
                                    <div class="d-flex">
                                        <p>Tanggal Periksa :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['tanggal_periksa'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Tanggal HPHT :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['tanggal_hpht'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Taksiran Persalinan :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['taksiran_persalinan'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Tanggal Persalinan Sebelumnya :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['tanggal_persalinan_sebelumnya'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Berat Badan sebelum hamil :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['bb_sebelum_hamil'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Berat Badan saat ini :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['bb_saat_ini'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Pendidikan Ibu :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['pendidikan_ibu'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Pekerjaan Ibu :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['pekerjaan_ibu'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Tinggi Badan:</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['tinggi_badan'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>LILA :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['lila'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Golongan Darah :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['gol_darah'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Riwayat KB :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['riwayat_kb'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Buku KIA :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['buku_kia'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Riwayat Persalinan :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['riwayat_persalinan'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Status Gizi :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['status_gizi'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Riwayat Komplikasi :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['riwayat_komplikasi'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Riwayat Penyakit :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibup['riwayat_penyakit'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="d-flex">
                            <?php foreach ($karr as $kartu_ibur): ?>
                                <div>
                                    <h3>Kartu Ibu Riwayat</h3>
                                    <hr class="" style="height: 5px; background-color: var(--primary); border: none;">
                                    <div class="d-flex">
                                        <p>Gravida :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibur['gravida'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Partus :</p>
                                        <p class="card-text" style="margin-left: 5px;"> <?= $kartu_ibur['partus'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Abortus :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibur['abortus'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Hidup :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibur['hidup'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Catatan Khusus :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibur['catatan_khusus'] ?> </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php foreach ($kar as $kartu_ibu): ?>
                            <div class="col-auto d-flex gap-2">
                                <button type="submit" class="btn btn-primary-theme">
                                    <a class="link-underline link-underline-opacity-0 text-white" href="/ekartu/<?= $kartu_ibu->id_kartu_ibu ?>">Edit</a>
                                </button>
                                <?php if (!in_array($role, ['staff', 'bidan'])) : ?>
                                    <form action="/delete_kar/<?= $kartu_ibu->id_kartu_ibu ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-primary-theme" onclick="return confirm('apakah anda yakin menghapus data ini?');">Delete</button>
                                    </form>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <div class="card-body" style="display: none;" id="div6">
                <?php foreach ($inf as $inform): ?>
                    <div class="card mt-3" style="width: 67rem;">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <div class="d-flex">
                                        <p>Nama Penanggung Jawab :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['nama_penanggung_jawab'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Jenis Kelamin :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['jenis_kelamin'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Tanggal Lahir :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['tanggal_lahir'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Nomor Telepon :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['no_telepon'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Hubungan Dengan Pasien :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['hubungan_dengan_pasien'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Diagnosa :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['diagnosa'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Tindakan Medis :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['tindakan_medis'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Tujuan :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['tujuan'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Resiko Tindakan :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['resiko_tindakan'] ?> </p>
                                    </div>
                                </div>
                                <div style="margin-left: 220px;">
                                    <div class="d-flex">
                                        <p>Prognosis :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['prognosis'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Nama Petugas :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['nama_petugas'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Tanggal Pelaksaan :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['tanggal_pelaksanaan'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Waktu Mulai Tindakan :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['waktu_mulai_tindakan'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Waktu Selesai Tindakan :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['waktu_selesai_tindakan'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Alat Medis :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['alat_medis'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>BMHP :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['bmhp'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Keterangan :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['keterangan'] ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p>ICD :</p>
                                        <p class="card-text" style="margin-left: 5px;"><?= $inform['icd'] ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-3 mt-3">
                                <div class="d-flex">
                                    <p>Penanggung Jawab :</p>
                                    <img style="margin-left: 5px;" src="<?= base_url('gambar-informed-consent/' . $inform['nomor_rekam_medis'] . '/penanggung_jawab') ?>" alt="Gambar General Consent" width="200" height="200">
                                </div>
                                <div class="d-flex ">
                                    <p>Saksi :</p>
                                    <img style="margin-left: 20px;" src="<?= base_url('gambar-informed-consent/' . $inform['nomor_rekam_medis'] . '/saksi') ?>" alt="Gambar General Consent" width="200" height="200">
                                </div>
                                <div class="d-flex ">
                                    <p>Petugas :</p>
                                    <img style="margin-left: 10px;" src="<?= base_url('gambar-informed-consent/' . $inform['nomor_rekam_medis'] . '/petugas') ?>" alt="Gambar General Consent" width="200" height="200">
                                </div>
                            </div>

                            <div class="col-auto d-flex gap-2 mt-3 justify-content-end">
                                <button type="submit" class="btn btn-primary-theme">
                                    <a class="link-underline link-underline-opacity-0 text-white" href="/einformed/<?= $inform['id_informed_consent_p'] ?>">Edit</a>
                                </button>
                                <?php if (!in_array($role, ['staff', 'bidan'])) : ?>
                                    <form action="/delete_inf/<?= $inform['id_informed_consent_p']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-primary-theme" onclick="return confirm('apakah anda yakin menghapus data ini?');">Delete</button>
                                    </form>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="card-body" style="display: none;" id="div7">
                <?php foreach ($per as $persalinan): ?>
                    <div class="card mt-3" style="width: 67rem;">
                        <div class="card-body">
                            <div class="d-flex">
                                <p>Nama :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $persalinan['nama'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Jenis Kelamin :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $persalinan['jenis_kelamin'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Tanggal Lahir :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $persalinan['tanggal_lahir'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Alamat Lengkap :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $persalinan['alamat_lengkap'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>No.Telepon :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $persalinan['no_telepon'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Penolong :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $persalinan['penolong'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Tempat :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $persalinan['tempat'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Pendamping :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $persalinan['pendamping'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Transportasi :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $persalinan['transportasi'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Pendonor Darah :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $persalinan['pendonor_darah'] ?> </p>
                            </div>
                            <div class="col-auto d-flex gap-2">
                                <button type="submit" class="btn btn-primary-theme">
                                    <a class="link-underline link-underline-opacity-0 text-white" href="/epersalinan/<?= $persalinan['id_register_persalinan'] ?>">Edit</a>
                                </button>
                                <?php if (!in_array($role, ['staff', 'bidan'])) : ?>
                                    <form action="/delete_per/<?= $persalinan['id_register_persalinan']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-primary-theme" onclick="return confirm('apakah anda yakin menghapus data ini?');">Delete</button>
                                    </form>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="card-body" style="display: none;" id="div8">
                <?php foreach ($pel as $kb): ?>
                    <div class="card mt-3" style="width: 67rem;">
                        <div class="card-body">
                            <div class="d-flex">
                                <p>Nama :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['nama'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Jenis Kelamin :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['jenis_kelamin'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Tanggal Lahir :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['tanggal_lahir'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Nama Ibu :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['nama_ibu'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Alamat Lengkap :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['alamat_lengkap'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Jenis Pasien :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['jenis_pasien'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Nama Suami :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['nama_suami'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Jumlah Anak :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['jumlah_anak'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Gakin :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['gakin'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>4T :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['4t'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Metode :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['metode'] ?> </p>
                            </div>
                            <div class="d-flex">
                                <p>Catatan Alki :</p>
                                <p class="card-text" style="margin-left: 5px;"><?= $kb['catatan_alki'] ?> </p>
                            </div>
                            <div class="col-auto d-flex gap-2">
                                <button type="submit" class="btn btn-primary-theme">
                                    <a class="link-underline link-underline-opacity-0 text-white" href="/epelayanan/<?= $kb['id_register_pelayanan_kb'] ?>">Edit</a>
                                </button>
                                <?php if (!in_array($role, ['staff', 'bidan'])) : ?>
                                    <form action="/delete_kb/<?= $kb['id_register_pelayanan_kb']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-primary-theme" onclick="return confirm('apakah anda yakin menghapus data ini?');">Delete</button>
                                    </form>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>




<script>
    // Toggle Menu Mobile
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menuToggle');
        const menuContainer = document.getElementById('menuContainer');

        if (menuToggle) {
            menuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                menuContainer.classList.toggle('active');
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!menuContainer.contains(e.target) && !menuToggle.contains(e.target)) {
                    menuContainer.classList.remove('active');
                }
            });

            // Close menu when menu item is clicked
            const menuItems = menuContainer.querySelectorAll('p[onclick]');
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    menuContainer.classList.remove('active');
                });
            });
        }
    });

    function showDiv(divNumber) {
        var div9 = document.getElementById("div9");
        var div10 = document.getElementById("div10");
        var div3 = document.getElementById("div3");
        var div4 = document.getElementById("div4");
        var div5 = document.getElementById("div5");
        var div6 = document.getElementById("div6");
        var div7 = document.getElementById("div7");
        var div8 = document.getElementById("div8");


        if (divNumber === 9) {
            div9.style.display = "block";
            div10.style.display = "none";
            div3.style.display = "none";
            div4.style.display = "none";
            div5.style.display = "none";
            div6.style.display = "none";
            div7.style.display = "none";
            div8.style.display = "none";
        } else if (divNumber === 10) {
            div9.style.display = "none";
            div10.style.display = "block";
            div3.style.display = "none";
            div4.style.display = "none";
            div5.style.display = "none";
            div6.style.display = "none";
            div7.style.display = "none";
            div8.style.display = "none";
        } else if (divNumber === 3) {
            div9.style.display = "none";
            div10.style.display = "none";
            div3.style.display = "block";
            div4.style.display = "none";
            div5.style.display = "none";
            div6.style.display = "none";
            div7.style.display = "none";
            div8.style.display = "none";
        } else if (divNumber === 4) {
            div9.style.display = "none";
            div10.style.display = "none";
            div3.style.display = "none";
            div4.style.display = "block";
            div5.style.display = "none";
            div6.style.display = "none";
            div7.style.display = "none";
            div8.style.display = "none";
        } else if (divNumber === 5) {
            div9.style.display = "none";
            div10.style.display = "none";
            div3.style.display = "none";
            div4.style.display = "none";
            div5.style.display = "block";
            div6.style.display = "none";
            div7.style.display = "none";
            div8.style.display = "none";
        } else if (divNumber === 6) {
            div9.style.display = "none";
            div10.style.display = "none";
            div3.style.display = "none";
            div4.style.display = "none";
            div5.style.display = "none";
            div6.style.display = "block";
            div7.style.display = "none";
            div8.style.display = "none";
        } else if (divNumber === 7) {
            div9.style.display = "none";
            div10.style.display = "none";
            div3.style.display = "none";
            div4.style.display = "none";
            div5.style.display = "none";
            div6.style.display = "none";
            div7.style.display = "block";
            div8.style.display = "none";
        } else if (divNumber === 8) {
            div9.style.display = "none";
            div10.style.display = "none";
            div3.style.display = "none";
            div4.style.display = "none";
            div5.style.display = "none";
            div6.style.display = "none";
            div7.style.display = "none";
            div8.style.display = "block";
        }
    }
</script>

<?= $this->endSection(); ?>