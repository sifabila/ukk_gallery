<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #fff;
            height: 100vh;
            margin: 0;
            overflow-x: hidden;
            background-image: url('assets/img/flw.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            image-rendering: auto;
            margin-top: 56px;
            padding-top: 20px;
        }

        .navbar {
            background-color: transparent;
            box-shadow: none;
        }

        .navbar-brand {
            font-size: 2.5em;
            color: #a74ac7;
            font-weight: bold;
        }

        .navbar-toggler {
            background-color: #17a2b8;
        }

        .navbar-toggler-icon {
            color: #fff;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar-nav a:hover {
            color: #17a2b8;
            text-decoration: underline;
        }

        .feature-container {
            padding: 100px 0;
            text-align: center;
            background-color: transparent;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
        }

        .feature-icon {
            font-size: 4em;
            color: #17a2b8;
            margin-bottom: 20px;
        }

        .feature-heading {
            font-size: 2.5em;
            margin-bottom: 15px;
            color: #fff;
        }

        .feature-description {
            font-size: 1.2em;
            color: #fff;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 20px 0;
            width: 100%;
            font-weight: bold;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }

        /* Animasi */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated {
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }

        /* Additional Styles */
        .extra-feature {
            background-color: #17a2b8;
            padding: 50px 0;
        }

        .extra-feature-icon {
            font-size: 3em;
            color: #17a2b8; /* Ganti warna sesuai keinginan Anda, contoh: biru #17a2b8 */
        }

        .extra-feature-heading {
            font-size: 2em;
            margin-bottom: 15px;
            color: #fff;
        }

        .extra-feature-description {
            font-size: 1.2em;
            color: #fff;
            line-height: 1.6;
        }
        
        .welcome-section {
            padding: 50px 20px; /* Mengubah padding untuk memberi ruang di dalam bingkai */
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            margin-top: 56px;
            border: 3px solid #17a2b8; /* Warna dan ketebalan bingkai */
            border-radius: 15px; /* Mengubah sudut bingkai */
            box-shadow: 0px 0px 20px rgba(23, 162, 184, 0.5); /* Efek bayangan */
        }
        
        .welcome-section h1 {
            font-size: 2.5em;
            margin-bottom: 15px;
        }
        
        .welcome-section p {
            font-size: 1.2em;
            color: #fff;
            line-height: 1.6;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Galeri Foto Syifa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="register.php">Daftar</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>

     <!-- Elemen Selamat Datang di bawah navbar -->
     <div class="welcome-section text-center">
        <h1>Selamat Datang di Galeri Foto Syifa</h1>
        <div class="feature-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 animated">
                    <i class="fas fa-camera-retro feature-icon"></i>
                    <h3 class="feature-heading">Galeri Foto Berkualitas Tinggi</h3>
                    <p class="feature-description">Temukan dan nikmati momen-momen berharga dengan foto-foto berkualitas tinggi.</p>
                </div>
                <div class="col-md-4 animated" style="animation-delay: 0.3s;">
                    <i class="fas fa-heart feature-icon"></i>
                    <h3 class="feature-heading">Suka dan Komentar</h3>
                    <p class="feature-description">Suka dan berikan komentar pada foto-foto yang Anda sukai.</p>
                </div>
                <div class="col-md-4 animated" style="animation-delay: 0.6s;">
                <i class="fas fa-star extra-feature-icon"></i>
                    <h3 class="feature-heading">Fitur Baru yang Menarik!</h3>
                    <p class="feature-description">Nikmati fitur baru kami yang akan membuat pengalaman Anda semakin istimewa.</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer class="footer">
        <p>&copy; UKK RPL 2024 Syifa Nabila</p>
    </footer>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Tambahkan kelas animated setelah dokumen selesai dimuat
        document.addEventListener("DOMContentLoaded", function () {
            const animatedElements = document.querySelectorAll(".animated");
            animatedElements.forEach((element) => {
                element.classList.add("animated");
            });
        });
    </script>
</body>

</html>
