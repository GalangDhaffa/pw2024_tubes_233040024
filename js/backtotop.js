  // Mendapatkan referensi tombol
  var backToTopButton = document.getElementById('back-to-top');

  // Menampilkan atau menyembunyikan tombol ketika di-scroll
  window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      backToTopButton.style.display = 'block';
    } else {
      backToTopButton.style.display = 'none';
    }
  };

  // Fungsi untuk menggulir halaman ke atas
  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }