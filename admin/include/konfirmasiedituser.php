<?php
    if (isset($_SESSION['id'])) {
        $id_user = $_SESSION['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $passwordBaru = $_POST['password'];
        $level = $_POST['level'];
        $password = "";

        // get password dan foto 
        $sql_f = "SELECT `password`, `foto` FROM `user` WHERE `id_user` = '$id_user'";
        $query_f = mysqli_query($koneksi, $sql_f);
        while ($data_f = mysqli_fetch_row($query_f)) {
            $passwordLama = $data_f[0];
            $foto = $data_f[1];
        }

        if (empty($nama) && empty($email) && empty($username) && empty($password) && empty($level)) {
            header("Location:index.php?include=edit-user&data=" . $id_user . "&notif=formkosong");
        } else if(empty($nama)) {
            header("Location:index.php?include=edit-user&data=" . $id_user . "&notif=editkosong&jenis=nama");
        } else if(empty($email)) {
            header("Location:index.php?include=edit-user&data=" . $id_user . "&notif=editkosong&jenis=email");
        } else if(empty($username)) {
            header("Location:index.php?include=edit-user&data=" . $id_user . "&notif=editkosong&jenis=username");
        } else if(empty($level)) {
            header("Location:index.php?include=edit-user&data=" . $id_user . "&notif=editkosong&jenis=level");
        } else {
            $lokasi_file = $_FILES["foto"]["tmp_name"];
            $nama_file_foto = $_FILES["foto"]["name"];
            $rand = rand();
            $nama_file = $rand . '_' . $nama_file_foto;
            $direktori = "foto/".$nama_file;

            if (move_uploaded_file($lokasi_file, $direktori)) {
                if (!empty($foto)) {
                    unlink("foto/$foto");
                }

                if (!empty($passwordBaru)) {
                    if($passwordLama === md5($passwordBaru)) {
                        header("Location:index.php?include=edit-user&data=" . $id_user . "&notif=passwordsama");
                    } else {
                        $password = md5($passwordBaru);
                        $sql = "UPDATE `user` SET `nama` = '$nama', `email` = '$email', `username` = '$username',
                        `password` = '$password', `level` = '$level', `foto` = '$nama_file'
                        WHERE `id_user` = '$id_user'";

                        mysqli_query($koneksi, $sql);

                        if ($_SESSION['id_user'] == $id_user) {
                            session_unset();
                            header("Location:index.php");
                        } else {
                            header("Location:index.php?include=user&notif=editberhasil");
                        }
                    }
                } else {
                    $password = $passwordLama;
                    $sql = "UPDATE `user` SET `nama` = '$nama', `email` = '$email', `username` = '$username',
                    `password` = '$password', `level` = '$level', `foto` = '$nama_file'
                    WHERE `id_user` = '$id_user'";

                    mysqli_query($koneksi, $sql);
                    header("Location:index.php?include=user&notif=editberhasil");
                }             
            } else {
                if (!empty($passwordBaru)) {
                    if ($passwordLama === md5($passwordBaru)) {
                        header("Location:index.php?include=edit-user&data=" . $id_user . "&notif=passwordsama");
                    } else {
                        $password = md5($passwordBaru);
                        $sql = "UPDATE `user` SET `nama` = '$nama', `email` = '$email', `username` = '$username',
                        `password` = '$password', `level` = '$level' 
                        WHERE `id_user` = '$id_user'";

                        mysqli_query($koneksi, $sql);

                        if ($_SESSION['id_user'] == $id_user) {
                            session_unset();
                            header("Location:index.php");
                        } else {
                            header("Location:index.php?include=user&notif=editberhasil");
                        }
                    }
                } else {
                    $password = $passwordLama;
                    $sql = "UPDATE `user` SET `nama` = '$nama', `email` = '$email', `username` = '$username',
                    `password` = '$password', `level` = '$level' 
                    WHERE `id_user` = '$id_user'";

                    mysqli_query($koneksi, $sql);
                    header("Location:index.php?include=user&notif=editberhasil");
                }	
            }
        }
    }
?>