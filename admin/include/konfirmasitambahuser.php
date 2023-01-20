<?php
    // mengambil data yang dikirim
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $password = md5($pass);
    $level = $_POST['level'];

    // foto
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file_foto = $_FILES['foto']['name'];
    $rand = rand();
    $nama_file = $rand . '_' . $nama_file_foto;
    $direktori = 'foto/'.$nama_file;

    if (empty($nama) && empty($email) && empty($username) && empty($password) && empty($level) && empty($nama_file)) {
        header("Location:index.php?include=tambah-user&notif=formkosong");
    } else if (empty($nama)) {	   
        header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=nama");
    } else if(empty($email)) {
        header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=email");
    } else if(empty($username)) {	    
        header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=username");
    } else if(empty($pass)) {
        header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=password");
    } else if(empty($level)) {
        header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=level");
    } else if(!move_uploaded_file($lokasi_file, $direktori)) {
        header("Location:index.php?include=tambah-user&notif=fotokosong");
    } else {  
        // query insert data user
        $sql = "INSERT INTO `user` (`nama`, `email`, `username`, `password`, `level`, `foto`)
                VALUES ('$nama', '$email', '$username', '$password', '$level', '$nama_file')";
        
        // insert data user
        mysqli_query($koneksi, $sql);
        header("Location:index.php?include=user&notif=tambahberhasil");
    }
?>