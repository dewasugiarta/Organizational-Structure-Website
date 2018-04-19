<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login - Data Struktural</title>
    <link rel="icon" href="public/img/icon.ico">

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/master.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row jumbotron-container">
        <div class="col-md-5 col-md-offset-3">
          <div class="jumbotron center">
            <div class="logo-container">
              <img src="public/img/dps.png" class="logo" alt="logo">
            </div>
            <div  class="input-group">
              <form action="#" method="POST">

                <input type="text" name="username" class="form-control" placeholder="Username"/>
                <input type="password" name="pass" class="form-control" placeholder="Password"/>
                <div class="submit-control">
                  <button class="btn btn-default submit" type="submit" value="submit"> Login</button>
                  <strong>or</strong>
                  <a class="btn btn-default register" href="pages/signup.php"> Register </a>
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
    <script src="public/js/bootstrap.min.js"></script>
  </body>
</html>
