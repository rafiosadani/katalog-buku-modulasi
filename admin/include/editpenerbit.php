<?php 
  if (isset($_GET['data'])) {
    $id_penerbit = $_GET['data'];
    $_SESSION['id_penerbit'] = $id_penerbit;
    
    // get data penerbit
    $sql_d = "SELECT `penerbit`, `alamat` FROM `penerbit` WHERE `id_penerbit` = '$id_penerbit'";
    $query_d = mysqli_query($koneksi, $sql_d);
    while ($data_d = mysqli_fetch_row($query_d)) {
      $penerbit = $data_d[0];
      $alamat = $data_d[1];
    }
  }
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-edit"></i> Edit Penerbit</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=penerbit">Penerbit</a></li>
          <li class="breadcrumb-item active">Edit Penerbit</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Penerbit</h3>
    <div class="card-tools">
      <a href="index.php?include=penerbit" class="btn btn-sm btn-warning float-right">
      <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
    </div>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  </br>
  <div class="col-sm-10">
  <?php if (!empty($_GET['notif'])) { ?>
    <?php if ($_GET['notif'] == "editkosong") { ?>
      <div class="alert alert-danger" role="alert">Maaf form tidak boleh kosong, wajib di isi!</div>
    <?php } else if ($_GET['notif'] == "penerbitkosong") { ?>
      <div class="alert alert-danger" role="alert">Maaf data penerbit wajib di isi!</div>
    <?php } else if ($_GET['notif'] == "alamatkosong") { ?>
      <div class="alert alert-danger" role="alert">Maaf data alamat wajib di isi!</div>
    <?php } ?>
  <?php } ?>
  </div>
  <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-edit-penerbit">
    <div class="card-body">
      <div class="form-group row">
        <label for="penerbit" class="col-sm-3 col-form-label">Penerbit</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $penerbit; ?>">
        </div>
      </div>
      <!-- <div class="form-group row">
        <label for="editor1" class="col-sm-3 col-form-label">Alamat</label>
        <div class="col-sm-7">
          <textarea class="form-control" name="alamat" id="editor1" rows="12"><?= $alamat; ?></textarea>
        </div>
      </div> -->
      <div class="form-group row">
        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
        <div class="col-sm-7">
          <textarea class="form-control" name="alamat" id="alamat" rows="8"><?= $alamat; ?></textarea>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
      </div>  
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->

</section>
<!-- /.content -->