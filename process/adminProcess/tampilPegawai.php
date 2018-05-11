<?php
		
		include_once('../../config/dbcon.php');
		
		
		$command = isset($_POST['command']) ? $_POST['command']:'0';
		$kabupaten = isset($_POST['kabupaten']) ? $_POST['kabupaten']:'0';
		$kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan']:'0';
		
	
		if($command == 'kec'){
			//echo "kecamatan";
			$query = "SELECT nama,jabatan,alamat,kabupaten,kecamatan,desa,telepon FROM pegawai WHERE kecamatan='".$kecamatan."'";
		}else if($command == 'kab'){
			$query = "SELECT nama,jabatan,alamat,kabupaten,kecamatan,desa,telepon FROM pegawai WHERE kabupaten='".$kabupaten."'";
			//echo "kabupaten";
		}else{
			$query = "SELECT nama,jabatan,alamat,kabupaten,kecamatan,desa,telepon FROM pegawai";
			//echo "semua";
		}
	
		
		

		$executeQuery = mysqli_query($conn,$query);
		$check = mysqli_num_rows($executeQuery);
		if($check>0){
			while($data = mysqli_fetch_assoc($executeQuery)){
				$dataArr[] = $data;
			}
		echo json_encode($dataArr);
		}else{
			$data = array(
				'data' => 'No Result'
			);
			echo json_encode($data);
		} 
		

		
		
		
	
		
		
	
?>