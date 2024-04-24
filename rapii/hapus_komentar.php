<?php
session_start();

// Include koneksi.php untuk menghubungkan ke database
include 'koneksi.php';

// Pastikan user sudah login sebelum melanjutkan proses penghapusan komentar
if(!isset($_SESSION['userid'])) {
    header("location:login.php");
    exit;
}

// Pastikan parameter komentarid terdefinisi
if(isset($_GET['komentarid'])) {
    // Tangkap nilai komentarid dari parameter URL
    $komentarid = $_GET['komentarid'];

    // Query untuk memeriksa apakah komentar yang akan dihapus milik user yang sedang login
    $userid = $_SESSION['userid'];
    $query = "SELECT * FROM komentarfoto WHERE komentarid='$komentarid' AND userid='$userid'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        // Jika komentar ditemukan dan milik user yang sedang login, hapus komentar
        $delete_query = "DELETE FROM komentarfoto WHERE komentarid='$komentarid'";
        if(mysqli_query($conn, $delete_query)) {
            // Komentar berhasil dihapus, redirect kembali ke halaman sebelumnya
            header("location: ".$_SERVER['HTTP_REFERER']);
            exit;
        } else {
            // Jika terjadi kesalahan saat menghapus komentar, tampilkan pesan error
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Jika komentar tidak ditemukan atau tidak milik user yang sedang login, tampilkan pesan error atau redirect ke halaman lain
        echo "Anda tidak memiliki izin untuk menghapus komentar ini.";
    }
} else {
    // Jika parameter komentarid tidak terdefinisi, tampilkan pesan error atau redirect ke halaman lain
    echo "Parameter komentarid tidak ditemukan.";
}
?>
