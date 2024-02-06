<?php
$host = '116.251.217.42'; // Ganti dengan alamat IP atau nama domain VPS Anda
$port = 22; // Port SSH biasanya adalah 22
$username = '.';
$password = '.';

// Buat koneksi SSH
$connection = ssh2_connect($host, $port);

if ($connection) {
    // Lakukan otentikasi dengan nama pengguna dan kata sandi
    if (ssh2_auth_password($connection, $username, $password)) {
        echo "Koneksi SSH berhasil!";
        // Sekarang Anda dapat melakukan operasi SSH lainnya di sini
    } else {
        echo "Gagal melakukan otentikasi SSH.";
    }

    // Tutup koneksi setelah selesai
    ssh2_disconnect($connection);
} else {
    echo "Gagal terhubung ke VPS.";
}
?>
