<?php
	session_start();
	
	if(isset($_POST['login'])){
		include_once('../config/dbcon.php');
		
		$user = mysqli_real_escape_string($conn, $_POST['username']);
		$pass = mysqli_real_escape_string($conn, $_POST['password']);
	
		$passCheck = md5($pass);
		$query=mysqli_query($conn, "SELECT * FROM pegawai WHERE userName='$user' && userPass='$passCheck'");
		$data=mysqli_fetch_array($query);

		if($data){
			$_SESSION['idPegawai'] = $data['idPegawai'];
			$_SESSION['username'] = $data['userName'];
			header('Location: ../pages/home.php');
		}else{
			echo
			"<script>
                alert('Username Atau Password Salah');
                location.href='../index.php'
            </script>";
		}
	}
		
?>