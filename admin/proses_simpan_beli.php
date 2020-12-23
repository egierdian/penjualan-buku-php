<?php
include 'konfig.php';

$idtransaksi = $_POST['notransaksi'];
$idbuku = $_POST['id_buku'];
$harga = $_POST['harga'];
$qty = $_POST['qty'];
$subtotal = $_POST['subtotal'];

if($idbuku == "" || $harga == "" || $qty == "" || $subtotal == ""){
    echo "<script> 
        alert('Lengkapi data');
    </script>";
} else {
    $query = "INSERT INTO detail_transaksi (no_transaksi, ID_buku, harga, jumlah_beli, subtotal) VALUES ('$idtransaksi','$idbuku','$harga','$qty','$subtotal')";
    mysqli_query($koneksi, $query);
}
?>