<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Cursive:wght@400..700&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        #outputTeks {
            margin-top: 20px;
            white-space: pre-wrap;
        }

        #outputTeks div {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <div class="text-center" style="border:1px solid black; width:600px; height:200px;">
            <h3>Praktik Mandiri Bidan
                <br>"BUNDA"
                <br>Ely Sundusiyah, S.Keb
            </h3>
            <h4 class="mt-5">
                Resume Medis
            </h4>
        </div>
        <div style=" border:1px solid black; width:600px; height:200px;">
            <div class="d-flex">
                <p>Nama :</p>
                <p><?= $reke['nama_penderita'] ?></p>
            </div>
            <div class="d-flex">
                <p>Tanggal Lahir :</p>
                <p><?= $reke['tanggal_lahir'] ?></p>
            </div>
            <div class="d-flex">
                <p>Nomor Rekam Medis :</p>
                <p><?= $reke['nomor_rekam_medis'] ?></p>
            </div>
            <div class="d-flex">
                <p>Alamat :</p>
                <p><?= $reke['alamat'] ?></p>
            </div>
        </div>
    </div>
    <div class="d-flex" style="border:1px solid black; width: 780px; height:150px;">
        <div style="margin-left: 100px;" class="mt-4">
            <div class="d-flex">
                <p>Agama:</p>
                <p><?= $reke['agama'] ?></p>
            </div>
            <?php foreach ($kar as $kartu_ibu): ?>
                <div class="d-flex">
                    <p>Pekerjaan :</p>
                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->pekerjaan ?> </p>
                </div>
                <div class="d-flex">
                    <p>Pembayaran :</p>
                    <p class="card-text" style="margin-left: 5px;"><?= $kartu_ibu->pembayaran ?> </p>
                </div>
            <?php endforeach; ?>
        </div>
        <div style="margin-left: 300px;">
            <div class="d-flex">
                <p>Tanggal masuk:</p>
                <p><?= $reke['tanggal_masuk'] ?></p>
            </div>
            <div class="d-flex">
                <p>Petugas Penanggung Jawab:</p>
                <p><?= $reke['petugas_bertanggung_jawab'] ?></p>
            </div>
        </div>
    </div>
    <div style="border:1px solid black;">
        <!-- Bagian hasil cetak -->
        <div id="outputTeks"></div>

        <!-- Form isian -->
        <div class="no-print">
            <form onsubmit="return handlePrint(event)">
                <div style="margin-bottom: 10px;">
                    <label for="keluhan">Keluhan:</label><br>
                    <textarea id="keluhan" rows="4" cols="50"></textarea>
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="hasil">Hasil Pemeriksaan:</label><br>
                    <textarea id="hasil" rows="4" cols="50"></textarea>
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="diagnosa">Diagnosa:</label><br>
                    <textarea id="diagnosa" rows="4" cols="50"></textarea>
                </div>
                <button type="submit">Print</button>
            </form>
        </div>
        <div class="mt-5">
            <?php foreach ($inf as $inform): ?>
                <div class="d-flex">
                    <p>Tindakan Medis :</p>
                    <p class="card-text" style="margin-left: 5px;"><?= $inform['tindakan_medis'] ?> </p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="d-flex justify-content-between mt-5">
            <div style="width: 300px;">
                <p class="text-center">diterima</p>
                <p class="text-center" style="margin-top: 100px;">(....................................................)</p>
                <p class="text-center">pasien</p>
            </div>
            <div style="width: 300px;">
                <p class="text-center">bidan</p>
                <p class="text-center" style="margin-top: 100px;">(....................................................)</p>
                <p class="text-center">Ely Sundusiyah, S.Keb</p>
            </div>
        </div>
    </div>


    <script>
        function handlePrint(event) {
            event.preventDefault();

            // Ambil semua nilai textarea
            var keluhan = document.getElementById('keluhan').value;
            var hasil = document.getElementById('hasil').value;
            var diagnosa = document.getElementById('diagnosa').value;

            // Gabungkan ke dalam output dengan label
            var output = `
                <div><strong>Saran Dokter:</strong><br>${keluhan}</div>
                <div><strong>Hasil Pemeriksaan:</strong><br><p style="margin-top:10px;">${hasil}</p></div>
                <div><strong>Catatan Tambahan:</strong><br>${diagnosa}</div>
            `;

            document.getElementById('outputTeks').innerHTML = output;

            window.print();
            return false;
        }
    </script>
</body>

</html>