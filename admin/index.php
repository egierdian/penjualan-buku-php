<!doctype html>
<html lang="en">
<?php
session_start();
include 'konfig.php';
include 'cek.php';

function rupiah($nilai)
{
	return number_format($nilai, 0, ',', '.');
}
?>

<head>
    <title>Erdian-Books | Aplikasi Sistem Administrasi Penjualan Buku</title>
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
				<a href="index.php"><img src="../assets/img/logo.png" alt="Erdian-Books" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">  <span><?php echo $_SESSION['nama']  ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
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
						<li><a href="index.php" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="buku.php" class=""><i class="lnr lnr-book"></i> <span>Buku</span></a></li>
						<li><a href="penerbit.php" class=""><i class="lnr lnr-book"></i> <span>Penerbit</span></a></li>
						<li><a href="transaksi.php" class=""><i class="lnr lnr-file-empty"></i> <span>Transaksi</span></a></li>
                        <li><a href="laporan.php" class=""><i class="lnr lnr-file-empty"></i> <span>Laporan</span></a></li>
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
					<div class="panel panel-headline">

						<div class="panel-heading">
							<h3 class="panel-title">Penjualan Buku</h3>
							<p class="panel-subtitle"></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<?php
								$query = "SELECT SUM(total) as total from head_transaksi";
								$result = mysqli_query($koneksi, $query);

								while ($row = mysqli_fetch_array($result)) {
								?>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-money"></i></span>
										<p>
											<span class="number"><?php echo "Rp " .rupiah($row['total']) ?></span>
											<span class="title">Total Nominal Transaksi</span>
										</p>
									</div>
								</div>
								<?php } ?>
								<?php
								$query = "SELECT SUM(jumlah_beli) as total from detail_transaksi";
								$result = mysqli_query($koneksi, $query);

								while ($row = mysqli_fetch_array($result)) {
								?>
									<div class="col-md-4">
										<div class="metric">
											<span class="icon"><i class="fa fa-shopping-bag"></i></span>
											<p>
												<span class="number"><?php echo rupiah($row['total']) ?></span>
												<span class="title">Item Terjual</span>
											</p>
										</div>
									</div>
								<?php } ?>
								<?php
								$query = "SELECT COUNT(*) as total from head_transaksi";
								$result = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($result)) {
								?>
									<div class="col-md-4">
										<div class="metric">
											<span class="icon"><i class="fa fa-bar-chart"></i></span>
											<p>
												<span class="number"><?php echo rupiah($row['total']) ?></span>
												<span class="title">Total Transaksi</span>
											</p>
										</div>
									</div>
								<?php } ?>
							</div>
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