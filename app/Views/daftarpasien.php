<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Manajemen data</p>
            <h1 class="page-title">Daftar Pasien</h1>
            <p class="page-subtitle">Kelola informasi lengkap seluruh pasien agar rekam medis tetap terorganisir dengan baik.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-list-check"></i>
            Pendaftaran
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <!-- Form Pencarian -->
        <div class="search-section mb-4">
            <form action="/daftar" method="post" class="search-form">
                <?= csrf_field(); ?>
                <div class="input-group">
                    <input
                        type="text"
                        name="keyword"
                        class="form-control search-input"
                        placeholder="Cari berdasarkan Nomor Rekam Medis, NIK, atau Nama Pasien..."
                        value="<?= isset($keyword) ? $keyword : '' ?>">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search me-2"></i>Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Daftar Pasien -->
        <div class="table-responsive">
            <table class="table modern-table">
                <thead>
                    <tr>
                        <th>No. Rekam Medis</th>
                        <th>NIK</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($rek)): ?>
                        <?php foreach ($rek as $item): ?>
                            <tr>
                                <td>
                                    <strong><?= isset($item['nomor_rekam_medis']) ? $item['nomor_rekam_medis'] : '-' ?></strong>
                                </td>
                                <td><?= isset($item['nik']) ? $item['nik'] : '-' ?></td>
                                <td><?= isset($item['nama_pasien']) ? $item['nama_pasien'] : '-' ?></td>
                                <td><?= isset($item['tanggal_lahir']) ? date('d/m/Y', strtotime($item['tanggal_lahir'])) : '-' ?></td>
                                <td><?= isset($item['jenis_kelamin']) ? ucfirst($item['jenis_kelamin']) : '-' ?></td>
                                <td><?= isset($item['no_telepon']) ? $item['no_telepon'] : '-' ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="/lihat/<?= isset($item['nomor_rekam_medis']) ? $item['nomor_rekam_medis'] : '' ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i>Lihat
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox" style="font-size: 2rem; opacity: 0.5;"></i>
                                    <p class="mt-2">Tidak ada data pasien ditemukan</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>