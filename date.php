<?php
	$servername = "localhost";
	$username = "root";
	$password = "836533";
	$database = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$database);

	// Check connection
	if ($conn->connect_error) {
		die( 'Connection failed: ' . $conn->connect_error);
	}
	
	
	$queryBaca = "SELECT * FROM tanggal ORDER BY id DESC LIMIT 1";
	$sqlBaca = mysqli_query($conn, $queryBaca);
	
	$sqlData = mysqli_fetch_array($sqlBaca);
	
	echo $sqlData['tanggal']."<br>";
	
	$tanggalBaru = $sqlData['tanggal'];
	
	
	$tanggalBaru = (string)$tanggalBaru;
	try {
		$date = new DateTime($tanggalBaru);
		$newtime = $date->modify('+4 year')->format('Y-m-d');
	} catch (Exception $e) {
		echo $e->getMessage();
		exit(1);
	}

	echo $newtime;
?>