<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(!isset($_GET['id'])){
	header('Location: siswa.php');
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id = $id");
$siswa = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $_SESSION['app_name'] ?> - Ubah Data Siswa</title>
  <link href="../_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../_template/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
  	.input-group-text {
  		width: 45px;
  	}
  </style>
</head>
<body id="page-top">
	<div id="wrapper">
	<?php require_once 'sidebar.php'; ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
		<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<!-- Topbar Navbar -->
					<?php require_once 'topnav.php'; ?>
				</nav>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="clearfix">
						<h1 class="h3 mb-4 text-gray-800 float-left">Ubah Data Siswa</h1>
						<a href="siswa.php" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
								</div>
								<div class="card-body">
									<form action="proses_ubah.php?id=<?php echo $siswa['id'] ?>" method="POST">
										<div class="form-group">
											<label for="nis">NIS Siswa </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">#</div>
												</div>
												<input type="number" id="nis" class="form-control" placeholder="Masukan NIS" name="nis" autocomplete="off" required="required" value="<?php echo $siswa['nis'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="nama">Nama Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-user"></i></div>
												</div>
												<input type="text" id="nama" class="form-control" placeholder="Masukan Nama" name="nama" autocomplete="off" required="required" value="<?php echo $siswa['nama'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="agama">Agama Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-book-open"></i></div>
												</div>
												<select name="agama" id="agama" class="form-control">
													<option value="Kristen" <?php echo $siswa['agama'] == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
													<option value="Islam" <?php echo $siswa['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
													<option value="Buddha" <?php echo $siswa['agama'] == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
													<option value="Hindu" <?php echo $siswa['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
													<option value="Konghucu" <?php echo $siswa['agama'] == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="tempat_lahir">Tempat Lahir Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-globe"></i></div>
												</div>
												<input type="text" id="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir" name="tempat_lahir" autocomplete="off" required="required" value="<?php echo $siswa['tempat_lahir'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="tanggal_lahir">Tanggal Lahir Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
												</div>
												<input type="date" id="tanggal_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" name="tanggal_lahir" autocomplete="off" required="required" value="<?php echo $siswa['tanggal_lahir'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="alamat">Alamat Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
												</div>
												<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required="required" autocomplete="off"><?php echo $siswa['alamat']; ?></textarea>
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-sm" name="simpan"><i class="fas fa-save"></i> Simpan</button>
											<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->
			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright 2022 &copy; Dicky Kurniawan</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>

<!-- End of Page Wrapper -->
<script src="../_template/vendor/jquery/jquery.min.js"></script>
<script src="../_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../_template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../_template/js/sb-admin-2.min.js"></script>
</body>

</html>
