<?php
session_start();

if (isset($_SESSION['login'])) {
  header("location: dashboard.php");
  exit;
}

require 'functions.php';

if (isset($_POST['registrasi'])) {
  if (regisrasi($_POST) > 0) {
    echo "<script>
    alert('user baru berhasil ditambahkan');
    document.location.href = 'login.php';
    </script>";
  } else {
    echo 'user gagal ditambahkan!';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/screen.css" />
  <link rel="stylesheet" href="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&family=Lilita+One&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body style="overflow: hidden;">
  <!-- login -->
  <div class="container">
    <div class="container-lgn">
      <div class="login-container">
        <div class="d-flex justify-content-between">
          <a href="login.php" class="text-decoration-none"><span class="material-symbols-outlined">keyboard_double_arrow_left</span></a>
          <a href="register.php" class="text-decoration-none"><span class="material-symbols-outlined">keyboard_double_arrow_right</span></a>
        </div>
        <h2 class="text-center">Register</h2>
        <form class="row g-3" action="" method="POST">
          <div class="col-md-6">
            <label for="username" class="form-label pt-2">Username</label>
            <input type="username" class="form-control" id="username" name="username" autofocus autocomplete="off" required>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label pt-2">Email</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
          </div>
          <div class="col-12">
            <label for="password1" class="form-label">Password 1</label>
            <input type="password" class="form-control" id="password1" name="password1" required>
          </div>
          <div class="col-12">
            <label for="password2" class="form-label">Password 2</label>
            <input type="password" class="form-control" id="password2" name="password2" required>
          </div>

          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Remember me
              </label>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" name="registrasi" class="btn btn-primary w-100">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>