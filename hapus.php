<?php 
require 'functions.php';


$id_product = $_GET['id_product'];

if( hapus($id_product) > 0){
  echo "<script>
        alert('data berhasil dihapus');
        document.location.href = 'dashboard.php';
        </script>";
} else {
  echo "data gagal dihapus!";
}
?>