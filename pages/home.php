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
    <title>Home - Data Struktural</title>
    <link rel="icon" href="../public/img/icon.ico">

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/home.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
  </head>
  <body>
    <div class="container">
        <div class=header>
        </div>

        <div class="row">
            <h1>Data Diri</h1>
            <div class="col-md-3 col-md-offset-1">
                <img src="../public/img/default.jpeg" alt="profile" style="width:95%; height:auto; margin-bottom:10px;">
                <button style="width:95%" class="btn btn-primary btn-block" id="openModalBio">Update biodata</button>
				<a style="width:95%" class="btn btn-default btn-block" href="../pages/changesPass.php">Rubah Password</a>
                <a style="width:95%" class="btn btn-danger btn-block" href="../process/logoutProcess.php">Keluar</a>
            </div>
            <div class="col-md-7">
            <ul class="list-group" id="tampilBiodata">
                
            </ul>
            </div>
        </div>
		<div id="modalBio">
		
		</div>
        
		<?php
			include_once 'partial/addBawahan.php';
			include_once 'partial/detailBawahan.php';
		?>

        <div class="row">
            <h2>Data Bawahan</h2>
            <h3><u>Jumlah Bawahan: <strong id="jumlahBawahan">0</strong></u> <br> <span>Jumlah Keseluruhan Bawahan: <strong id="totalBwh">0</strong></h3>
            <button class="btn btn-primary" data-toggle="modal" data-target="#addBawahan" aria-label="Left Align">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="cursor: pointer; margin:2px;"></span>
                Tambah Bawahan    
            </button>
			
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
					<th>Jml Bawahan</th>
                </tr>
                </thead>
                <tbody id="tampilBawahan">
								
                </tbody>
            </table>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		var data = {username:<?php echo "'$username'";?>, idPegawai:<?php echo "'$idPegawai'";?>}
		var seluruhBwh = 0;
		$(function() {
			//tampilkan biodata di Home
			$.ajax({
				type:'POST',
				url:'../process/tampilBiodata.php',
				data: data,
				success:function(msg)
				{
					$('#tampilBiodata').html(msg);
				}
			});
			
			//tampilkan tabel bawahan
			$.ajax({
				type:'POST',
				url:'../process/tampilBawahan.php',
				data: data,
				success:function(msg)
				{
					$('#tampilBawahan').html(msg);
					$('#tampilBawahanModal').html(msg);
				}
			});
			
			//tampilkan modal edit biodata
			$('#openModalBio').click(function(){
				$.ajax({
					type:'POST',
					url:'../pages/partial/updateModal.php',
					data: data,
					success:function(msg)
					{
						$('#modalBio').html(msg);
					}
				});
			});	
			
			
			/*$('#searchData').on("keyup", function() {
				var searchData = $(this).val();
				$.ajax({
					type:'POST',
					url:'../process/cariPegawai.php',
					data: {search: searchData, idAtasan:<?php echo "'$idPegawai'";?>},
					success:function(msg){
						$('#tabelCariBawahan').html(msg);
					}
				});
			});*/
			
		});
			
	</script>
	<script src="../public/js/lokasi.js"></script>
	<script src="../public/js/home.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../public/js/bootstrap.min.js"></script>
  </body>
</html>
