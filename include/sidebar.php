<?php
$username = $_SESSION['username'];


$username = $_SESSION['username'];
$role = $_SESSION['role']; // Tambahkan ini untuk mendapatkan peran pengguna
?>

<div class="d-flex h-100">
  
  <div class="d-flex flex-column flex-shrink-0 p-3 " style="width: 280px; background-color: #BFBFBF; box-shadow:  5px 5px 5px #666666,-5px -5px 5px #ffffff;">
    <a href="index_login.php#home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32">
        <use xlink:href="#home"></use>
      </svg>
      <span class="fs-4"><img src="./img/logo/logo6.gif" width="70"></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <h5>User</h5>
      <li>
        <a href="index_login.php" class="nav-link link-body-emphasis">
          <i class="bi bi-house"></i>
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#speedometer2"></use>
          </svg>
          Home
        </a>
      </li>
      <li>
        <a href="dashboard.php" class="nav-link link-body-emphasis">
          <i class="bi bi-speedometer2"></i>
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#speedometer2"></use>
          </svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="profil.php" class="nav-link link-body-emphasis">
          <i class="bi bi-person-circle"></i>
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#speedometer2"></use>
          </svg>
          Profil
        </a>
      </li>
      <?php
      if ($role == 'admin') : // Menampilkan menu hanya untuk admin 
      ?>
        <hr>
        <h5>Admin</h5>
        <li>
          <a href="produk.php" class="nav-link link-body-emphasis">
            <i class="bi bi-grid"></i>
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#grid"></use>
            </svg>
            Produk
          </a>
        </li>
        <li>
          <a href="customers.php" class="nav-link link-body-emphasis">
            <i class="bi bi-people-fill"></i>
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#people-circle"></use>
            </svg>
            Pelanggan
          </a>
        </li>
      <?php endif; ?>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" id="dropdownUser1" aria-expanded="false">
        <img src="./img/logo/nophoto.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?= $username ?></strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
        <li>
        <li>
          <a class="dropdown-item" href="logout.php">Sign out</a>
        </li>
      </ul>
    </div>
  </div>
</div>