<?php
    if (isset($_SESSION['id_blog'])) {
        $id_blog = $_SESSION['id_blog'];
        $id_kategori_blog = $_POST['kategori_blog'];
        $id_user = $_SESSION['id_user'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tanggal = date('Y-m-d');

        if (empty($id_kategori_blog) && empty($judul) && empty($isi)) {
            header("Location:index.php?include=edit-blog&data=" . $id_blog . "&notif=formkosong");
        } else if (empty($id_kategori_blog)) {
            header("Location:index.php?include=edit-blog&data=" . $id_blog . "&notif=editkosong&jenis=kategori blog");
        } else if (empty($judul)) {
            header("Location:index.php?include=edit-blog&data=" . $id_blog . "&notif=editkosong&jenis=judul");
        } else if (empty($isi)) {
            header("Location:index.php?include=edit-blog&data=" . $id_blog . "&notif=editkosong&jenis=isi");
        } else {
            $sql = "UPDATE `blog` SET `id_kategori_blog` = '$id_kategori_blog', `id_user` = '$id_user', 
                    `tanggal` = '$tanggal', `judul` = '$judul', `isi` = '$isi'
                    WHERE `id_blog` = '$id_blog'";

            mysqli_query($koneksi, $sql);
            unset($_SESSION['id_blog']);
            header("Location:index.php?include=blog&notif=editberhasil");
        }
    }
?>