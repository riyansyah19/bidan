<?= $this->extend('layout/header.php'); ?>
<?= $this->section('content'); ?>
<div class="content-panel reveal">
    <div class="header-hero">
        <div>
            <p class="page-kicker">Dashboard</p>
            <h1 class="page-title">Selamat Datang</h1>
            <p class="page-subtitle">Pantau aktivitas layanan kesehatan dan data pasien secara ringkas dalam satu tampilan yang terorganisir.</p>
        </div>
        <div class="hero-badge">
            <i class="bi bi-heart-pulse-fill"></i>
            Pelayanan Kesehatan
        </div>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger d-flex align-items-center gap-2 mt-3" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <div><?= session()->getFlashdata('error'); ?></div>
        </div>
    <?php endif; ?>

    <div class="summary-grid">
        <div class="summary-card reveal">
            <div class="summary-icon"><i class="bi bi-calendar2-week-fill"></i></div>
            <p>Kunjungan Hari Ini</p>
            <h3><?= $jumlahHariIni ?></h3>
        </div>
        <div class="summary-card reveal">
            <div class="summary-icon"><i class="bi bi-bar-chart-fill"></i></div>
            <p>Rata-rata Kunjungan</p>
            <h3><?= $rataRataKunjungan ?></h3>
        </div>
        <div class="summary-card reveal">
            <div class="summary-icon"><i class="bi bi-person-plus-fill"></i></div>
            <p>Pasien Baru</p>
            <h3><?= $jumlahPasienBaru ?></h3>
        </div>
        <div class="summary-card reveal">
            <div class="summary-icon"><i class="bi bi-clipboard-check-fill"></i></div>
            <p>STATUS</p>
            <h3>Siap</h3>
        </div>
    </div>

    <div class="dashboard-chart-panel reveal">
        <div class="dashboard-chart-header">
            <div>
                <p class="page-kicker">Grafik kunjungan</p>
                <h2>Rata-rata Kunjungan</h2>
            </div>
            <div class="chart-average-badge">
                <span><?= $rataRataKunjungan ?></span>
                <small>Rata-rata/hari</small>
            </div>
        </div>
        <div class="dashboard-chart-canvas">
            <canvas
                id="kunjunganAverageChart"
                height="320"
                aria-label="Grafik rata-rata kunjungan 7 hari terakhir"
                role="img"></canvas>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <a href="/logout" class="btn btn-outline-secondary w-100"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const canvas = document.getElementById('kunjunganAverageChart');
        if (!canvas) return;

        const labels = <?= json_encode($grafikKunjunganLabels ?? []) ?>;
        const values = <?= json_encode($grafikKunjunganData ?? []) ?>;
        const average = Number(<?= json_encode($rataRataKunjungan ?? 0) ?>);
        const ctx = canvas.getContext('2d');

        function drawRoundedRect(x, y, width, height, radius) {
            if (ctx.roundRect) {
                ctx.roundRect(x, y, width, height, radius);
                return;
            }

            const safeRadius = Math.min(radius, width / 2, height / 2);
            ctx.moveTo(x + safeRadius, y);
            ctx.lineTo(x + width - safeRadius, y);
            ctx.quadraticCurveTo(x + width, y, x + width, y + safeRadius);
            ctx.lineTo(x + width, y + height - safeRadius);
            ctx.quadraticCurveTo(x + width, y + height, x + width - safeRadius, y + height);
            ctx.lineTo(x + safeRadius, y + height);
            ctx.quadraticCurveTo(x, y + height, x, y + height - safeRadius);
            ctx.lineTo(x, y + safeRadius);
            ctx.quadraticCurveTo(x, y, x + safeRadius, y);
        }

        function drawChart() {
            const parent = canvas.parentElement;
            const ratio = window.devicePixelRatio || 1;
            const width = parent.clientWidth;
            const height = 320;
            if (!values.length || width <= 0) return;

            canvas.width = width * ratio;
            canvas.height = height * ratio;
            canvas.style.width = width + 'px';
            canvas.style.height = height + 'px';
            ctx.setTransform(ratio, 0, 0, ratio, 0, 0);
            ctx.clearRect(0, 0, width, height);

            const padding = { top: 26, right: 26, bottom: 52, left: 46 };
            const chartWidth = width - padding.left - padding.right;
            const chartHeight = height - padding.top - padding.bottom;
            const maxValue = Math.max(1, average, ...values);
            const yMax = Math.ceil(maxValue + 1);
            const gap = 16;
            const barWidth = Math.max(18, (chartWidth - gap * (values.length - 1)) / values.length);

            ctx.strokeStyle = 'rgba(20, 54, 50, 0.09)';
            ctx.lineWidth = 1;
            ctx.font = '12px Segoe UI, sans-serif';
            ctx.fillStyle = '#5f7876';

            for (let i = 0; i <= 4; i++) {
                const y = padding.top + (chartHeight / 4) * i;
                const label = Math.round(yMax - (yMax / 4) * i);
                ctx.beginPath();
                ctx.moveTo(padding.left, y);
                ctx.lineTo(width - padding.right, y);
                ctx.stroke();
                ctx.fillText(label, 12, y + 4);
            }

            values.forEach(function(value, index) {
                const x = padding.left + index * (barWidth + gap);
                const barHeight = (value / yMax) * chartHeight;
                const y = padding.top + chartHeight - barHeight;

                const gradient = ctx.createLinearGradient(0, y, 0, padding.top + chartHeight);
                gradient.addColorStop(0, '#1c9a93');
                gradient.addColorStop(1, '#9fe0da');
                ctx.fillStyle = gradient;
                ctx.beginPath();
                drawRoundedRect(x, y, barWidth, barHeight, 10);
                ctx.fill();

                ctx.fillStyle = '#18312f';
                ctx.font = '700 12px Segoe UI, sans-serif';
                ctx.textAlign = 'center';
                ctx.fillText(value, x + barWidth / 2, Math.max(y - 8, 14));

                ctx.fillStyle = '#5f7876';
                ctx.font = '12px Segoe UI, sans-serif';
                ctx.fillText(labels[index], x + barWidth / 2, height - 20);
            });

            const averageY = padding.top + chartHeight - (average / yMax) * chartHeight;
            ctx.strokeStyle = '#e2585b';
            ctx.lineWidth = 2;
            ctx.setLineDash([7, 7]);
            ctx.beginPath();
            ctx.moveTo(padding.left, averageY);
            ctx.lineTo(width - padding.right, averageY);
            ctx.stroke();
            ctx.setLineDash([]);

            ctx.fillStyle = '#e2585b';
            ctx.font = '700 12px Segoe UI, sans-serif';
            ctx.textAlign = 'right';
            ctx.fillText('Rata-rata ' + average, width - padding.right, averageY - 8);
        }

        drawChart();
        window.addEventListener('resize', drawChart);
    });
</script>
<?= $this->endSection(''); ?>
