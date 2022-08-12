<?php 

// panggil file yang dibutuhkan
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';


// ambil semua data atau value dari form
$nama     = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

// cek apakah data sudah diisi atau belum
if($nama == '' && $username == '' && $password == '' && $password2 == ''){
	set_flash_message('gagal', 'Semua data wajib diisi!');
	header('Location: register.php');
	die();
}

$cek_username = mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE username = '$username'");
if($cek_username->num_rows == 0){
	// konfirmasi password
	if($password == $password2){
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$query = mysqli_query($koneksi, "INSERT INTO tbl_users (nama, username, password) VALUES('$nama', '$username', '$password_hash')");
		if($query == TRUE){
			set_flash_message('sukses', 'Pendaftaran berhasil! Silahkan login!');
			header('Location: login.php');
		} else die(mysqli_error($koneksi));
	} else {
		set_flash_message('gagal', 'Password tidak sama!');
		header('Location: register.php');
	}
} else {
	
	set_flash_message('gagal', 'Username sudah terdaftar!');
	header('Location: register.php');
}




?>