<?php
include 'konfig.php';

$idtransaksi = $_POST['notransaksi'];
$tanggal = $_POST['tanggal'];
$total = $_POST['total'];

if($idtransaksi == "" || $tanggal == "" || $total ==""){
    echo "<script> 
        alert('Lengkapi data');
    </script>";
} else {
    $query = "INSERT INTO head_transaksi VALUES ('$idtransaksi','$tanggal','$total')";
    mysqli_query($koneksi, $query);
}
?>