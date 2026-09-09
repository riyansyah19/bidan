<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Manajemen akses</p>
            <h1 class="page-title">Pengguna Sistem</h1>
            <p class="page-subtitle">Kelola akun pengguna dan peran akses secara terstruktur untuk menjaga keamanan data layanan kesehatan.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-person-gear"></i>
            Users
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
            <div>
                <p class="page-kicker mb-0">Daftar user</p>
            </div>
            <a href="/tambahuser" class="btn btn-primary">
                <i class="bi bi-person-plus-fill me-2"></i>Tambah User
            </a>
        </div>

        <div class="table-responsive">
            <table class="table modern-table">
                <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userss as $user): ?>
                        <tr>
                            <td><?= $user['id_user'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/editus/<?= $user['id_user'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="/delete_us/<?= $user['id_user'] ?>" method="post" onsubmit="return confirm('Hapus user ini?')">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>