<?php
    // mengambil data yang dikirim
    $id_kategori_buku = $_POST['kategori_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $id_penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis = $_POST['sinopsis'];
    $tag = $_POST['tag'];

    // gambar cover
    $lokasi_file = $_FILES['cover']['tmp_name'];
    $nama_file_cover = $_FILES['cover']['name'];
    $rand = rand();
    $nama_file = $rand . '_' . $nama_file_cover;
    $direktori = 'cover/'.$nama_file;

    if (empty($id_kategori_buku) && empty($judul) && empty($pengarang) && empty($id_penerbit) && empty($tahun_terbit)) {
        header("Location:index.php?include=tambah-buku&notif=formkosong");
    } else if (empty($id_kategori_buku)) {	   
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=kategori buku");
    } else if(empty($judul)) {
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=judul");
    } else if(empty($pengarang)) {	    
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=pengarang");
    } else if(empty($id_penerbit)) {
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=penerbit");
    } else if(empty($tahun_terbit)) {
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=tahun terbit");
    } else if(empty($tag)) {
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=tag");
    } else if(!move_uploaded_file($lokasi_file, $direktori)) {
        header("Location:index.php?include=tambah-buku&notif=coverkosong");
    } else {  
        // query insert data buku
        $sql = "INSERT INTO `buku` (`id_kategori_buku`, `judul`, `pengarang`, `id_penerbit`, `tahun_terbit`, `sinopsis`, `cover`)
                VALUES ('$id_kategori_buku', '$judul', '$pengarang', '$id_penerbit', '$tahun_terbit', '$sinopsis', '$nama_file')";
        
        // insert data buku 
        mysqli_query($koneksi, $sql);
        $id_buku = mysqli_insert_id($koneksi);

        // jika tag tidak kosong
        if (!empty($_POST['tag'])) {
            // dilakukan perulangan
            foreach ($_POST['tag'] as $id_tag) {
                // query insert tag buku
                $sql_i = "INSERT INTO `tag_buku` (`id_buku`, `id_tag`) VALUES ('$id_buku', '$id_tag')";
                
                // insert tag buku 
                mysqli_query($koneksi, $sql_i);
            }
        }
        header("Location:index.php?include=buku&notif=tambahberhasil");
    }
?>