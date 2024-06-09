<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit;
}

if ($_SESSION['role'] !== 'admin') {
  header("location: dashboard.php");
  exit;
}

require 'functions.php';

$add = query("SELECT * FROM products");

if (isset($_POST['cari'])) {
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&family=Lilita+One&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="height:100vh;">
  <!-- sidebar -->
  <div class="d-flex h-100">
    <?php include './include/sidebar.php'; ?>

    <div class="container">
      <h1 class="m-5">Produk</h1>
      <a href="tambah.php" class="btn btn-primary">Tambah Barang</a>

      <!-- search button -->
      <form class="d-flex mt-3 mb-3 col-md-6" role="search" method="POST" action="">
        <input class="form-control me-2 keyword" type="text" placeholder="cari produk" aria-label="Search" name="keyword">
        <button class="btn bg-success-subtle tombol-cari" type="submit" name="cari">
          <span> <i class="bi bi-search" style="font-size: 20px;"></i> </span>
        </button>
      </form>

      <!-- tabel produk -->
      <div class="containerproduk">
        <table class="table table-striped table-bordered">
          <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">jumlah</th>
            <th scope="col">harga</th>
            <th scope="col">gambar</th>
            <th scope="col">aksi</th>
          </tr>
          <?php if (empty($add)) : ?>
            <tr>
              <td colspan="4">
                <p style="color: red; font-style: italic;">data produk tidak di temukan!</p>
              </td>
            </tr>
          <?php endif ?>
          <tbody>
            <?php
            $i = 1;
            foreach ($add as $d) : ?>
              <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $d['name_product'] ?></td>
                <td><?= $d['stock_product'] ?></td>
                <td><?= '$' . number_format($d['price'], 0, ',', '.'); ?></td>
                <td>
                  <a href="details_gambar.php?id_product=<?= $d['id_product']; ?>" class="badge text-bg-primary text-decoration-none">Lihat Gambar</a>
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
    </div>
  </div>
  <!-- dasboard -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <script src="js/script.js"></script>
</body>

</html>