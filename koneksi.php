<?php
$host = 'localhost';
$dbname = 'id21024672_akademik';
$username = 'id21024672_root';
$password = 'Pwls6b^^';

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// echo "Koneksi ke database berhasil!";
?>
