<?php
require '../functions.php';

$add = cari($_GET['keyword']);

?>
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
