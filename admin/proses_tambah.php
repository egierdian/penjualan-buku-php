<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'konfig.php';

// membuat variabel untuk menampung data dari form
$judul   = $_POST['judul'];
$penerbit   = $_POST['id_penerbit'];
$pengarang   = $_POST['pengarang'];
$tahun   = $_POST['tahun'];
$harga   = $_POST['harga'];
$stok   = $_POST['stok'];
$gambar = $_FILES['gambar_produk']['name'];
if($judul == "" || $penerbit == "" || $pengarang== "" || $tahun == "" || $harga== "" || $stok== "" ){
    echo"<script>
        alert('Silahkan lengkapi data');
        window.location = 'tambah_buku.php';
    </script>";
} else {
    //cek dulu jika ada gambar produk jalankan coding ini
    if ($gambar != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar_produk']['tmp_name'];
        $angka_acak     = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            $uploaded = "C:/xampp/htdocs/php/penjualan-buku/gambar/";
            move_uploaded_file($file_tmp, $uploaded.$nama_gambar_baru);
            // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
            $query = "INSERT INTO buku (judul, id_penerbit, pengarang, tahun_terbit, harga, stok, gambar) VALUES ('$judul', '$penerbit', '$pengarang', '$tahun', '$harga', '$stok','$nama_gambar_baru')";
            $result = mysqli_query($koneksi, $query);
            // periska query apakah ada error
            if (!$result) {
                die("Error: " . mysqli_error($koneksi));
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                echo "<script>alert('Data berhasil ditambah.');
                    window.location='buku.php';
                </script>";
            } //memindah file gambar ke folder gambar

        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');
            window.location='tambah_buku.php';</script>";
        }
    } else {
        $query = "INSERT INTO buku (judul, id_penerbit, pengarang, tahun_terbit, harga, stok) VALUES ('$judul', '$penerbit', '$pengarang', '$tahun', '$harga', '$stok')";
        $result = mysqli_query($koneksi, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Error: " . mysqli_error($koneksi));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            echo "<script>alert('Data berhasil ditambah.');
            window.location='tambah_buku.php';
            </script>";
        }
    }
}

