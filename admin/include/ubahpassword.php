<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-user-lock"></i> Ubah Password</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"> Ubah Password</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Pengaturan Password</h3>
  </div>
  <br>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-ubah-password">
    <div class="card-body">
      <h6>
        <i class="text-blue"><i class="fas fa-info-circle"></i> Silahkan memasukkan password lama dan password baru Anda untuk mengubah password.</i>
      </h6>
      <?php if (!empty($_GET['notif'])) { ?>
        <?php if ($_GET['notif'] == "passwordlamatidaksama") { ?>
          <div class="alert alert-danger col-sm-10" role="alert">Maaf password lama tidak sama</div>
        <?php } else if ($_GET['notif'] == "passwordsamadenganbaru") { ?>
          <div class="alert alert-danger col-sm-10" role="alert">Maaf password lama sama dengan password baru</div>
        <?php } else if ($_GET['notif'] == "passwordbarutidaksama") { ?>
          <div class="alert alert-danger col-sm-10" role="alert">Maaf password baru tidak sama dengan konfirmasi password</div>
        <?php } ?>
      <?php } ?>
      <div class="form-group row">
        <label for="pass_lama" class="col-sm-3 col-form-label">Password Lama</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" id="pass_lama" name="pass_lama" value="">
          <?php if(!empty($_GET['notif'])) : ?>
            <?php if($_GET['notif'] == "passlamakosong") : ?>
              <span class="text-danger">Mohon maaf, password lama wajib diisi!</span>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="pass_baru" class="col-sm-3 col-form-label">Password Baru</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" id="pass_baru" name="pass_baru" value="">
          <?php if(!empty($_GET['notif'])) : ?>
            <?php if($_GET['notif'] == "passbarukosong") : ?>
              <span class="text-danger">Mohon maaf, password baru wajib diisi!</span>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="konfirmasi_pass" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" id="konfirmasi_pass" name="konfirmasi_pass" value="">
          <?php if(!empty($_GET['notif'])) : ?>
            <?php if($_GET['notif'] == "konfirmasipasskosong") : ?>
              <span class="text-danger">Mohon maaf, konfirmasi password baru wajib diisi!</span>
            <?php endif; ?>
          <?php endif; ?>
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