<?php
	session_start();
	
	if(isset($_SESSION['username'])){
		header('Location:../home.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LoginAdmin - Data Struktural</title>
    <link rel="icon" href="public/img/icon.ico">

    <!-- Bootstrap -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/master.css" rel="stylesheet">
 
  </head>
  <body>
    <div class="container">
	<div>
		<a class="btn btn-danger btn-sm pull-right" href="../../index.php" style="margin:10px">Back</a>
	</div>
      <div class="row jumbotron-container">
        <div class="col-md-5 col-md-offset-3">
          <div class="jumbotron center">
            <div class="logo-container">
              <h3>Login Admin</h3>
            </div>
            <div  class="input-group">
              <form action="../../process/adminProcess/loginAdminProcess.php" method="POST">

                <input type="text" name="username" class="form-control" placeholder="Username"/>
                <input type="password" name="password" class="form-control" placeholder="Password"/>
                <div class="submit-control">
                  <button class="btn btn-default submit" type="submit" value="submit" name="login" > Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../public/js/bootstrap.min.js"></script>
  </body>
</html>