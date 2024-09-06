<?php
session_start(); // Memulai session

// Menghapus data session yang terkait dengan pengguna
session_unset(); // Menghapus semua variabel sesi

// Mengarahkan pengguna kembali ke halaman login
header("Location: login.php");
exit(); // Menghentikan script agar tidak ada kode lebih lanjut yang dieksekusi
?>
