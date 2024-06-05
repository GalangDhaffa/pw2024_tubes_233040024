<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit;
}

require 'functions.php';

$add = query("SELECT * FROM products");

if(isset($_POST['cari'])) {
  $add = cari($_POST['keyword']);
}

?>
<!doctype html>
<html lang="en">



<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Secreto Custom Prestige</title>
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
  <!-- navbar -->
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
                <li><a class="dropdown-item" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
</svg> Logout</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search" method="POST">
            <input class="form-control me-2 " type="search"  aria-label="Search" name="keyword" size="30" placeholder="masukan keyword pencarian">
            <button class="btn" type="submit">
              <span class="material-symbols-outlined" name="cari"> search </span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </nav>

  <!-- dasboard -->
  <div class="container">
    <h1 class="m-5">Dashboard</h1>
    <a href="tambah.php" class="btn btn-primary">Tambah Barang</a>
    <table class="table">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">jumlah</th>
          <th scope="col">harga</th>
          <th scope="col">gambar</th>
          <th scope="col">aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($add as $d) : ?>
          <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $d['name_product'] ?></td>
            <td><?= $d['stock_product'] ?></td>
            <td><?= $d['price'] ?></td>
            <td>
              <a href="detail_gambar.php?id_product=<?= $d['id_product']; ?>" class="badge text-bg-primary text-decoration-none">Lihat Gambar</a>
            </td>
            <td>
              <a href="ubah.php?id_product=<?= $d['id_product']; ?>" class="badge text-bg-warning text-decoration-none">Ubah</a>
              <a href="hapus.php?id_product=<?= $d['id_product']; ?>" onclick="return confirm('apakah anda yakin?')" class="badge text-bg-danger text-decoration-none">Hapus</a>
            </td>
          </tr>
        <?php
        endforeach;
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>