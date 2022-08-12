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
	header('Location: mapel.php');
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tbl_mapel WHERE id = $id");
if($query){
	set_flash_message('sukses', 'Data berhasil dihapus!');
	header('Location: mapel.php');
} else die("gagal!" . mysqli_error($koneksi));

?>