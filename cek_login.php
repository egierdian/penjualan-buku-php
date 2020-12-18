<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'admin/konfig.php';

$username = $_POST['username'];
$password = $_POST['password'];
$pas = md5($password);
// $hak_akses = $_POST['hak_akses'];

// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($koneksi,"SELECT * FROM user where username='$username' and password='$password'");

$cek = mysqli_num_rows($result);

if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	//menyimpan session user, nama, status dan id login
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $data['nama'];
	header("location:admin/index.php");
} else {
    header("location:index.php?pesan=Gagal");
}
?>