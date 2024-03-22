<?php
session_start();
include '../config/koneksi.php';

if(isset($_GET['komentarid'])) {
    $komentarid = $_GET['komentarid'];
    $hapusKomentar = mysqli_query($koneksi, "DELETE FROM komentarfoto WHERE komentarid='$komentarid'");
    
    if ($hapusKomentar) {
        echo "<script>alert('Komentar berhasil dihapus!');window.location.href='../admin/index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus komentar!');window.location.href='../admin/index.php';</script>";
    }
} else {
    echo "<script>alert('Komentar tidak ditemukan!');window.location.href='../admin/index.php';</script>";
}
?>
