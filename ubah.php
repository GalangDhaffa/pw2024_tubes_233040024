<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit;
}

require 'functions.php';

$id_product = $_GET['id_product'];

$d = query("SELECT * FROM products WHERE id_product = $id_product")[0];

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
          alert('data berhasil diubah');
          document.location.href = 'dashboard.php';
          </script>";
  } else {
    echo "data gagal diubah!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Produk</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/screen.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&family=Lilita+One&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
<nav class="navbar bg-navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="img/logo/logo6.gif" alt="Logo" width="50" height="50" class="d-inline-block align-text-top" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header off-canvas-color">
          <h5 class="offcanvas-title " id="offcanvasNavbarLabel">Prestige Custom Garage</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-navbar">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index_login.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="tambah.php">Tambah Barang</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
            <button class="btn" type="submit">
              <span class="material-symbols-outlined"> search </span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </nav>

  <h3 class="container p-5">Ubah Stok Produk</h3>
  <form method="POST">
    <div class="container">
      <input type="hidden" name="id_product" value="<?= $d['id_product']; ?>">
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="name_product" placeholder="Nama Produk" name="name_product" value="<?= $d['name_product']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Jumlah</label>
        <input type="text" class="form-control" id="stock_product" placeholder="Jumlah" name="stock_product" value="<?= $d['stock_product']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Harga</label>
        <input type="text" class="form-control" id="price" placeholder="Harga" name="price" value="<?= $d['price']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Gambar</label>
        <input class="form-control" type="file" id="image" name="image" value="<?= $d['image']; ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
    </div>
  </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</html>