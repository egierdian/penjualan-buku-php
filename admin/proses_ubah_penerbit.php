<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'konfig.php';

// membuat variabel untuk menampung data dari form
$id = $_POST['id'];
$nama   = $_POST['nama_penerbit'];
if($nama == ""){
    echo"<script>
        alert('Data tidak boleh kosong');
        window.location = 'edit_penerbit.php?id=$id';
    </script>";
} else {
    $query = "UPDATE penerbit SET nama_penerbit='$nama' WHERE id=$id";
    $result = mysqli_query($koneksi, $query);
    echo "<script>alert('Data berhasil diubah.');
                    window.location='penerbit.php';
                </script>";
}
