<?php 
  if (isset($_GET['data'])) {
    $id_user = $_GET['data'];
    $_SESSION['id'] = $id_user;

    // get data user
    $sql_m = "SELECT `nama`, `email`, `username`, `level`, `foto` 
              FROM `user` WHERE `id_user` = '$id_user'";
    $query_m = mysqli_query($koneksi, $sql_m);

    while ($data_m = mysqli_fetch_row($query_m)) {
      $nama = $data_m[0];
      $email = $data_m[1];
      $username = $data_m[2];
      $level = $data_m[3];
      $foto = $data_m[4];
    }
  }
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-user-tie"></i> Detail Data User</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=profil">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php?include=user">Data User</a></li>
          <li class="breadcrumb-item active">Detail Data User</li>
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
        <a href="index.php?include=user" class="btn btn-sm btn-warning float-right">
        <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
          <tbody>  
            <tr>
              <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Data User<strong></td>
            </tr>                      
            <tr>
              <td><strong>Foto User<strong></td>
              <td><img src="foto/<?= $foto; ?>" class="img-fluid" width="200px;"></td>
            </tr>               
            <tr>
              <td width="20%"><strong>Nama<strong></td>
              <td width="80%"><?= $nama; ?></td>
            </tr>                 
            <tr>
              <td width="20%"><strong>Email<strong></td>
              <td width="80%"><?= $email; ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>Level<strong></td>
              <td width="80%"><?= $level; ?></td>
            </tr>                 
            <tr>
              <td width="20%"><strong>Username<strong></td>
              <td width="80%"><?= $username; ?></td>
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