<?php
include 'konfig.php';
$id = $_GET["id"];

$query = "delete from buku where ID='$id'";
$result = mysqli_query($koneksi, $query);

if(!$result){
    die("Gagal menghapus data buku ". mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Berhasil dihapus');
        window.location= 'buku.php';
    </script>";
}

?>