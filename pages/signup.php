<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register - Data Struktural</title>
    <link rel="icon" href="../public/img/icon.ico">

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/master.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row jumbotron-container-register">
        <div class="col-md-5 col-md-offset-3">
          <div class="jumbotron center">
            <div class="logo-container">
              <h2>Register User</h2>
            </div>
            <div  class="input-group">
              <form action="../process/signupProcess.php" method="POST"> 
                <!-- nama jabatan kabupaten/kota kecamatan desa alamat tlp -->
                <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required 
				oninvalid="this.setCustomValidity('Enter Name')" oninput="setCustomValidity('')"/>
                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan"/>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat"/>
                <select  id="kab" class="form-control" name="kabupaten">
                    
                </select>
                <select id="kec" class="form-control" name="kecamatan">
                    <option value="" disabled selected>Kecamatan</option>   
                </select>
                <select id="des" class="form-control" name="desa">
                    <option value="" disabled selected>Desa</option>  
                </select>
                <input type="tel" name="telepon" class="form-control" placeholder="Telepon">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
								<input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
								<p id="message"><p>
                <div class="submit-control">
                  <button id="register" class="btn btn-default register" type="submit" value="submit" disabled name="submit"> Register </button>
                  <a class="btn btn-default register" href="../index.php"> Batal </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(function(){
			let dataLokasi = {tag:'kabupaten'}
			
				$.ajax({
					type:"POST",
					url:"../process/tampilLokasi.php",
					data:dataLokasi,
					success:function(msg){
						$("#kab").html('<option value="" readonly selected>Kabupaten</option>');
						let kabupaten = JSON.parse(msg);
						kabupaten = kabupaten.map(kab=>{
							return `<option value="${kab}">${kab}</option>`
						})
						
						$("#kab").append(kabupaten)
					}
					
				})
				
			
			
			$('#confirm_password').keyup(function(){
				if ($('#password').val() === $('#confirm_password').val()) {
					$('#register').prop('disabled', false);
					$('#message').html('password match');
				} else {
					$('#register').prop('disabled', true);
					$('#message').html('not match')
				}
			});
			
		});

		$("#kab").change(function(){
			let dataLokasi = {tag:'kecamatan', kab:$("#kab").val()}
			$.ajax({
				type:"POST",
				url:"../process/tampilLokasi.php",
				data:dataLokasi,
				success:function(msg){
					$("#kec").html('<option value="" readonly selected>Kecamatan</option>');
					$("#des").html('<option value="" readonly selected>Desa</option>');
					let kecamatan = JSON.parse(msg);
					kecamatan = kecamatan.map(kec=>{
						return `<option value="${kec}">${kec}</option>`
					})
					
					$("#kec").append(kecamatan)
				}
			})
		});

		$("#kec").change(function(){
			let dataLokasi = {tag:'desa', kec:$("#kec").val()}
			$.ajax({
				type:"POST",
				url:"../process/tampilLokasi.php",
				data:dataLokasi,
				success:function(msg){
					$("#des").html('<option value="" readonly selected>Desa</option>');
					let desa = JSON.parse(msg);
					des = desa.map(des=>{
						return `<option value="${des}">${des}</option>`
					})
					
					$("#des").append(des)
				}
			})
		})
	</script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../public/js/bootstrap.min.js"></script>
  </body>
</html>
