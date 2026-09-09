<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Bidan</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>

<body class="app-body">
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

    <div class="app-shell">
        <aside class="app-sidebar">
            <div class="brand-panel">
                <div class="brand-mark">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                <div class="brand-text">
                    <strong>Praktik Mandiri</strong>
                    <small>Bidan Bunda</small>
                </div>
            </div>

            <nav class="sidebar-nav" aria-label="Sidebar navigation">
                <div class="nav-section">Menu</div>
                <a class="nav-link" href="/dashboard">
                    <span class="nav-icon"><i class="bi bi-grid-1x2-fill"></i></span>
                    <span class="nav-label">Dashboard</span>
                    <span class="nav-chevron"><i class="bi bi-chevron-right"></i></span>
                </a>
                <a class="nav-link" href="/daftar">
                    <span class="nav-icon"><i class="bi bi-clipboard2-pulse"></i></span>
                    <span class="nav-label">Daftar</span>
                    <span class="nav-chevron"><i class="bi bi-chevron-right"></i></span>
                </a>
                <a class="nav-link" href="/pasien">
                    <span class="nav-icon"><i class="bi bi-people-fill"></i></span>
                    <span class="nav-label">Pasien</span>
                    <span class="nav-chevron"><i class="bi bi-chevron-right"></i></span>
                </a>
                <a class="nav-link" href="/Kartu">
                    <span class="nav-icon"><i class="bi bi-file-earmark-medical-fill"></i></span>
                    <span class="nav-label">Kartu Ibu</span>
                    <span class="nav-chevron"><i class="bi bi-chevron-right"></i></span>
                </a>
                <a class="nav-link" href="/informed">
                    <span class="nav-icon"><i class="bi bi-file-text-fill"></i></span>
                    <span class="nav-label">Informed Consent</span>
                    <span class="nav-chevron"><i class="bi bi-chevron-right"></i></span>
                </a>
                <a class="nav-link" href="#" aria-expanded="false">
                    <span class="nav-icon"><i class="bi bi-journal-medical"></i></span>
                    <span class="nav-label">Register</span>
                    <span class="nav-chevron"><i class="bi bi-chevron-down"></i></span>
                </a>
                <div class="nav-submenu">
                    <a class="dropdown-item" href="/kunjungan">Register Kunjungan</a>
                    <a class="dropdown-item" href="/persalinan">Register Persalinan</a>
                    <a class="dropdown-item" href="/bayi">Register Bayi</a>
                    <a class="dropdown-item" href="/balita">Register Balita</a>
                </div>
                <a class="nav-link" href="/general">
                    <span class="nav-icon"><i class="bi bi-shield-plus"></i></span>
                    <span class="nav-label">General Consent</span>
                    <span class="nav-chevron"><i class="bi bi-chevron-right"></i></span>
                </a>
                <a class="nav-link" href="/KB">
                    <span class="nav-icon"><i class="bi bi-heart-fill"></i></span>
                    <span class="nav-label">Layanan KB</span>
                    <span class="nav-chevron"><i class="bi bi-chevron-right"></i></span>
                </a>
                <a class="nav-link" href="/manaj">
                    <span class="nav-icon"><i class="bi bi-person-gear"></i></span>
                    <span class="nav-label">Manajemen Akses</span>
                    <span class="nav-chevron"><i class="bi bi-chevron-right"></i></span>
                </a>

            </nav>
        </aside>

        <main class="app-main">
            <header class="topbar">
                <div class="topbar-title">
                    <div class="brand-mark" style="width:42px;height:42px;border-radius:14px;">
                        <img src="<?= base_url('image/del.png') ?>">
                    </div>
                    <div>
                        <strong>SI Bidan</strong>
                        <small>Sistem Informasi Bidan Mandiri</small>
                    </div>
                </div>
                <div class="topbar-actions">
                    <span class="status-pill">Aktif</span>
                    <span class="user-pill"><i class="bi bi-person-fill"></i> Admin</span>
                </div>
            </header>

            <?= $this->renderSection('content'); ?>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>