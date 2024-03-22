<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    // Proses tambah data
    // ...

    echo "<script> 
    alert('Data berhasil disimpan!');
    location.href='../admin/informasi_profil.php';
    </script>";
}

if (isset($_POST['edit'])) {
    // Proses edit data
    // ...

    echo "<script> 
    alert('Data berhasil diperbarui!');
    location.href='../admin/informasi_profil.php';
    </script>";
}

if (isset($_POST['hapus'])) {
    // Proses hapus data
    // ...

    echo "<script> 
    alert('Data berhasil dihapus!');
    location.href='../admin/informasi_profil.php';
    </script>";
}
?>
