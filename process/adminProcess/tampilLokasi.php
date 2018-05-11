<?php
	include_once'../../config/dbcon.php';
	$command = $_POST['tag'];
	$kabupatenId = isset($_POST['kabUp'])  ? $_POST['kabUp'] : 0;
	$kecamatanId = isset($_POST['kecUp'])  ? $_POST['kecUp'] : 0;
	
	switch($command){
		case "kabupaten":
			$statement = "SELECT DISTINCT kabupaten FROM lokasi";
			break;
		case "kecamatan":
			$statement = "SELECT DISTINCT kecamatan FROM lokasi WHERE kabupaten='".$kabupatenId."'";
			break;
		case "desa":
			$statement = "SELECT desa FROM lokasi WHERE kecamatan='".$kecamatanId."'";
			break;
		default:
		break;
		}

	$sql = mysqli_query($conn,$statement);
	$data = mysqli_fetch_all($sql);
	//$data=[];
	//while($result = mysqli_fetch_array($sql)){
	//	array_push($data,$result['kabupaten']);
	//};
	
	
	echo json_encode($data);
?>

