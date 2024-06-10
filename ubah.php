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

$id_product = $_GET['id_product'];

$d = query("SELECT * FROM products WHERE id_product = $id_product")[0];

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
          alert('data berhasil diubah');
          document.location.href = 'produk.php';
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
  <link rel="icon" href="img/logo/logo4.png" type="image/gif">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&family=Lilita+One&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body style="height:100vh;">
  <div class="d-flex h-100">
    <?php include './include/sidebar.php'; ?>

    <div class="container">
      <h3 class="container p-5">Ubah Stok Produk</h3>
      <form method="POST" enctype="multipart/form-data">
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
            <input type="text" class="form-control" id="price" placeholder="Harga" name="price" value="<?= $d['price'];  ?>" required>
          </div>
          <div class="mb-3">
            <input type="hidden" name="gambar_lama" value="<?= $d['image']; ?>">
            <label for="formGroupExampleInput2" class="form-label">Gambar</label>
            <input class="form-control gambar-noft" onchange="previewImage()" type="file" id="image" name="image">
            <p>pastikan ukuran 1:1 dan size dibawah 5MB</p>
            <img src="./img/produk/<?= $d['image']; ?>" width="120" style="display: block;" alt="" class="img-preview m-2">
          </div>
          <a href="produk.php" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
            </svg>kembali</a>
          <button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
        </div>
      </form>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="./js/script.js"></script>

</html>