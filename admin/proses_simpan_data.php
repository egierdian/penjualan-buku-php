<?php
include 'konfig.php';

$idtransaksi = $_POST['notransaksi'];
$tanggal = $_POST['tanggal'];
// $total = $_POST['total'];

$query = "INSERT INTO head_transaksi VALUES ('$idtransaksi','$tanggal','4929429')";
mysqli_query($koneksi, $query);

?>