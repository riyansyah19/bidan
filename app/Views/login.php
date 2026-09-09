<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | SI Bidan</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>

<body class="auth-body">
  <div id="loadingScreen" class="loading-screen" aria-live="polite" aria-label="Memuat halaman">
    <div class="loading-content">
      <div class="loading-brand">
        <i class="bi bi-heart-pulse-fill"></i>
      </div>
      <h1>SI Bidan</h1>
      <p>Praktik Mandiri Bidan</p>
      <div class="loading-spinner" aria-hidden="true"></div>
    </div>
  </div>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1200;">
      <div id="errorToast" class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            <?= session()->getFlashdata('error'); ?>
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="auth-shell">
    <div class="auth-card reveal">
      <div class="auth-visual">
        <img src="<?= base_url('image/fotobidan1.jpg') ?>" alt="Bidan" class="auth-image">
      </div>
      <div class="auth-panel">
        <div class="auth-header">
          <div class="auth-mark"><i class="bi bi-heart-pulse-fill"></i></div>
          <div>
            <p class="page-kicker">Akses sistem</p>
            <h1>Masuk</h1>
          </div>
        </div>

        <form action="login" method="post" class="auth-form">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username">
          </div>
          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
          </div>
          <button type="submit" class="btn btn-primary w-100 btn-lg">Login</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
  <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>