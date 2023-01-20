<?php

use kcfinder\session;

    if (isset($_SESSION['id_user'])) {
        $id_user = $_SESSION['id_user'];
        $passwordLama = md5($_POST['pass_lama']);
        $passwordBaru = $_POST['pass_baru'];
        $konfirmasiPassword = $_POST['konfirmasi_pass'];

        if (empty($passwordLama)) {
            header("Location:index.php?include=ubah-password&notif=passlamakosong");
        } else if (empty($passwordBaru)) {
            header("Location:index.php?include=ubah-password&notif=passbarukosong");
        } else if (empty($konfirmasiPassword)) {
            header("Location:index.php?include=ubah-password&notif=konfirmasipasskosong");
        } else {
            // get password dan foto 
            $sql_f = "SELECT `password` FROM `user` WHERE `id_user` = '$id_user'";
            $query_f = mysqli_query($koneksi, $sql_f);
            while ($data_f = mysqli_fetch_row($query_f)) {
                $passwordLamadb = $data_f[0];
            }

            if ($passwordLama != $passwordLamadb) {
                header("Location:index.php?include=ubah-password&notif=passwordlamatidaksama");
            } else {
                if ($_POST['pass_lama'] == $passwordBaru) {
                    header("Location:index.php?include=ubah-password&notif=passwordsamadenganbaru");
                } else {
                    if ($passwordBaru != $konfirmasiPassword) {
                        header("Location:index.php?include=ubah-password&notif=passwordbarutidaksama");
                    } else {
                        // password lolos
                        $passwordFix = md5($passwordBaru);
                        $sql = "UPDATE `user` SET `password` = '$passwordFix' 
                                WHERE `id_user` = '$id_user'";
                        mysqli_query($koneksi, $sql);
                        
                        // menghapus session
                        session_unset();
                        
                        // diarahkan ke halaman login
                        header("Location:index.php");
                    }
                }
            }
        }
    }
?>