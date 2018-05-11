<?php
	include_once '../config/dbcon.php';
	
	$idBawahan = $_GET['id'];
	
	$queryHapus = "DELETE FROM bawahan WHERE idBawahan='".$idBawahan."'";
	$sql = mysqli_query($conn,$queryHapus);
	
	if(!$sql){
		echo "<script> alert('Gagal Menghapus Bawahan');location.href='../pages/home.php';</script>";
	}else{
		header('Location:../pages/home.php');
	}
?>