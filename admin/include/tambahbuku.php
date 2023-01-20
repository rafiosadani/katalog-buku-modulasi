<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-plus"></i> Tambah Buku</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=buku">Data Buku</a></li>
          <li class="breadcrumb-item active">Tambah Buku</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Buku</h3>
    <div class="card-tools">
      <a href="index.php?include=buku" class="btn btn-sm btn-warning float-right">
      <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
    </div>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  </br></br>
  <div class="col-sm-10">
  <?php if (!empty($_GET['notif'])) { ?>
    <?php if($_GET['notif'] == "formkosong") { ?>
      <div class="alert alert-danger" role="alert">Maaf form tidak boleh kosong, wajib di isi!</div>
    <?php } else if($_GET['notif'] == "coverkosong") { ?>
      <div class="alert alert-danger" role="alert">Maaf cover gambar harus diisi, pilih gambar terlebih dahulu!</div>
    <?php } ?>
  <?php } ?>

  <?php if (!empty($_GET['notif']) && !empty($_GET['jenis'])) { ?>
    <?php if ($_GET['notif'] == "tambahkosong") { ?>
      <div class="alert alert-danger" role="alert">Maaf data <?= $_GET['jenis']; ?> wajib di isi!</div>
    <?php } ?>
  <?php } ?>
  </div>
  <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-buku" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group row">
        <label for="foto" class="col-sm-3 col-form-label">Cover Buku </label>
        <div class="col-sm-7">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="cover" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>  
        </div>
      </div>
      <div class="form-group row">
        <label for="kategori_buku" class="col-sm-3 col-form-label">Kategori Buku</label>
        <div class="col-sm-7">
          <select class="form-control" id="kategori_buku" name="kategori_buku">
            <option value="0">- Pilih Kategori -</option>
            <?php
              $sql_k = "SELECT `id_kategori_buku`,`kategori_buku` FROM `kategori_buku` ORDER BY `kategori_buku`";
              $query_k = mysqli_query($koneksi, $sql_k);
              while ($data_k = mysqli_fetch_row($query_k)) {
                $id_kategori_buku = $data_k[0];
                $kategori_buku = $data_k[1];
            ?>
            <option value="<?= $id_kategori_buku; ?>"><?= $kategori_buku; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="judul" class="col-sm-3 col-form-label">Judul</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" name="judul" id="judul" value="">
        </div>
      </div>
      <div class="form-group row">
        <label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" name="pengarang" id="pengarang" value="">
        </div>
      </div>
      <div class="form-group row">
        <label for="penerbit" class="col-sm-3 col-form-label">Penerbit</label>
        <div class="col-sm-7">
          <select class="form-control" id="penerbit" name="penerbit">
            <option value="0">- Pilih Penerbit -</option>
            <?php
              $sql_p = "SELECT `id_penerbit`,`penerbit` FROM `penerbit` ORDER BY `penerbit`";
              $query_p = mysqli_query($koneksi, $sql_p);
              while ($data_p = mysqli_fetch_row($query_p)) {
                $id_penerbit = $data_p[0];
                $penerbit = $data_p[1];
            ?>
            <option value="<?= $id_penerbit; ?>"><?= $penerbit; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="datepicker-year" class="col-sm-3 col-form-label">Tahun Terbit</label>
        <div class="col-sm-7">
          <div class="input-group date">
            <input type="text" class="form-control" name="tahun_terbit" id="datepicker-year" autocomplete="off" value="">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="editor1" class="col-sm-3 col-form-label">Sinopsis</label>
        <div class="col-sm-7">
          <textarea class="form-control" name="sinopsis" id="editor1" rows="12"></textarea>
        </div>
      </div>          
      <div class="form-group row">
        <label for="hobi" class="col-sm-3 col-form-label">Tag</label>
        <div class="col-sm-7">
        <?php
          $sql_t = "SELECT `id_tag`,`tag` FROM `tag` ORDER BY `tag`";
          $query_t = mysqli_query($koneksi, $sql_t);
          while ($data_t = mysqli_fetch_row($query_t)) {
            $id_tag = $data_t[0];
            $tag = $data_t[1];
        ?>
        <input type="checkbox" name="tag[]" value="<?= $id_tag; ?>"> <?= $tag; ?> </br>
        <?php } ?>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
      </div>  
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->
</section>
<!-- /.content -->
