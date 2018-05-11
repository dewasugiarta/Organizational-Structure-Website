<?php
	include_once'../config/dbcon.php';
	
	$id = $_POST['id'];
	$nama = $_POST['updateNama'];
	$jabatan = $_POST['updateJabatan'];
	$alamat = $_POST['updateAlamat'];
	$kabupaten = $_POST['updateKabupaten'];
	$kecamatan = $_POST['updateKecamatan'];
	$desa = $_POST['updateDesa'];
	$telepon = $_POST['updateTelepon'];
	

	  $sqlUpdate = "UPDATE pegawai SET ".
	  "nama='$nama', jabatan='$jabatan',alamat='$alamat',".
	  "kabupaten='$kabupaten', kecamatan='$kecamatan', ".
	  "desa='$desa', telepon='$telepon' WHERE idPegawai=$id";
	  
	  $query = mysqli_query($conn,$sqlUpdate);
	  
	  if($query){
		  echo "<script> alert('Update Data Berhasil');location.href='../pages/home.php';</script>";
	  }
	  else{
		  echo '<script> alert("Gagal Update Data!!!\nCoba Periksa Username");location.href="../pages/home.php";</script>';
		 // echo("ERROR : ".mysqli_error($conn).");
		  mysqli_close($conn);
	  }
	
?>