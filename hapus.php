<?php 
require 'functions.php';

// Memastikan parameter yang dibutuhkan tersedia sebelum melanjutkan
if (isset($_GET['id_product']) || isset($_GET['id_user'])) {
    if (isset($_GET['id_product'])) {
        $id_product = $_GET['id_product'];
        if (hapus($id_product) > 0) {
            echo "<script>
                    alert('data produk berhasil dihapus');
                    document.location.href = 'dashboard.php';
                  </script>";
        } else {
            echo "<script>
                    alert('data produk gagal dihapus!');
                    document.location.href = 'dashboard.php';
                  </script>";
        }
    } elseif (isset($_GET['id_user'])) {
        $id_user = $_GET['id_user'];
        if (hapus_user($id_user) > 0) {
            echo "<script>
                    alert('user berhasil dihapus');
                    document.location.href = 'customers.php';
                  </script>";
        } else {
            echo "<script>
                    alert('user gagal dihapus!');
                    document.location.href = 'customers.php';
                  </script>";
        }
    }
} else {
    echo "<script>
            alert('Parameter tidak lengkap!');
            document.location.href = 'dashboard.php';
          </script>";
}
?>
