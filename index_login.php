<?php

require 'functions.php';

$add = query("SELECT * FROM products");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Secreto Custom Prestige</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/screen.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&family=Lilita+One&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
  <?php include './include/back-to-top.php'; ?>


  <!-- NAVBAR -->
  <?php include './include/navbar_login.php'; ?>


  <!-- HOME -->
  <section id="home">
    <div id="carouselExampleSlidesOnly" class="carousel slide home" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/gallery/G1.png" class="gambar-home d-flex w-200 opacity-75 " height="855" alt="pic1" />
          <div class="carousel-caption position-absolute text-center home-text d-flex flex-wrap">
            <img src="img/logo/Logo1.png" class="rounded d-block" alt="Logo" />

            <p>
              Selamat datang di web secreto Custom. Kami menyediakan service
              terbaik di kota prestige dan berbagai sparepart mobil dan motor
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- about -->
  <main>
    <section id="about">
      <div class="container about">
        <h1>Tentang kami</h1>
        <div class="d-flex row justify-content-center ">
          <img data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" src="img/logo/logo4.png" class="mx-5" salt="gambar" />
          <p class="prag w-50 col" style="text-align: justify">
            Bengkel ini di buat di kota Prestige Roleplay, bengkel pertama di
            kota ini, sebelum derjadi pengeboman di bebrapa instansi
            pemerintah salah satunya bengkel secreto, sebelum berganti nama
            menjadi secreto bengkel ini adalah bengkel milo, bengkel ini sudah
            berpindah tempat beberapa kali di karenakan terjadi kebakaran,
            yang pertama berada di kota, paleto, laut paleto......
            pendiri bengkel dari pertama di buat adalah Milo Slebew
            dan Wakilnya Vin Solar, dan sekarang sudah beberapa pergantian
            kepemimpinan, Bos bengkel yang sekarang adalah Bangkit Slebew,
            Wakilnya Bben dan Vin Solar, sekertaris Helen Voldem.
          </p>
        </div>
      </div>
    </section>

    <!-- gallery -->
    <section id="gallery">
      <div class="container gallery">
        <h1 class="heading">Gallery</h1>
        <div class="gallery-image">
          <div class="img-box" data-aos="fade-up-right" data-aos-delay="200" data-aos-duration="500">
            <img src="img/gallery/G1.png" alt="gambar" />
            <div class="transparent-box">
              <div class="caption">
                <p>Secreto Custom</p>
              </div>
            </div>
          </div>
          <div class="img-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
            <img src="img/gallery/p.png" alt="gambar" />
            <div class="transparent-box">
              <div class="caption">
                <p>Secreto Custom</p>
              </div>
            </div>
          </div>
          <div class="img-box" data-aos="fade-up-left" data-aos-delay="200" data-aos-duration="500">
            <img src="img/gallery/G3.png" alt="gambar" />
            <div class="transparent-box">
              <div class="caption">
                <p>Secreto Custom</p>
              </div>
            </div>
          </div>
          <div class="img-box" data-aos="fade-up-right" data-aos-delay="200" data-aos-duration="500">
            <img src="img/gallery/civic type r.jpg" alt="gambar" />
            <div class="transparent-box">
              <div class="caption">
                <p>Civic Type R</p>
              </div>
            </div>
          </div>
          <div class="img-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
            <img src="img/gallery/civic.jpg" alt="gambar" />
            <div class="transparent-box">
              <div class="caption">
                <p>Civic Sedan</p>
              </div>
            </div>
          </div>
          <div class="img-box" data-aos="fade-up-right" data-aos-delay="200" data-aos-duration="500">
            <img src="img/gallery/r34.jpg" alt="gambar" />
            <div class="transparent-box">
              <div class="caption">
                <p>Nissan R34</p>
              </div>
            </div>
          </div>
          <div class="img-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
            <img src="img/gallery/supra.jpg" alt="gambar" />
            <div class="transparent-box">
              <div class="caption">
                <p>Toyota Supra</p>
              </div>
            </div>
          </div>
          <div class="img-box" data-aos="fade-up-left" data-aos-delay="200" data-aos-duration="500">
            <img src="img/gallery/toyota 86.jpg" alt="gambar" />
            <div class="transparent-box">
              <div class="caption">
                <p>Toyota 86</p>
              </div>
            </div>
          </div>
          <div class="img-box" data-aos="fade-up-right" data-aos-delay="200" data-aos-duration="500">
            <img src="img/gallery/Vario.jpg" alt="gambar" />
            <div class="transparent-box">
              <div class="caption">
                <p>Vario</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- produk -->
    <section id="produk">
      <div class="container engine p-5">
        <h1 class="m-5 d-flex flex-wrap gap-4 justify-content-center">Produk</h1>
        <div class="d-flex flex-wrap gap-4 justify-content-center">
          <?php
          $i = 1;
          foreach ($add as $d) : ?>
            <div class="card" style="width: 18rem" class="card-body" class="img-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
              <?php
              $image = './img/produk/' . ($d['image']);
              if (file_exists($image)) {
                echo '<img src="' . $image . '"  class="card-img-top p-2" alt="Produk">';
              } else {
                echo 'Gambar tidak ditemukan.';
              }
              ?>

              <div class="card-body">
                <h4 class="card-title"><?= $d['name_product'] ?></h4>
                <h5 class="card-title"><?= '$' . number_format($d['price'], 0, ',', '.');  ?></h5>

                <a href="pesan_login.php?id_product=<?= $d['id_product']; ?>" class="btn btn-primary m-2"><span class="m-2">
                    Pesan
                  </span></a>
              </div>
            </div>
          <?php
          endforeach;
          ?>
        </div>
      </div>
    </section>

    <!-- contact -->
    <section id="contact">
      <div class="container contact">
        <div class="row">
          <h1>Contact</h1>
          <div class="col">
            <input type="text" class="form-control" placeholder="Nama" aria-label="nama" />
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Email" aria-label="email" />
          </div>
          <div class="pesan col-12 mt-3">
            <textarea class="form-control" placeholder="Pesan" aria-label="Pesan" style="height: 200px; resize: none"></textarea>
          </div>
        </div>
        <button class="btn btn-primary mt-3">Kirim</button>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <?php include './include/footer.php'; ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="./js/backtotop.js"></script>

</html>