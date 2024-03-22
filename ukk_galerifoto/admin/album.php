<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login'){
    echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
        body {
            background-color: #C7C8CC;
        }

        .navbar {
            background-color: #E3E4E8;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #343A40;
        }

        .navbar-toggler-icon {
            /* background-color: #343A40; */
        }

        .menu-item {
            padding: 8px;
            border-radius: 5px;
        }

        .dropdown-menu a:hover,
        .dropdown-menu a:focus {
            background-color: transparent !important;
            color: #17a2b8 !important;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .card-body {
            padding: 15px;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #138496;
        }

        .modal-content {
            background-color: #F8F9FA;
        }

        .modal-title {
            color: #343A40;
        }

        .form-label {
            color: #343A40;
        }

        .btn-secondary {
            background-color: #6C757D;
            border-color: #6C757D;
        }

        .btn-secondary:hover {
            background-color: #5A6268;
            border-color: #5A6268;
        }

        .btn-primary {
            background-color: #007BFF;
            border-color: #007BFF;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .table {
            background-color: #B6C4B6;
        }

        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }

        .table th {
            background-color: #B5C0D0;
            color: #fff;
        }

        .btn-primary,
        .btn-danger {
            margin-right: 5px;
        }

        .footer {
            background-color: #B6C4B6;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        
    </style>
</head>
<body class="bg" style="background-color: #B5C0D0;">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle menu-item" href="#" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu" id="dropdownMenu">
                            <li><a class="dropdown-item" href="album.php"><div class="menu-item">Album</div></a></li>
                            <li><a class="dropdown-item" href="foto.php"><div class="menu-item">Foto</div></a></li>
                        </ul>
                    </div>
                </div>

      <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>

    </div>
  </div>
</nav>  


<div class="container-fluid">
    <div class="row">
    <div class="col-md-4 ms-auto">
        <div class="card-body">
            <!-- Tambahkan data-bs-toggle dan data-bs-target untuk membuka modal -->
            <button type="button" class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#tambahAlbumModal"> <i class="fa-solid fa-plus me-2"></i>Tambah Album</button>
        </div>
    </div>
</div>

<!-- Modal untuk menambah album -->
<div class="modal fade" id="tambahAlbumModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Album Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambah album -->
                <form action="../config/aksi_album.php" method="POST">
                    <label class="form-label">Nama Album</label>
                    <input type="text" name="namaalbum" class="form-control" required>
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- <div class="col-md-4">
            <div class="card mt-2 bg-purple">
                <div class="card-header bg-pink">Tambah Album</div>
                <div class="card-body">
                    <form action="../config/aksi_album.php" method="POST">
                        <label class="form-label">Nama Album</label>
                        <input type="text" name="namaalbum" class="form-control" required>
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" required></textarea>
                        <button type="submit" class="btn btn-secondary  mt-2" name="tambah">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div> -->
        
        <div class="col-md-8 mx-auto">
            <h4>Data Album</h4>
            <div class="card mt-2  bg-white">
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col text-center">No</th>
                                <th class="col text-center">Nama Album</th>
                                <th class="col text-center">Deskripsi</th>
                                <th class="col text-center">Tanggal</th>
                                <th class="col text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = "1";
                            $userid = $_SESSION['userid'];
                            $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                            while($data = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td class="col text-center"><?php echo $no++ ?></td>
                                <td class="col text-center"><?php echo $data['namaalbum'] ?></td>
                                <td class="col text-center"><?php echo $data['deskripsi'] ?></td>
                                <td class="col text-center"><?php echo $data['tanggalbuat'] ?></td>
                                <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['albumid'] ?>"><i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <div class="modal fade" id="edit<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                         <div class="modal-content">
                                         <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                  <form action="../config/aksi_album.php" method="POST">
                                                    <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                                                    <label class="form-label">Nama Album</label>
                                                     <input type="text" name="namaalbum" value="<?php echo $data['namaalbum'] ?>" class="form-control" required>
                                                     <label class="form-label">Deskripsi</label>
                                                     <textarea class="form-control" name="deskripsi"  required>
                                                        <?php echo $data['deskripsi']; ?>
                                                     </textarea>
                                                 
                                                 </div>
                                                  <div class="modal-footer">
                                                  <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                  </form>
                                                </div>
                                             </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['albumid'] ?>"><i class="fa-solid fa-trash"></i>
                                </button>

                                <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                         <div class="modal-content">
                                         <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                  <form action="../config/aksi_album.php" method="POST">
                                                    <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                                                    Apakah Anda Yakin Ingin Menghapus Data Ini <strong> <?php echo $data['namaalbum'] ?></strong> ?
                                                 </div>
                                                  <div class="modal-footer">
                                                  <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                                                  </form>
                                                </div>
                                             </div>
                                            </div>
                                        </div>
                                          </td>
                                          </tr>
                                          <?php } ?>
                                            </tbody>
                                         </table>
                                          </div>
                                           </div>
                                         </div>
                                          </div>
                                          </div>
                                        </div>
                                        <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
                                             <p>&copy; UKK RPL 2024   Syifa Nabila</p>
                                            </footer>

                                            <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
                                            <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                var dropdownMenu = document.getElementById('dropdownMenu');
                                                var dropdownToggle = document.getElementById('navbarDropdownMenu');
                                                
                                                dropdownToggle.addEventListener('click', function () {
                                                    if (dropdownMenu.style.display === 'block') {
                                                        dropdownMenu.style.display = 'none';
                                                    } else {
                                                        dropdownMenu.style.display = 'block';
                                                    }
                                                });
                                                
                                                // Menutup dropdown saat klik di luar dropdown
                                                document.addEventListener('click', function (event) {
                                                    if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                                                        dropdownMenu.style.display = 'none';
                                                    }
                                                });
                                            });
                                            </script>
                                        </body>
                                        </html>