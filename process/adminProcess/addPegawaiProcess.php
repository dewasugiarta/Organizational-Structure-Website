<?php
	if(isset($_POST['submit'])){
		include_once('../../config/dbcon.php');
		
		$nama = $_POST['nama'];
		$jabatan = $_POST['jabatan'];
		$alamat = $_POST['alamat'];
		$kabupaten = $_POST['kabupaten'];
		$kecamatan = $_POST['kecamatan'];
		$desa = $_POST['desa'];
		$telepon = $_POST['telepon'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//echo $nama.','.$jabatan.','.$alamat.','.$kabupaten.','.$kecamatan.','.$desa.','.$telepon.','.$username.','.$password;
		//check data
		if(empty($nama) || empty($jabatan) || empty($alamat) || empty($kabupaten) || empty($kecamatan) || empty($desa)||empty($telepon) || empty($username) || empty($password)){
			echo
				"<script>
					alert('data masih ada yang kosong');
					location.href='../../pages/admin/homeAdmin2.php';
				</script>";
			exit();
		}else{
			$sql = "SELECT * FROM pegawai WHERE userName='$username'";
			$result = mysqli_query($conn, $sql);
			$checkResult = mysqli_num_rows($result);

			if($checkResult > 0){
				echo
					"<script>
						alert('Username Sudah digunakan');
						location.href='../../pages/admin/homeAdmin2.php';
					</script>";
				exit();
			}else{
				$hashedPass = md5($password);
				
				//insert user to database
				$sql = "INSERT INTO pegawai ".
				"(nama, jabatan, alamat, kabupaten, kecamatan, desa, telepon, userName, userPass)".
				"VALUE ('$nama','$jabatan','$alamat','$kabupaten','$kecamatan','$desa','$telepon','$username','$hashedPass')";
				$insert = mysqli_query($conn, $sql);
				
				if($insert){
					echo "<script> alert('Registrasi Berhasil');location.href='../../pages/admin/homeAdmin2.php';</script>";
				}else{
					echo "<script> alert('simpan data gagal');location.href='../../pages/admin/homeAdmin2.php';</script>";
				}
			}
		}
	}else{
		header("Location: ../../pages/admin/homeAdmin2.php");
		exit();
	}
?>