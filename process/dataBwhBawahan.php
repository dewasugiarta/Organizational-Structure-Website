<?php
	include_once'../config/dbcon.php';
	
	$idAtasan = $_POST['idPegawai'];
	
	$queryBawahan ="SELECT DISTINCT pegawai.idPegawai, bawahan.idBawahan, pegawai.nama, pegawai.jabatan, pegawai.alamat, pegawai.telepon FROM bawahan INNER join pegawai on bawahan.idPegawai = pegawai.idPegawai WHERE idAtasan=$idAtasan ORDER BY idBawahan DESC";
	$sql = mysqli_query($conn,$queryBawahan);
	
	
	
	
	while($data = mysqli_fetch_array($sql)){
		//select data bawahan
		echo"
			<tr>
				<td>".$data['nama']."</td>
				<td>".$data['jabatan']."</td>
				<td>".$data['alamat']."</td>
				<td>".$data['telepon']."</td>
			</tr>
		";

	}		
?>