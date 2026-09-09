<!DOCTYPE html>
<html>

<head>
    <title>Import SQL</title>
</head>

<body>
    <h2>Import File SQL</h2>

    <?php if (session()->getFlashdata('message')): ?>
        <p><?= session()->getFlashdata('message') ?></p>
    <?php endif; ?>

    <form action="<?= base_url('import-sql') ?>" method="post" enctype="multipart/form-data">
        <label>Nama Database:</label><br>
        <input type="text" name="nama_database" required><br><br>

        <label>File SQL:</label><br>
        <input type="file" name="sqlfile" accept=".sql" required><br><br>

        <button type="submit">Buat DB & Import</button>
    </form>

</body>

</html>