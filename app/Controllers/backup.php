<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class backup extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        $host     = $db->hostname;
        $username = $db->username;
        $password = $db->password;
        $database = $db->database;

        // Folder tujuan di luar project
        $backupFolder = 'C:\cihuyyy_back\\';
        $namaFile = 'cihuyy' . date('Ymd_His') . '.sql';
        $pathFile = $backupFolder . $namaFile;

        $mysqldump = 'C:\laragon\bin\mysql\mysql-8.4.3-winx64\bin\mysqldump.exe'; // Lokasi pasti

        // Command dump
        $command = "\"$mysqldump\" --user=$username --password=$password --host=$host $database > \"$pathFile\"";

        system($command); // Jalankan

        return $this->response->download($pathFile, null);
    }

    public function importForm()
    {
        return view('import');
    }

    public function importExecute()
    {
        $file = $this->request->getFile('sqlfile');
        $namaDatabase = $this->request->getPost('nama_database'); // ambil input nama database

        // Validasi file dan nama database
        if ($file && $file->isValid() && $file->getClientExtension() === 'sql' && $namaDatabase) {

            // Simpan file sementara
            $newName = $file->getRandomName();
            $tempPath = WRITEPATH . 'uploads/' . $newName;
            $file->move(WRITEPATH . 'uploads', $newName);

            // Ambil koneksi database utama
            $db = \Config\Database::connect();
            $host     = $db->hostname;
            $username = $db->username;
            $password = $db->password;

            // ✅ Buat database dulu jika belum ada
            $mysqli = new \mysqli($host, $username, $password);
            if ($mysqli->connect_errno) {
                return redirect()->to('import-sql')->with('message', '❌ Gagal koneksi ke MySQL: ' . $mysqli->connect_error);
            }

            $sqlCreate = "CREATE DATABASE IF NOT EXISTS $namaDatabase";
            if (!$mysqli->query($sqlCreate)) {
                return redirect()->to('import-sql')->with('message', '❌ Gagal membuat database: ' . $mysqli->error);
            }

            // Lokasi mysql.exe
            $mysql = 'C:\laragon\bin\mysql\mysql-8.4.3-winx64\bin\mysql.exe';

            // Buat perintah import
            $cmd = "cmd /c \"$mysql\" -u$username";
            if (trim($password) !== '') {
                $cmd .= " -p\"$password\"";
            }

            // ⛔ Hati-hati: pastikan gunakan nama DB yang dibuat
            $cmd .= " $namaDatabase < \"$tempPath\"";

            // Jalankan perintah import
            system($cmd);

            // Hapus file setelah import
            if (file_exists($tempPath)) {
                unlink($tempPath);
            }

            return redirect()->to('import-sql')->with('message', "✅ Database <b>$namaDatabase</b> berhasil dibuat dan file SQL berhasil diimport!");
        }

        return redirect()->to('import-sql')->with('message', '❌ File tidak valid atau nama database kosong.');
    }
}
