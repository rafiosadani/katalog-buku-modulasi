<?php
    if (isset($_SESSION['id_penerbit'])) {
        $id_penerbit = $_SESSION['id_penerbit'];
        $penerbit = $_POST['penerbit'];
        $alamat = $_POST['alamat'];

        if (empty($penerbit) && empty($alamat)) {
            header("Location:index.php?include=edit-penerbit&data=" . $id_penerbit . "&notif=editkosong");
        } else if (empty($penerbit)) {
            header("Location:index.php?include=edit-penerbit&data=" . $id_penerbit . "&notif=penerbitkosong");
        } else if (empty($alamat)) {
            header("Location:index.php?include=edit-penerbit&data=" . $id_penerbit . "&notif=alamatkosong");
        } else {
            $sql = "UPDATE `penerbit` SET `penerbit` = '$penerbit', `alamat` = '$alamat' WHERE `id_penerbit` = '$id_penerbit'";

            mysqli_query($koneksi, $sql);
            unset($_SESSION['id_penerbit']);
            header("Location:index.php?include=penerbit&notif=editberhasil");
        }
    }
?>