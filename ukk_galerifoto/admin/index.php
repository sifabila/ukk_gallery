<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <style>
        body {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .navbar {
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            overflow: hidden;
            border: 5px solid #fff;
            border-radius: 15px; /* Corner radius untuk membuat sudut bingkai lebih melengkung */
        }

        .card:hover {
            transform: scale(1.05);
            border: 5px solid #17a2b8;
        }

        .card-footer {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .card-footer a,
        .card-footer span {
            color: #fff;
            text-decoration: none;
            margin-right: 15px;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .card-footer a:hover {
            color: #17a2b8;
        }
        .card-img-top {
            image-rendering: crisp-edges;
            max-width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }

        .modal-content {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .menu-item {
            /* border: 1px solid black; */
            padding: 8px;
            border-radius: 5px;
        }
 
        .dropdown-menu a:hover,
        .dropdown-menu a:focus {
            background-color: transparent !important;
            color: #17a2b8 !important; /* Ganti dengan warna teks yang diinginkan */
        }
    </style>
</head>

<body class="bg" style="background-color: #B4B4B8;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <img src="../assets/img/bf.jpeg" alt="logo" width="30" height="30" class="d-inline-block align-top rounded-circle mt-1">
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
                <!-- <form class="d-flex mx-2" id="searchForm">
                    <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="button" onclick="searchFunction()">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </form> -->
                <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1"><i class="fa-solid fa-right-from-bracket"></i>Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="alert alert-success" role="alert">
        Welcome to the photo gallery website, <?php echo $_SESSION['username']; ?>!
        </div>
        Album :
        <?php
        $album = mysqli_query($koneksi, "SELECT * FROM album");
        while ($row = mysqli_fetch_array($album)) { ?>
            <a href="index.php?albumid=<?php echo $row['albumid'] ?>" class="btn btn-outline-primary">
                <?php echo $row['namaalbum'] ?></a>
        <?php } ?>
    </div>

    
    <div class="container mt-2">
        <div class="row">
            <?php
           if (isset($_GET['albumid'])) {
            $albumid = $_GET['albumid'];
            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE albumid='$albumid'");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM foto");
        }

        while ($data = mysqli_fetch_array($query)) {
            ?>
                 <div class="col-md-3 mt-2">
        <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
            <div class="card">
                <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 12rem;">
                <div class="card-footer text-center">
                    <?php
                        $fotoid = $data['fotoid'];
                        $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                        $sukaIcon = (mysqli_num_rows($ceksuka) == 1) ? 'fa fa-thumbs-up' : 'fa-regular fa-thumbs-up';
                        $jumlahLike = mysqli_num_rows($ceksuka);
                    ?>
                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka">
                        <i class="<?php echo $sukaIcon ?>"></i>  
                        <span class="badge bg-primary"><?php echo $jumlahLike; ?></span>
                    </a>

                    <?php
                        $cekdislike = mysqli_query($koneksi, "SELECT * FROM dislikefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                        $icon = (mysqli_num_rows($cekdislike) == 1) ? 'fa fa-thumbs-down' : 'fa-regular fa-thumbs-down';
                        $jumlahDislike = mysqli_num_rows($cekdislike);
                    ?>
                    <a href="../config/proses_dislike.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="bataldislike">
                        <i class="<?php echo $icon ?>"></i> 
                        <span class="badge bg-danger"><?php echo $jumlahDislike; ?></span>
                    </a>

                                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class="fa-regular fa-comment"></i>
                                    <?php
                                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                echo '<span style="color: #fff;">' .mysqli_num_rows($jmlkomen) . ' ';
                                    ?>
                                </a>
                                
                                
                                <a href="../assets/img/<?php echo $data['lokasifile'] ?>" download="download_<?php echo $data['judulfoto'] ?>"> <i class="fas fa-download"></i> </a>

                            </div>
                        </div>
                    </a>
                    <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="m-2">
                                                <div class="overflow-auto">
                                                <div class="sticky-top">
                                                <strong style="color: #fff;"><?php echo isset($data['judulfoto']) ? $data['judulfoto'] : ''; ?></strong><br>
                                                <span class="badge bg-secondary" style="color: #fff;"><?php echo isset($data['namalengkap']) ? $data['namalengkap'] : ''; ?></span>
                                                <span class="badge bg-secondary" style="color: #fff;"><?php echo isset($data['tanggalunggah']) ? $data['tanggalunggah'] : ''; ?></span>
                                                <span class="badge bg-primary" style="color: #fff;"><?php echo isset($data['namaalbum']) ? $data['namaalbum'] : ''; ?></span>
                                            </div>

                                                    <hr>
                                                    <p align="left" style="color: #fff;">
                                                        <?php echo $data['deskripsifoto'] ?>
                                                        <!-- Untuk Deskripsi foto -->
                                                    </p>
                                                    <hr>
                                                    <?php
                                                    $fotoid = $data['fotoid'];
                                                    $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                    while ($row = mysqli_fetch_array($komentar)) {
                                                    ?>
                                                        <p align="left">
                                                            <strong style="color: #fff;"><?php echo $row['namalengkap'] ?></strong>
                                                            <span style="color: #fff;"><?php echo $row['isikomentar'] ?></span>
                                                            <?php if ($row['userid'] == $userid) { ?>
                                                            <a href="../config/proses_hapus_komentar.php?komentarid=<?php echo $row['komentarid'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                                        <?php } ?>
                                                        </p>
                                                    <?php } ?>
                                                    <hr>
                                                    <div class="sticky-bottom">
                                                        <form action="../config/proses_komentar.php" method="POST">
                                                            <div class="input-group">
                                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
                                                                <div class="input-group-prepend">
                                                                    <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p class="text-black">&copy; UKK RPL 2024 Syifa Nabila</p>
    </footer>

    <!-- Add these lines before the closing </body> tag -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script>
        function searchFunction() {
            var searchTerm = document.getElementById('searchInput').value.toLowerCase();
            var cards = document.getElementsByClassName('card');

            for (var i = 0; i < cards.length; i++) {
                var title = cards[i].getElementsByTagName('img')[0].title.toLowerCase();
                var description = cards[i].getElementsByTagName('p')[0].innerText.toLowerCase();

                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    cards[i].style.display = 'block';
                } else {
                    cards[i].style.display = 'none';
                }
            }
        }

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