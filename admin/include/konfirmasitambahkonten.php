<?php 
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];

    if (empty($judul) && empty($isi) && empty($tanggal)) {
        header("Location:index.php?include=tambah-konten&notif=formkosong");
    } else if (empty($judul)) {
        header("Location:index.php?include=tambah-konten&notif=tambahkosong&jenis=judul");
    } else if (empty($isi)) {
        header("Location:index.php?include=tambah-konten&notif=tambahkosong&jenis=isi");
    } else if (empty($tanggal)) {
        header("Location:index.php?include=tambah-konten&notif=tambahkosong&jenis=tanggal");
    } else {
        $sql = "INSERT INTO `konten` (`judul`, `isi`, `tanggal`) VALUES ('$judul', '$isi', '$tanggal')";
        
        mysqli_query($koneksi, $sql);
        header("Location:index.php?include=konten&notif=tambahberhasil");
    }
?>