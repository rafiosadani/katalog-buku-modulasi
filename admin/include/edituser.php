<?php 
  if (isset($_GET['data'])) {
    $id_user = $_GET['data'];
    $_SESSION['id'] = $id_user;

    // get data user
    $sql_m = "SELECT `nama`, `email`, `username`, `password`, `level`, `foto` 
              FROM `user` WHERE `id_user` = '$id_user'";
    $query_m = mysqli_query($koneksi, $sql_m);

    while ($data_m = mysqli_fetch_row($query_m)) {
      $nama = $data_m[0];
      $email = $data_m[1];
      $username = $data_m[2];
      $passwordLama = $data_m[3];
      $level = $data_m[4];
      $foto = $data_m[5];
    }
  }
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-edit"></i> Edit Data User</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=user">Data User</a></li>
          <li class="breadcrumb-item active">Edit Data User</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data User</h3>
    <div class="card-tools">
      <a href="index.php?include=user" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
    </div>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  </br>
  <div class="col-sm-10">
  <?php if (!empty($_GET['notif'])) { ?>
    <?php if ($_GET['notif'] == "formkosong") { ?>
      <div class="alert alert-danger" role="alert">Maaf form tidak boleh kosong, wajib di isi!</div>
    <?php } else if ($_GET['notif'] == "passwordsama") { ?>
      <div class="alert alert-danger" role="alert">Maaf password baru dengan password lama tidak boleh sama!</div>
    <?php } ?>
  <?php } ?>

  <?php if (!empty($_GET['notif']) && !empty($_GET['jenis'])) { ?>
    <?php if ($_GET['notif'] == "editkosong") { ?>
      <div class="alert alert-danger" role="alert">Maaf data <?= $_GET['jenis']; ?> wajib di isi!</div>
    <?php } ?>
  <?php } ?>
  </div>
  <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-edit-user" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $id_user; ?>">
  <input type="hidden" name="passwordLama" value="<?= $passwordLama; ?>">
  <div class="card-body">
      <div class="form-group row">
        <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-user-circle"></i> <u>Data User</u></span></label>
      </div>
      <div class="form-group row">
        <label for="foto" class="col-sm-3 col-form-label">Foto </label>
        <div class="col-sm-7">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="foto" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>  
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" name="nama" id="nama" value="<?= $nama; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-7">
          <input type="email" class="form-control" name="email" id="email" value="<?= $email; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="username" class="col-sm-3 col-form-label">Username</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" name="username" id="username" value="<?= $username; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" name="password" id="password" value="">
          <span class="text-danger" style="font-weight:lighter;font-size:12px">
            *Jangan diisi jika tidak ingin mengubah password</span>
        </div>
      </div>
      <div class="form-group row">
        <label for="level" class="col-sm-3 col-form-label">Level</label>
        <div class="col-sm-7">
          <select class="form-control" id="level" name="level">
            <?php if($level == "Superadmin") : ?>
            <option value="Superadmin" selected>Superadmin</option>
            <option value="Admin">Admin</option>
            <?php else : ?>
            <option value="Superadmin">Superadmin</option>
            <option value="Admin" selected>Admin</option>
            <?php endif; ?>
          </select>
        </div>
      </div>
      </div>
    </div>
  </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
      </div>  
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->
</section>
<!-- /.content -->