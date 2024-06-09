<?php

// session_start();

// koneksi
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040024');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


// tambah data
function upload($file)
{
  $nama_file = $_FILES['image']['name'];
  $tipe_file = $_FILES['image']['type'];
  $ukuran_file = $_FILES['image']['size'];
  $error = $_FILES['image']['error'];
  $tmp_file = $_FILES['image']['tmp_name'];

  if ($error == 4) {
    return 'nophoto.png';
  }

  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
        alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
        alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek ukuran file
  if ($ukuran_file > 5000000) {
    echo "<script>
        alert('ukuran gambar terlalu besar!');
          </script>";
    return false;
  }

  // lolos pengecekan siap upload file
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;

  if (!move_uploaded_file($tmp_file, './img/produk/' . $nama_file_baru)) {
    return false;
  }

  return $nama_file_baru;
}

function tambah($data)
{
  $conn = koneksi();

  $nama_produk = htmlspecialchars($data['name_product']);
  $stok = htmlspecialchars($data['stock_product']);
  $harga = htmlspecialchars($data['price']);

  $image = upload($_FILES['image']);
  if (!$image) {
    return false;
  }

  $query = "INSERT INTO products
            VALUES
            (null, '$nama_produk', '$stok', '$harga', '$image')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

// ubah data
function ubah($data)
{
  $conn = koneksi();

  $id_product = $data['id_product'];
  $nama_produk = htmlspecialchars($data['name_product']);
  $stok = htmlspecialchars($data['stock_product']);
  $harga = htmlspecialchars($data['price']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);

  if ($_FILES['image']['error'] === 4) {
    $gambar = $gambar_lama;
  } else {
    $gambar = upload($_FILES['image']);
    if (!$gambar) {
      return false;
    }
  }

  $query = "UPDATE products SET
            name_product = '$nama_produk',
            stock_product = '$stok',
            price = '$harga',
            image = '$gambar'
            WHERE id_product = $id_product";

  $d = query("SELECT * FROM products WHERE id_product = $id_product")[0];
  if ($d['image'] != 'nophoto.png') {
    unlink('./img/produk/' . $d['image']);
  }

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

// hapus data
// produk
// fungsi hapus produk
function hapus($id_product)
{
  $conn = koneksi();

  $d = query("SELECT * FROM products WHERE id_product = $id_product")[0];
  if ($d['image'] != 'nophoto.png') {
    unlink('./img/produk/' . $d['image']);
  }

  mysqli_query($conn, "DELETE FROM products WHERE id_product = $id_product") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// fungsi hapus user
function hapus_user($id_user)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM users WHERE id_user = $id_user") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


// login
function login($data)
{
  $conn = koneksi();
  $username = htmlspecialchars($data["username"]);
  $password = htmlspecialchars($data["password"]);

  $users = query("SELECT * FROM users WHERE username = '$username'");

  if (count($users) > 0) {
    $user = $users[0];
    if (password_verify($password, $user['password'])) {
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['id_user'] = $user['id_user'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['role'] = $user['id_role'] == 1 ? 'admin' : 'user';
      if ($user['id_role'] == 1) {
        $_SESSION['role'] = 'admin';
        header("Location: dashboard.php");
        exit;
      } else {
        $_SESSION['role'] = 'user';
        header("Location: dashboard.php");
        exit;
      }
    }
    return [
      'error' => true,
      'pesan' => '<p style="color: red; font-style: italic;">username/password salah!</p>'
    ];
  }
}

// register
function registrasi($data)
{
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $email = htmlspecialchars(strtolower($data['email']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  if (empty($username) || empty($email) || empty($password1) || empty($password2)) {
    echo "<script>
            alert('username / password tidak boleh kosong!');
            document.location.href = 'register.php';
            </script>";
    return false;
  }

  if (query("SELECT * FROM users WHERE username = '$username'")) {
    echo "<script>
            alert('username sudah terdaftar!');
            document.location.href = 'register.php';
            </script>";
    return false;
  }

  if ($password1 !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai!');
            document.location.href = 'register.php';
            </script>";
    return false;
  }

  if (strlen($password1) < 5) {
    echo "<script>
            alert('Password terlalu pendek!');
            document.location.href = 'register.php';
            </script>";
    return false;
  }

  $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  // Menetapkan id_role secara eksplisit
  $id_role = 2; // Misalnya, 2 untuk user biasa

  $query = "INSERT INTO users (username, email, password, id_role) 
              VALUES 
              ('$username', '$email', '$password_baru', '$id_role')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


// search
function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM products WHERE 
              name_product LIKE '%$keyword%' OR
              stock_product LIKE '%$keyword%' OR
              price LIKE '%$keyword%'
    ";

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
