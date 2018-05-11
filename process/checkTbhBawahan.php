<?php
	include_once '../config/dbcon.php';
	
	$idAtasan = $_POST['idAtasan'];
	$nama = $_POST['bwhNama'];
	$jabatan = $_POST['bwhJabatan'];
	$alamat = $_POST['bwhAlamat'];
	$kabupaten = $_POST['bwhKabupaten'];
	$kecamatan = $_POST['bwhKecamatan'];
	$desa = $_POST['bwhDesa'];
	$telepon = $_POST['bwhTelepon'];
	$password = $_POST['bwhTelepon'];
	$username = $_POST['bwhUsername'];
	//echo "$idAtasan | $nama | $jabatan | $alamat | $kabupaten | $kecamatan | $desa |  $telepon | $username";
	
	
	$queryCheck = "SELECT idPegawai, nama, jabatan, telepon FROM pegawai WHERE nama LIKE '%".$nama."%' AND telepon LIKE '".$telepon."' AND jabatan LIKE '".$jabatan."'";
	$sqlCheck = mysqli_query($conn,$queryCheck);
	$dataCheck = mysqli_fetch_array($sqlCheck);
	$idPegawaiAda = $dataCheck['idPegawai'];
	
	
	if(mysqli_num_rows($sqlCheck)< 1){
		$hashedPass = md5($password);
		
		//insert user to database
		$sql = "INSERT INTO pegawai ".
		"(nama, jabatan, alamat, kabupaten, kecamatan, desa, telepon, userName, userPass)".
		"VALUE ('$nama','$jabatan','$alamat','$kabupaten','$kecamatan','$desa','$telepon','$username','$hashedPass')";
		$insert = mysqli_query($conn, $sql);
		
		//mengabil idpegawai baru untuk di bawak tabel relasi bawahan
		$querySelect = 'SELECT * FROM pegawai WHERE userName="'.$username.'"';
		$select = mysqli_query($conn, $querySelect);
		$dataSelect = mysqli_fetch_array($select);
		
		$idPegawai = $dataSelect['idPegawai'];
		
		if($insert){
			echo '<script> alert("Tambah Data Pegawai Berhasil");document.location.href = "../process/tambahBawahan.php?status=get&idAtasan='.$idAtasan.'&idPegawai='.$idPegawai.'";</script>';
		}else{
			echo "<script> alert('siTambah bawahan gagal');location.href='../pages/home.php';</script>";
		}
	}else{
		echo'
		<script>
			function myFunction() {
				var r = confirm("Data Pegawai Sudah Ada, \nLanjutkan tambah sebagai bawahan??\nNama : '.$nama.',\nJabatan : '.$jabatan.'");
				if (r == true) {
					document.location.href = "../process/tambahBawahan.php?status=get&idAtasan='.$idAtasan.'&idPegawai='.$idPegawaiAda.'";
				} else {
					document.location.href = "../pages/home.php";
				}
			}(myFunction());
		</script>

		';
	}
	
	
?>