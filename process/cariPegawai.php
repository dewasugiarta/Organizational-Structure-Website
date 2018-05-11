<?php
	include_once'../config/dbcon.php';
	
	$idAtasan = $_POST['idAtasan'];
	$searchName = $_POST['search'];
	$queryTampil ="SELECT idPegawai, nama, jabatan, alamat, telepon FROM pegawai WHERE nama  LIKE '%".$searchName."%' ORDER BY nama ASC";
	$sql = mysqli_query($conn,$queryTampil);
	
	if(!$sql){
		echo"gagal mencari data";
	}else{
		
		while($data = mysqli_fetch_array($sql)){
		  echo"
			<tr>
				<td>".$data['nama']."</td>
				<td>".$data['jabatan']."</td>
				<td>".$data['alamat']."</td>
				<td>".$data['telepon']."</td>
				<td>
				<a class='btn btn-xs btn-danger' href='../process/tambahBawahan.php?idAtasan=".$idAtasan."&idPegawai=".$data['idPegawai']."' onclick='return confirm(\"tambahkan ".$data['nama']." sebagai bawahan?\")'>
					<span class='glyphicon glyphicon-plus add-bwh' aria-hidden='true' style='cursor: pointer;'></span>
				</a>
				</td>
			</tr>";
		};
	
	}
?>