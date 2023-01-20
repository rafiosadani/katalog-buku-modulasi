<?php
    if (isset($_SESSION['id_konten'])) {
        $id_konten = $_SESSION['id_konten'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tanggal = $_POST['tanggal'];

        if (empty($judul) && empty($isi) && empty($tanggal)) {
            header("Location:index.php?include=edit-konten&data=" . $id_konten . "&notif=formkosong");
        } else if (empty($judul)) {
            header("Location:index.php?include=edit-konten&data=" . $id_konten . "&notif=editkosong&jenis=judul");
        } else if (empty($isi)) {
            header("Location:index.php?include=edit-konten&data=" . $id_konten . "&notif=editkosong&jenis=isi");
        } else if (empty($tanggal)) {
            header("Location:index.php?include=edit-konten&data=" . $id_konten . "&notif=editkosong&jenis=tanggal");
        } else {
            $sql = "UPDATE `konten` SET `judul` = '$judul', `isi` = '$isi', `tanggal` = '$tanggal' WHERE `id_konten` = '$id_konten'";

            mysqli_query($koneksi, $sql);
            unset($_SESSION['id_konten']);
            header("Location:index.php?include=konten&notif=editberhasil");
        }
    }
?>