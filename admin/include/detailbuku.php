<?php 
  if (isset($_GET['data'])) {
    $id_buku = $_GET['data'];
    $_SESSION['id_buku'] = $id_buku;

    $sql = "SELECT `buku`.`cover`, `kategori_buku`.`kategori_buku`, `buku`.`judul`,
              `buku`.`pengarang`, `penerbit`.`penerbit`, `buku`.`tahun_terbit`, `buku`.`sinopsis` 
              FROM `buku` 
              INNER JOIN `kategori_buku` ON `buku`.`id_kategori_buku` = `kategori_buku`.`id_kategori_buku` 
              INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` 
              WHERE `buku`.`id_buku` = $id_buku";
    $query = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_row($query)) {
      $cover = $data[0];
      $kategori_buku = $data[1];
      $judul = $data[2];
      $pengarang = $data[3];
      $penerbit = $data[4];
      $tahun_terbit = $data[5];
      $sinopsis = $data[6];
    } 
  }
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-user-tie"></i> Detail Data Buku</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=profil">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php?include=buku">Data Buku</a></li>
          <li class="breadcrumb-item active">Detail Data Buku</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="index.php?include=buku" class="btn btn-sm btn-warning float-right">
        <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
          <tbody>                      
            <tr>
              <td><strong>Cover Buku<strong></td>
              <td><img src="cover/<?= $cover; ?>" class="img-fluid" width="200px;"></td>
            </tr>               
            <tr>
              <td width="20%"><strong>Kategori Buku<strong></td>
              <td width="80%"><?= $kategori_buku; ?></td>
            </tr>                 
            <tr>
              <td width="20%"><strong>Judul<strong></td>
              <td width="80%"><?= $judul; ?></td>
            </tr>                 
            <tr>
              <td width="20%"><strong>Pengarang<strong></td>
              <td width="80%"><?= $pengarang; ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>Penerbit<strong></td>
              <td width="80%"><?= $penerbit; ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>Tahun Terbit<strong></td>
              <td width="80%"><?= $tahun_terbit; ?></td>
            </tr>
            <tr>
              <td><strong>Tag<strong></td>
              <td>
                <ul>
                <?php
                  // get tag
                  $sql_h = "SELECT `tag`.`tag`
                            FROM `tag_buku`
                            INNER JOIN `tag` ON `tag_buku`.`id_tag` = `tag`.`id_tag` 
                            WHERE `tag_buku`.`id_buku` = '$id_buku'";
                  $query_h = mysqli_query($koneksi, $sql_h);
                  while ($data_h = mysqli_fetch_row($query_h)) {
                    $tag = $data_h[0];
                ?>
                  <li><?= $tag; ?></li>
                <?php } ?>
                </ul>
              </td>
            </tr>
            <tr>
              <td width="20%"><strong>Sinopsis<strong></td>
              <td width="80%"><?= $sinopsis; ?></td>
            </tr> 
          </tbody>
        </table>  
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">&nbsp;</div>
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->