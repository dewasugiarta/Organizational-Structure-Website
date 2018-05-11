<?php
	include_once '../config/dbcon.php';
	
	if(isset($_GET['status'])=="get"){
		$idAtasan = $_GET['idAtasan'];
		$idPegawai = $_GET['idPegawai'];
	}else{
		$idAtasan = $_POST['idAtasan'];
		$idPegawai = $_POST['idPegawai'];
	}

	$queryTambah = "INSERT INTO bawahan (idAtasan, idPegawai)".		
	"VALUES ($idAtasan , $idPegawai)";
	$sql = mysqli_query($conn,$queryTambah);
	
	if(!$sql){
		echo "<script> location.href='../pages/home.php';alert('Gagal tambah Bawahan');</script>";
	}else{
		echo "<script> location.href='../pages/home.php';alert('Berhasil Menambahkan Bawahan');</script>";
	}

?>