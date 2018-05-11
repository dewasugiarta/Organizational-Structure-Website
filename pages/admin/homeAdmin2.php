<?php

	session_start();
	
	if(!isset($_SESSION['status'])){
		header('Location: ../../pages/admin/loginAdmin.php');
	}
	include_once('../../config/dbcon.php');
	
	
	if(isset($_POST['tampil'])){
		$kabupaten = mysqli_real_escape_string($conn,$_POST['kabupaten']);
		$kecamatan = mysqli_real_escape_string($conn,$_POST['kecamatan']);
		
		
		
		if(($kecamatan == null) && ($kabupaten == null)){
			$query = "SELECT * FROM pegawai";
		}else if($kecamatan != null){
			$query = "SELECT * FROM pegawai WHERE kecamatan='".$kecamatan."'";
		}else{
			$query = "SELECT * FROM pegawai WHERE kabupaten='".$kabupaten."'";
		}
		
	}else{
		$query = "SELECT * FROM pegawai";
	}
	//echo $query;
	$result = mysqli_query($conn, $query);
	echo mysqli_error($conn);
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home Admin</title>
    <link rel="icon" href="../../public/img/icon.ico">

    <!-- Bootstrap -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/datatables.css"/>
	
	
</head>
<body>
	<div class="container">
		<div class="header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
							<h2>Home Admin</h2>
					</div>	
					<div class="col-md-1 pull-right" style="padding:10px">
							<a href="../../process/adminProcess/logoutAdmin.php" class="btn btn-danger ">Logout</a>
					</div>
					
				</div>
				<hr>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2" style="width:100%;">
				<h4>Data Pegawai</h4>
			</div>
			
			<div class="col-md-3" style="width:201px">
				<h4>Tampil Berdasarkan : </h4>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="" method="POST">
						<div class="col-md-2">
							<select  id="kab" class="form-control" name="kabupaten" >
								<option value="" disabled selected>Kabupaten</option>
							</select>
						</div>
						<div class="col-md-2">
							<select  id="kec" class="form-control" name="kecamatan" >
								<option value="" selected>Kecamatan</option>
							</select>
						</div>
						<div class="col-md-2">
							<input type="submit" name="tampil" class="btn btn-primary" value="tampil"></input>
						</div>
					</form>
					<div class="col-md-2 pull-right">
						<button id="tambahPegawai" class="btn btn-success" data-toggle="modal" data-target="#addPegawai">Tambah Pegawai</button>
					</div>
				</div>
			</div>
		
			
			<div class="col-md-12">
				<table class="table table-bordered " style="border:1px solid black; background:white;" id="datatable">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Alamat</th>
							<th>Kabupaten</th>
							<th>Kecamatan</th>
							<th>Desa</th>
							<th>Telepon</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 0;
							while($data = mysqli_fetch_array($result)){
								$no++;
								echo '
									<tr>
										<td>'.$no.'</td>
										<td>'.$data['nama'].'</td>
										<td>'.$data['jabatan'].'</td>
										<td>'.$data['alamat'].'</td>
										<td>'.$data['kabupaten'].'</td>
										<td>'.$data['kecamatan'].'</td>
										<td>'.$data['desa'].'</td>
										<td>'.$data['telepon'].'</td>
										<td>
											<span><button id="openModal" class="btn btn-primary btn-sm" data-id="'.$data['idPegawai'].'" onClick="update(this.getAttribute(\'data-id\'))">Edit</button></span>
											<span><a class="btn btn-danger btn-sm" href="../../process/adminProcess/hapusPegawai.php?id='.$data['idPegawai'].'">Hapus</a></span>
										</td>
									</tr>
								';
							}
						?>
					</tbody>
				</table>
			</div>		
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/datatables.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
	<script>
		$(document).ready(function() {
			$('#datatable').DataTable();
		} );
		
		function update(id){
			let data = {data: id.toString()};
			$.ajax({
				type:'POST',
				url:'../../pages/admin/modalUpdate.php',
				data: data,
				success:function(msg)
				{
					$('#modalUpdate').html(msg);
				}
			});
		};
	</script>
	<!--script src="../../public/js/tampilPegawai.js"></script-->
	<script src="../../public/js/lokasiAll.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
	
	<div id="modalUpdate">
	
	</div>
	<?php
		include_once('../../pages/admin/modalAddPegawai.php');
	?>
  </body>
</html>
