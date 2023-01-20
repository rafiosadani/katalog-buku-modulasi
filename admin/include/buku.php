<?php
  if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
      $id_buku = $_GET['data'];

      // get cover buku
      $sql_f = "SELECT `cover` FROM `buku` WHERE `id_buku` = '$id_buku'";
      $query_f = mysqli_query($koneksi, $sql_f);
      $jumlah_f = mysqli_num_rows($query_f);
      if ($jumlah_f > 0) {
        while ($data_f = mysqli_fetch_row($query_f)) {
          $cover = $data_f[0];
          // menghapus cover buku
          unlink("cover/$cover");
        }
      }

      // hapus tag buku
      $sql_dh = "DELETE FROM `tag_buku` WHERE `id_buku` = '$id_buku'";
      mysqli_query($koneksi, $sql_dh);
      
      // hapus data buku
      $sql_dm = "DELETE FROM `buku` WHERE `id_buku` = '$id_buku'";
      mysqli_query($koneksi, $sql_dm);
    }
  }

  // mereset data di halaman
  unset($_SESSION['katakunci_buku']);

  // mengambil keyword searching
  if (isset($_POST["katakunci"])) {
    $katakunci_buku = $_POST["katakunci"];
    $_SESSION['katakunci_buku'] = $katakunci_buku;
  }
  
  if (isset($_SESSION['katakunci_buku'])) {
    $katakunci_buku = $_SESSION['katakunci_buku'];
  }
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-book"></i> Buku</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"> Buku</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Buku</h3>
      <div class="card-tools">
        <a href="index.php?include=tambah-buku" class="btn btn-sm btn-info float-right">
        <i class="fas fa-plus"></i> Tambah Buku</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="col-md-12">
        <form method="post" action="index.php?include=buku">
          <div class="row">
              <div class="col-md-4 bottom-10">
                <input type="text" class="form-control" id="kata_kunci" name="katakunci">
              </div>
              <div class="col-md-5 bottom-10">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
              </div>
          </div><!-- .row -->
        </form>
      </div><br>
    <div class="col-sm-12">
      <?php if (!empty($_GET['notif'])) { ?>
        <?php if ($_GET['notif'] == "tambahberhasil") { ?>
          <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
        <?php } else if ($_GET['notif'] == "editberhasil") { ?>
          <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
        <?php } else if ($_GET['notif'] == "hapusberhasil") { ?>
          <div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>
        <?php } ?>
      <?php } ?>
    </div>
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th width="5%" style="text-align: center;">No</th>
              <th width="30%">Kategori</th>
              <th width="30%">Judul</th>
              <th width="20%">Penerbit</th>
              <th width="15%"><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
          <?php 
            // batas data per halaman
            $batas = 3;
            if (!isset($_GET['halaman'])) {
                $posisi = 0;
                $halaman = 1;
            } else {
                $halaman = $_GET['halaman'];
                $posisi = ($halaman - 1 ) * $batas;
            }

            $sql_k = "SELECT `buku`.`id_buku`, `buku`.`judul`,
                      `kategori_buku`.`kategori_buku`,
                      `penerbit`.`penerbit`
                      FROM `buku` 
                      INNER JOIN `kategori_buku` ON `buku`.`id_kategori_buku` = `kategori_buku`.`id_kategori_buku` 
                      INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit`";

            // jika kata kunci tidak kosong
            if (!empty($katakunci_buku)) {
                $sql_k .= " WHERE `kategori_buku`.`kategori_buku` LIKE '%$katakunci_buku%' OR 
                          `buku`.`judul` LIKE '%$katakunci_buku%' OR 
                          `penerbit`.`penerbit` LIKE '%$katakunci_buku%'";
            } 

            $sql_k .= " ORDER BY `kategori_buku`.`kategori_buku`, `buku`.`judul` LIMIT $posisi, $batas";
            $query_k = mysqli_query($koneksi, $sql_k);

            $no = $posisi + 1;

            while ($data_k = mysqli_fetch_row($query_k)) {
              $id_buku = $data_k[0];
              $judul = $data_k[1];
              $kategori_buku = $data_k[2];
              $penerbit = $data_k[3];
          ?>
            <tr>
              <td align="center"><?= $no; ?></td>
              <td><?= $kategori_buku; ?></td>
              <td><?= $judul; ?></td>
              <td><?= $penerbit; ?></td>
              <td align="center">
                <a href="index.php?include=edit-buku&data=<?= $id_buku; ?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                <a href="index.php?include=detail-buku&data=<?= $id_buku; ?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                <a href="javascript:if(confirm('Anda yakin ingin menghapus data Buku <?= $judul; ?>?'))window.location.href = 'index.php?include=buku&aksi=hapus&data=<?= $id_buku; ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>                         
              </td>
            </tr>
          <?php $no++; } ?>
          </tbody>
        </table>  
    </div>
    <?php 
    // hitung semua data buku
    $sql_jum = "SELECT `buku`.`id_buku`, `buku`.`judul`,
              `kategori_buku`.`kategori_buku`,
              `penerbit`.`penerbit`
              FROM `buku` 
              INNER JOIN `kategori_buku` ON `buku`.`id_kategori_buku` = `kategori_buku`.`id_kategori_buku` 
              INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit`";

    // jika kata kunci tidak kosong
    if (!empty($katakunci_buku)) {
        $sql_jum .= " WHERE `kategori_buku`.`kategori_buku` LIKE '%$katakunci_buku%' OR 
                  `buku`.`judul` LIKE '%$katakunci_buku%' OR 
                  `penerbit`.`penerbit` LIKE '%$katakunci_buku%'";
    }
    
    $sql_jum .= " ORDER BY `kategori_buku`.`kategori_buku`, `buku`.`judul`";
    $query_jum = mysqli_query($koneksi, $sql_jum);
    $jum_data = mysqli_num_rows($query_jum);
    $jum_halaman = ceil($jum_data / $batas);
    ?>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
      <?php 
      if ($jum_halaman == 0) {
        // tidak ada halaman
      } else if ($jum_halaman == 1) {
        echo "<li class='page-item'><a class='page-link'>1</a></li>";
      } else {
        $sebelum = $halaman - 1;
        $setelah = $halaman + 1;

        if ($halaman != 1) {
          echo "<li class='page-item'><a class='page-link' href='index.php?include=buku&halaman=1'>First</a></li>";
          echo "<li class='page-item'><a class='page-link' href='index.php?include=buku&halaman=$sebelum'>«</a></li>";
        }
        for ($i = 1; $i <= $jum_halaman; $i++) {
            if ($i > $halaman - 5 and $i < $halaman + 5 ) {
              if ($i != $halaman) { 
                echo "<li class='page-item'><a class='page-link' href='index.php?include=buku&halaman=$i'>$i</a></li>";
              } else {
                echo "<li class='page-item'><a class='page-link'>$i</a></li>";
              }
            }
        }
        if ($halaman != $jum_halaman) {
          echo "<li class='page-item'><a class='page-link' href='index.php?include=buku&halaman=$setelah'>»</a></li>";
          echo "<li class='page-item'><a class='page-link' href='index.php?include=buku&halaman=$jum_halaman'>Last</a></li>";
        }          
      }
      ?>
      </ul>
    </div>
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->