<?php
	require_once'../config/dbcon.php';
	$idPegawai = $_POST['idPegawai'];
	$query = "SELECT * FROM pegawai WHERE idPegawai='".$idPegawai."'";
	$sql = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($sql);
	
	$id = $data['idPegawai'];
	$nama = $data['nama'];
	$jabatan = $data['jabatan'];
	$alamat = $data['alamat'];
	$kabupaten = $data['kabupaten'];
	$kecamatan = $data['kecamatan'];
	$desa = $data['desa'];
	$telepon = $data['telepon'];
	$userName = $data['userName'];
	
	$data = [
		'nama' => $nama,
		'jabatan' => 	$jabatan,
		'alamat' => 	$alamat,
		'kabupaten' => 	$kabupaten,
		'kecamatan' =>	$kecamatan,
		'desa' => 		$desa,
		'teleponBwh' =>	$telepon,
		'userNameBwh' =>	$userName
	];
	echo json_encode($data);
	
	
?>