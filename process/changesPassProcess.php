<?php
	include_once'../config/dbcon.php';
	session_start();
	
	if(!$_SESSION['username']){
		header('Location:../index.php');
	}else{
		$username = (string)$_SESSION['username'];
		$idPegawai = (string)$_SESSION['idPegawai'];
	}
	$currPass = $_POST['currPass'];
	$currPass = md5($currPass); 
	$newPass = $_POST['newPass'];
	$newPass = md5($newPass); 
	
	$sqlCheckPass = "SELECT userPass FROM pegawai WHERE idPegawai=".$idPegawai;
	$query =  mysqli_query($conn,$sqlCheckPass);
	$dataPass = mysqli_fetch_array($query);
	if($currPass !== $dataPass['userPass']){
		echo 	"<script>
					alert('Password Lama Anda Salah');location.href='../pages/changesPass.php';
				</script>
		"; 
	}else{
		$sqlUpdatePass = "UPDATE pegawai SET userPass='".$newPass."' WHERE idPegawai=$idPegawai";
		$queryUp =  mysqli_query($conn,$sqlUpdatePass);
		if($queryUp){
			echo "<script>
					alert('Rubah Password Sukses');location.href='../pages/home.php';
				 </script>";
		}else{
			echo "<script>
					alert('Gagal Merubah Password');location.href='../pages/changesPass.php';
				</script>
			"; 
		}
	}
	
?>