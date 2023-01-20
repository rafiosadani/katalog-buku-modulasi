<?php 
  session_start();
  include("../koneksi/koneksi.php");
  if (isset($_GET["include"])) {
    $include = $_GET["include"];
    if ($include == "konfirmasi-login") {
      // login
      include("include/konfirmasilogin.php");
    } else if ($include == "signout") {
      // logout
      include("include/signout.php");
    } else if ($include == "konfirmasi-edit-profil") {
      // konfirmasi edit profil
      include("include/konfirmasieditprofil.php");
    } else if ($include == "konfirmasi-tambah-kategori-buku") {
      // konfirmasi tambah kategori buku
      include("include/konfirmasitambahkategoribuku.php");
    } else if ($include == "konfirmasi-edit-kategori-buku") {
      // konfirmasi edit kategori buku
      include("include/konfirmasieditkategoribuku.php");
    } else if ($include == "konfirmasi-tambah-tag") {
      // konfirmasi tambah tag
      include("include/konfirmasitambahtag.php");
    } else if ($include == "konfirmasi-edit-tag") {
      // konfirmasi edit tag
      include("include/konfirmasiedittag.php");
    } else if ($include == "konfirmasi-tambah-penerbit") {
      // konfirmasi tambah penerbit
      include("include/konfirmasitambahpenerbit.php");
    } else if ($include == "konfirmasi-edit-penerbit") {
      // konfirmasi edit penerbit
      include("include/konfirmasieditpenerbit.php");
    } else if ($include == "konfirmasi-tambah-kategori-blog") {
      // konfirmasi tambah kategori blog
      include("include/konfirmasitambahkategoriblog.php");
    } else if ($include == "konfirmasi-edit-kategori-blog") {
      // konfirmasi edit kategori blog
      include("include/konfirmasieditkategoriblog.php");
    } else if ($include == "konfirmasi-tambah-buku") {
      // konfirmasi tambah buku
      include("include/konfirmasitambahbuku.php");
    } else if ($include == "konfirmasi-edit-buku") {
      // konfirmasi edit buku
      include("include/konfirmasieditbuku.php");
    } else if ($include == "konfirmasi-tambah-konten") {
      // konfirmasi tambah konten
      include("include/konfirmasitambahkonten.php");
    } else if ($include == "konfirmasi-edit-konten") {
      // konfirmasi edit konten
      include("include/konfirmasieditkonten.php");
    } else if ($include == "konfirmasi-tambah-blog") {
      // konfirmasi tambah blog
      include("include/konfirmasitambahblog.php");
    } else if ($include == "konfirmasi-edit-blog") {
      // konfirmasi edit blog
      include("include/konfirmasieditblog.php");
    } else if ($include == "konfirmasi-tambah-user") {
      // konfirmasi tambah user
      include("include/konfirmasitambahuser.php");
    } else if ($include == "konfirmasi-edit-user") {
      // konfirmasi edit user
      include("include/konfirmasiedituser.php");
    } else if ($include == "konfirmasi-ubah-password") {
      // konfirmasi ubah password
      include("include/konfirmasiubahpassword.php");
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head.php") ?>
</head>

<?php
// cek ada get include
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  //cek apakah ada session id admin
  if (isset($_SESSION['id_user'])) {
    ?>
    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php 
            if ($include == "edit-profil") {
                // edit profil
                include("include/editprofil.php");
            } else if ($include == "kategori-buku") {
                // kategori buku
                include("include/kategoribuku.php");
            } else if ($include == "tambah-kategori-buku") {
                // tambah kategori buku
                include("include/tambahkategoribuku.php");
            } else if ($include == "edit-kategori-buku") {
                // edit kategori buku
                include("include/editkategoribuku.php");
            } else if ($include == "tag") {
                // tag
                include("include/tag.php");
            } else if ($include == "tambah-tag") {
                // tambah tag
                include("include/tambahtag.php");
            } else if ($include == "edit-tag") {
                // edit tag
                include("include/edittag.php");
            } else if ($include == "penerbit") {
                // penerbit
                include("include/penerbit.php");
            } else if ($include == "tambah-penerbit") {
                // tambah penerbit
                include("include/tambahpenerbit.php");
            } else if ($include == "edit-penerbit") {
                // edit penerbit
                include("include/editpenerbit.php");
            } else if ($include == "kategori-blog") {
                // kategori blog
                include("include/kategoriblog.php");
            } else if ($include == "tambah-kategori-blog") {
                // tambah kategori blog
                include("include/tambahkategoriblog.php");
            } else if ($include == "edit-kategori-blog") {
                // edit kategori blog
                include("include/editkategoriblog.php");
            } else if ($include == "buku") {
                // buku
                include("include/buku.php");
            } else if ($include == "detail-buku") {
                // detail buku
                include("include/detailbuku.php");
            } else if ($include == "tambah-buku") {
                // tambah buku
                include("include/tambahbuku.php");
            } else if ($include == "edit-buku") {
                // edit buku
                include("include/editbuku.php");
            } else if ($include == "konten") {
                // konten
                include("include/konten.php");
            } else if ($include == "detail-konten") {
                // detail konten
                include("include/detailkonten.php");
            } else if ($include == "tambah-konten") {
                // tambah konten
                include("include/tambahkonten.php");
            } else if ($include == "edit-konten") {
                // edit konten
                include("include/editkonten.php");
            } else if ($include == "blog") {
                // blog
                include("include/blog.php");
            } else if ($include == "detail-blog") {
                // detail blog
                include("include/detailblog.php");
            } else if ($include == "tambah-blog") {
                // tambah blog
                include("include/tambahblog.php");
            } else if ($include == "edit-blog") {
                // edit blog
                include("include/editblog.php");
            } else if ($include == "user") {
                // user
                include("include/user.php");
            } else if ($include == "detail-user") {
                // detail user
                include("include/detailuser.php");
            } else if ($include == "tambah-user") {
                // tambah user
                include("include/tambahuser.php");
            } else if ($include == "edit-user") {
                // edit user
                include("include/edituser.php");
            } else if ($include == "ubah-password") {
                // ubah password
                include("include/ubahpassword.php");
            } else {
                // profil
                include("include/profil.php");
            }  
          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
    <?php
  } else {
    // pemanggilan halaman form login
    include("include/login.php");
  }  
} else {
  if (isset($_SESSION['id_user'])) {
  // pemanggilan ke halaman-halaman profil jika ada session
  ?>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include("includes/header.php") ?>
      <?php include("includes/sidebar.php") ?>
      <div class="content-wrapper">
      <?php
        //pemanggilan profil
        include("include/profil.php");
      ?>
      </div>
      <!-- /.content-wrapper -->
      <?php include("includes/footer.php") ?>
    </div>
    <!-- ./wrapper -->
    <?php include("includes/script.php") ?>
  </body>
  <?php
  } else {
  // pemanggilan halaman form login
    include("include/login.php");
  } 
}
?>

</html>