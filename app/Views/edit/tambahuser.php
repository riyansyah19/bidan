<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Edit user</p>
            <h1 class="page-title">User</h1>
            <p class="page-subtitle">Edit user agar data menjadi benar</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-person-plus-fill"></i>
            User
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="modern-form-panel">
        <form action="<?= site_url('pedituser/' . $user['id_user']) ?>" method="post" class="modern-form">
            <?= csrf_field(); ?>
            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label" for="username">Username</label>
                    <input class="field-input" type="text" id="username" name="username" value="<?= $user['username'] ?>">
                </div>
                <div class="field-group">
                    <label class="field-label" for="password">Password</label>
                    <input class="field-input" type="password" id="password" name="password">
                </div>
                <div class="field-group">
                    <label class="field-label" for="c_password">Confirm Password</label>
                    <input class="field-input" type="password" id="c_password" name="c_password">
                </div>
                <div class="field-group">
                    <label class="field-label" for="role">Role</label>
                    <select class="field-input" name="role" id="role">
                        <option value="" selected></option>
                        <option value="admin">Admin</option>
                        <option value="staf admisi">Staff Administrasi</option>
                        <option value="bidan">Bidan</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg">
                    Edit
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(''); ?>