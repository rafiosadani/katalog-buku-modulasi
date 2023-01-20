<?php

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "katalog_buku";

$koneksi = mysqli_connect($host, $user, $pass, $db_name);

if (!$koneksi) {
    echo "Eror : " . mysqli_connect_errno();
}
