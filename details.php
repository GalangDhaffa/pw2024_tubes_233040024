<?php
require 'functions.php';


if (!isset($_GET['id_product']) || empty($_GET['id_product'])) {
  die('ID produk tidak ditemukan.');
}

$id_product = intval($_GET['id_product']);

$d = query("SELECT * FROM products WHERE id_product = $id_product");


if (empty($d)) {
  die('Produk tidak ditemukan.');
}

$d = $d[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Gambar</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/screen.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&family=Lilita+One&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <!-- NAVBAR -->
  <nav class="bg-navbar navbar navbar-expand-lg position-sticky top-0 z-1">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="img/logo/logo6.gif" alt="Logo" width="50" height="50" class="d-inline-block align-text-top" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active link" aria-current="page" href="index.php">Home</a>
          <a class="nav-link link" href="index.php#about">About</a>
          <a class="nav-link link" href="index.php#gallery">Gallery</a>
          <a class="nav-link link" href="index.php#produk">Produk</a>
          <a class="nav-link link" href="index.php#contact">Contact</a>
          <!-- <a href="#" class="btn">
            <span class=""> search </span>
              <form action="" method="POST">
                <input type="text" name="keyword">       
              </form>
            </a> -->
          <a class="nav-link link" href="login.php">login</a>
        </div>
      </div>
    </div>
  </nav>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>