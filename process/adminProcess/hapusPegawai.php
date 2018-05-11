<?php
	include_once '../../config/dbcon.php';
	
	$idPegawai = $_GET['id'];
	$queryHapus = "DELETE FROM pegawai WHERE idPegawai = '".$idPegawai."'";
	$sql = mysqli_query($conn, $queryHapus);
	
	if(!$sql){
		echo "<script> alert('Gagal Menghapus Data');location.href='../../pages/admin/homeAdmin2.php';</script>";
	}else{
		//header('Location:../../pages/admin/homeAdmin2.php');
		echo "<script> alert('Berhasil Menghapus Data');location.href='../../pages/admin/homeAdmin2.php';</script>";
	}
?>