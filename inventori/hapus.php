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
	header('Location: inventori.php');
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tbl_inventori WHERE id = $id");
if($query){
	set_flash_message('sukses', 'Data berhasil dihapus!');
	header('Location: inventori.php');
} else die("gagal!" . mysqli_error($koneksi));

?>