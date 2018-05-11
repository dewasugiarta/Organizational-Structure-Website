<?php
	session_start();
	
	if(isset($_POST['login'])){
		include_once('../../config/dbcon.php');
		
		$user = mysqli_real_escape_string($conn, $_POST['username']);
		$pass = mysqli_real_escape_string($conn, $_POST['password']);
				
		$passCheck = md5($pass);
		$query=mysqli_query($conn, "SELECT * FROM admin WHERE userName='$user' && userPass='$passCheck'");
		$data=mysqli_fetch_array($query);

		if($data){
			$_SESSION['idAdmin'] = $data['idAdmin'];
			$_SESSION['userAdmin'] = $data['userName'];
			$_SESSION['status'] = "admin";
			header('Location: ../../pages/admin/homeAdmin2.php');
		}else{
			echo
			"<script>
                alert('Username Atau Password Salah');
                location.href='../../pages/admin/loginAdmin.php';
            </script>";
		}
	}else{
		header('Location: ../../pages/admin/loginAdmin.php');
	}
		
?>