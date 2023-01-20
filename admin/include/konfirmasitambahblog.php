<?php 
    $id_kategori_blog = $_POST['kategori_blog'];
    $id_user = $_SESSION['id_user'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = date('Y-m-d');

    if (empty($id_kategori_blog) && empty($judul) && empty($isi)) {
        header("Location:index.php?include=tambah-blog&notif=formkosong");
    } else if (empty($id_kategori_blog)) {
        header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=kategori blog");
    } else if (empty($judul)) {
        header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=judul");
    } else if (empty($isi)) {
        header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=isi");
    } else {
        $sql = "INSERT INTO `blog` (`id_kategori_blog`, `id_user`, `tanggal`, `judul`, `isi`) 
                VALUES ('$id_kategori_blog', '$id_user', '$tanggal', '$judul', '$isi')";
        
        mysqli_query($koneksi, $sql);
        header("Location:index.php?include=blog&notif=tambahberhasil");
    }
?>