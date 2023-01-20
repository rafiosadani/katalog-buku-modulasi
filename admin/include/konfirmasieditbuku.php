<?php
if(isset($_SESSION['id_buku'])){
	$id_buku = $_SESSION['id_buku'];

    // mengambil data yang dikirim
    $id_kategori_buku = $_POST['kategori_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $id_penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis = addslashes($_POST['sinopsis']);
    $tag = $_POST['tag'];

    // gambar cover
    $lokasi_file = $_FILES['cover']['tmp_name'];
    $nama_file_cover = $_FILES['cover']['name'];
    $rand = rand();
    $nama_file = $rand . '_' . $nama_file_cover;
    $direktori = 'cover/'.$nama_file;

    // get cover
    $sql_c = "SELECT `cover` FROM `buku` WHERE `id_buku` = '$id_buku'";
    $query_c = mysqli_query($koneksi, $sql_c);
    while ($data_c = mysqli_fetch_row($query_c)) {
        $cover = $data_c[0];
    }

	if (empty($id_kategori_buku) && empty($judul) && empty($pengarang) && empty($id_penerbit) && empty($tahun_terbit)) {
        header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=formkosong");
    } else if (empty($id_kategori_buku)) {
        header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=editkosong&jenis=kategori buku");
    } else if(empty($judul)) {
        header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=editkosong&jenis=judul");
    } else if(empty($pengarang)) {	    
        header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=editkosong&jenis=pengarang");
    } else if(empty($id_penerbit)) {
        header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=editkosong&jenis=penerbit");
    } else if(empty($tahun_terbit)) {
        header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=editkosong&jenis=tahun terbit");
    } else if(empty($tag)) {
        header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=editkosong&jenis=tag");
    } else {
		if (move_uploaded_file($lokasi_file, $direktori)) {
            if (!empty($cover)) {
				unlink("cover/$cover");
            }
			$sql = "UPDATE `buku` SET `id_kategori_buku` = '$id_kategori_buku', `judul` = '$judul', `pengarang` = '$pengarang',
                    `id_penerbit` = '$id_penerbit', `tahun_terbit` = '$tahun_terbit', `sinopsis` = '$sinopsis', `cover` = '$nama_file' 
                    WHERE `id_buku` = '$id_buku'";
				mysqli_query($koneksi, $sql);
		} else {
			$sql = "UPDATE `buku` SET `id_kategori_buku` = '$id_kategori_buku', `judul` = '$judul', `pengarang` = '$pengarang',
                    `id_penerbit` = '$id_penerbit', `tahun_terbit` = '$tahun_terbit', `sinopsis` = '$sinopsis' 
                    WHERE `id_buku` = '$id_buku'";
			mysqli_query($koneksi, $sql);
		}

        // hapus tag buku
        $sql_d = "DELETE FROM `tag_buku` WHERE `id_buku` = '$id_buku'";
        mysqli_query($koneksi, $sql_d);

        // tambah tag buku
        if (!empty($_POST['tag'])) {
            foreach($_POST['tag'] as $id_tag){
                $sql_i = "INSERT INTO `tag_buku` (`id_buku`, `id_tag`) VALUES ('$id_buku', '$id_tag')";
                mysqli_query($koneksi, $sql_i);
            }
        }
		header("Location:index.php?include=buku&notif=editberhasil");
	}
}
?>