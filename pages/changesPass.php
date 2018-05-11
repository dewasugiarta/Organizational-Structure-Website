<?php
	session_start();
	
	if(!$_SESSION['username']){
		header('Location:../index.php');
	}else{
			$username = (string)$_SESSION['username'];
			$idPegawai = (string)$_SESSION['idPegawai'];
	}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ChangesPassword - Data Struktural</title>
    <link rel="icon" href="../public/img/icon.ico">

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/home.css" rel="stylesheet">
   
	
  </head>
  <body>
    <div class="container">
        <div class="row">

            <div class="col-md-5 col-md-offset-4">
			<h1>Rubah Password</h1>
			<div class="jumbotron center">
				<div  class="input-group">
					<form action="../process/changesPassProcess.php" method="POST">

						<input type="password" id="currPass" name="currPass" class="form-control" placeholder="Password Lama">

						<input type="password" id="newPass" name="newPass" class="form-control" placeholder="Password Baru">
						<sup id="message"></sup>
						<input type="password" id="confirmPass" name="confirmPass" class="form-control" placeholder="Konfirmasi Password">
						<div class="submit-control">
							<button id="submit" class="btn btn-default register" type="submit" value="submit" disabled name="submit"> Rubah </button>
							<a class="btn btn-default register" href="../pages/home.php"> Batal </a>
						</div
						
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(function() {
			$('#confirmPass').keyup(function(){
				if ($('#newPass').val() === $('#confirmPass').val()) {
					$('#submit').prop('disabled', false);
					$('#message').html('password match');
				} else {
					$('#submit').prop('disabled', true);
					$('#message').html('not match')
				}
			});
		});
			
	</script>
    <script src="../public/js/bootstrap.min.js"></script>
  </body>
</html>
