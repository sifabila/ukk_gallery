<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {  
            background-image: url('assets/img/lone.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff; 
        }
        .navbar-brand img {
            max-width: 30px;
            height: auto;
            border-radius: 100%; 
            margin-right: 10px;
        }
        .eye-icon {
            cursor: pointer;
            position: relative;
            background-color: #fff;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
  <img src="assets/img/bf.jpeg" alt="logo" width="30" height="30" class="d-inline-block align-top rounded-circle ">
    <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
       
      </div>
      <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
      <a href="login.php" class="btn btn-outline-success m-1">Masuk</a>

    </div>
  </div>
</nav>  

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body" style="background-color: #fff;">
                    <div class="text-center"style="color: #000;">
                        <h5>Daftar Akun Baru</h5>
                    </div>
                    <form action="config/aksi_register.php" method="POST">
                        <label class="form-label"style="color: #000;">Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <label class="form-label"style="color: #000;">Password</label>
                        <div class="input-group">
                                <input type="password" name="password" class="form-control" required
                                    id="password">
                                <button class="btn btn-outline-secondary eye-icon" type="button"
                                    id="showPasswordToggle">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                        <label class="form-label"style="color: #000;">Email</label>
                        <input type="email" name="email" class="form-control" required>
                        <label class="form-label"style="color: #000;">Nama Lengkap</label>
                        <input type="text" name="namalengkap" class="form-control" required>
                        <label class="form-label"style="color: #000-;">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                        <div class="d-grid mt-2">
                            <button class="btn btn-primary" type="submit" name="kirim">DAFTAR
                            </button>
                        </div>
                    </form>
                    <hr>
                    <p style="color: #000;">Sudah Punya Akun? <a href="login.php">Login Disini!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script>
            document.getElementById('showPasswordToggle').addEventListener('click', function () {
                var passwordField = document.getElementById('password');
                var eyeIcon = this.querySelector('i');

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            });
        </script>
    </script>
    <p style="color: #000;">&copy; UKK RPL 2024  Syifa Nabila</p>
</body>
</html>