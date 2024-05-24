<?php
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
    echo "<script>
        alert('pilih gambar terlebih dahulu!');
          </script>";
    return false;
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
  //  maksimal file 5mb
  if ($ukuran_file > 5000000) {
    echo "<script>
        alert('ukuran gambar terlalu besar!');
          </script>";
    return false;
  }

  // lolos pengecekan siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;

  move_uploaded_file($tmp_file, './img/produk'. $nama_file_baru);

  return $nama_file_baru;
}
function tambah($data)
{
  $conn = koneksi();

  $nama_produk = htmlspecialchars($data['name_product']);
  $stok = htmlspecialchars($data['stock_product']);
  $harga = htmlspecialchars($data['price']);
  // $gambar = htmlspecialchars($data['image']);

  // tambah gambar
  $image = upload($_FILES['image']);
  if (!$image) {
    return false;
  }

  $query = "INSERT INTO 
            products
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

  $id_product = ($data['id_product']);
  $nama_produk = htmlspecialchars($data['name_product']);
  $stok = htmlspecialchars($data['stock_product']);
  $harga = htmlspecialchars($data['price']);
  $gambar = htmlspecialchars($data['image']);

  $query = "UPDATE products set
            name_product = '$nama_produk',
            stock_product = '$stok',
            price = '$harga',
            image = '$gambar'
            WHERE id_product = $id_product";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

// hapus data
function hapus($id_product)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM products WHERE id_product = $id_product") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


// login
$conn = koneksi();
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
      header("Location: dashboard.php");
      exit;
    }
    return [
      'error' => true,
      'pesan' => 'Username / Password salah!'
    ];
  }
}

function regisrasi($data)
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
  $query = "INSERT INTO users (username, email, password) 
            VALUES 
            ('$username', '$email', '$password_baru')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
