const tombolCari = document.querySelector(".tombol-cari");
const keyword = document.querySelector(".keyword");
const containerproduk = document.querySelector(".containerproduk");

tombolCari.style.display = "none";

keyword.addEventListener("keyup", function () {
  // ajax

  // xmlhttprequest
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      containerproduk.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", "ajax/ajax_cari.php?keyword=" + keyword.value, true);
  xhr.send();
});

// preview image
function previewImage() {
  const gambar = document.querySelector(".gambar-noft");
  const imgPreview = document.querySelector(".img-preview");

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}


