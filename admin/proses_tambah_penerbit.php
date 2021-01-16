<?php
include 'konfig.php';

$nama = $_POST['nama_penerbit'];

if($nama == ""){
    echo "<script> 
        alert('Lengkapi data');
    </script>";
} else {
    $query = "INSERT INTO penerbit(nama_penerbit) VALUES ('$nama')";
    mysqli_query($koneksi, $query);
    echo "<script>alert('Data berhasil ditambah.');
                    window.location='penerbit.php';
                </script>";
}
?>