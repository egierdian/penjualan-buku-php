<!doctype html>
<html lang="en">
<?php
session_start();
include 'konfig.php';
include 'cek.php';
?>

<head>
    <title>Tables | Klorofil - Free Bootstrap Dashboard Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="index.html"><img src="../assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>

                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['nama']  ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                        <!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="index.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="buku.php" class=""><i class="lnr lnr-file-empty"></i> <span>Buku</span></a></li>
                        <li><a href="transaksi.php" class=""><i class="lnr lnr-file-empty"></i> <span>Transaksi</span></a></li>
                        <li><a href="logout.php" class=""><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Data Buku</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- TABLE HOVER -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <a class="text-left" href="tambah_buku.php">
                                        <h3 class="panel-title">Tambah Buku</h3>
                                    </a>
                                
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judul</th>
                                                <th>Tahun</th>
                                                <th>Harga</th>
                                                <th style="text-align: center;">Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // menjalankan query untuk menampilkan semua dataa diurutkan berdasarkan id
                                            $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

                                            // Jumlah data per halaman
                                            $limit = 5;

                                            $limitStart = ($page - 1) * $limit;

                                            $result = mysqli_query($koneksi, "SELECT * FROM buku LIMIT " . $limitStart . "," . $limit);

                                            $no = $limitStart + 1;

                                            // inisialisasi untuk mengurutkan data.
                                            $nodata = 1;
                                            // hasil query disimpan dalam bentuk array
                                            // melakukan looping untuk mencetak data.
                                            while ($row = mysqli_fetch_array($result)) {

                                            ?>

                                                <tr>
                                                    <td><?php echo $nodata; ?></td>
                                                    <td><?php echo $row['judul']; ?></td>
                                                    <td><?php echo $row['tahun_terbit']; ?></td>
                                                    <td><?php echo $row['harga']; ?></td>

                                                    <td style="text-align: center;"><img src="../gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
                                                    <td>
                                                        <a href="edit_buku.php?id=<?php echo $row['ID']; ?>">Edit</a> |
                                                        <a href="proses_hapus.php?id=<?php echo $row['ID']; ?>" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus</a>
                                                    </td>
                                                </tr>

                                            <?php
                                                $nodata++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="text-black">
                                        <ul class="pagination">
                                            <?php
                                            // Jika page = 1, maka LinkPrev disable
                                            if ($page == 1) {
                                            ?>
                                                <!-- link Previous Page disable -->
                                                <li class="disabled"><a href="#">Previous</a></li>
                                            <?php
                                            } else {
                                                $LinkPrev = ($page > 1) ? $page - 1 : 1;
                                            ?>
                                                <!-- link Previous Page -->
                                                <li><a href="buku.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            $result = mysqli_query($koneksi, "SELECT * FROM buku");

                                            //Hitung semua jumlah data yang berada pada tabel Sisawa
                                            $JumlahData = mysqli_num_rows($result);

                                            // Hitung jumlah halaman yang tersedia
                                            $jumlahPage = ceil($JumlahData / $limit);

                                            // Jumlah link number 
                                            $jumlahNumber = 1;

                                            // Untuk awal link number
                                            $startNumber = ($page > $jumlahNumber) ? $page - $jumlahNumber : 1;

                                            // Untuk akhir link number
                                            $endNumber = ($page < ($jumlahPage - $jumlahNumber)) ? $page + $jumlahNumber : $jumlahPage;

                                            for ($i = $startNumber; $i <= $endNumber; $i++) {
                                                $linkActive = ($page == $i) ? ' class="active"' : '';
                                            ?>
                                                <li<?php echo $linkActive; ?>><a href="buku.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                <?php
                                            }
                                                ?>

                                                <!-- link Next Page -->
                                                <?php
                                                if ($page >= $jumlahPage) {
                                                ?>
                                                    <li class="disabled"><a href="#">Next</a></li>
                                                <?php
                                                } else {
                                                    $linkNext = ($page < $jumlahPage) ? $page + 1 : $jumlahPage;
                                                ?>
                                                    <li><a href="buku.php?page=<?php echo $linkNext; ?>">Next</a></li>
                                                <?php
                                                }
                                                ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- END TABLE HOVER -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
                </p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../assets/scripts/klorofil-common.js"></script>
</body>

</html>