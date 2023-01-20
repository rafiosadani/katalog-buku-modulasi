<?php include('koneksi/koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('include/head.php'); ?>
</head>
<body>
  <?php include('include/navigasi.php'); ?>

  <?php 
    // pemanggilan konten halaman index
    if (isset($_GET["include"])) {
      $include = $_GET["include"];
      if ($include == "about-us") {
          // about us
          include("include/aboutus.php");
      } else if ($include == "contact-us") {
          // contact us
          include("include/contactus.php");
      } else if ($include == "detail-buku") {
          // detail buku
          include("include/detailbuku.php");
      } else if ($include == "daftar-buku-kategori") {
          // daftar buku
          include("include/daftarbuku.php");
      } else if ($include == "blog") {
          // daftar buku
          include("include/blog.php");
      } else if ($include == "detail-blog") {
          // daftar buku
          include("include/detailblog.php");
      } else {    
          include("include/index.php");
      }
    } else {
        include("include/index.php");
    }
  ?>

  <?php include('include/footer.php'); ?>
  
  <?php include('include/script.php'); ?>
</body>
</html>