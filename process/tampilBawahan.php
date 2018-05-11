<?php
	include_once'../config/dbcon.php';
	
	$idAtasan = $_POST['idPegawai'];
	
	$queryBawahan ="SELECT DISTINCT pegawai.idPegawai, bawahan.idBawahan, pegawai.nama, pegawai.jabatan, pegawai.alamat, pegawai.telepon FROM bawahan INNER join pegawai on bawahan.idPegawai = pegawai.idPegawai WHERE idAtasan=$idAtasan ORDER BY idBawahan DESC";
	$sql = mysqli_query($conn,$queryBawahan);
	
	
	
	
	while($data = mysqli_fetch_array($sql)){
		//select data bawahan
		$queryJumlahBwh = "SELECT DISTINCT idBawahan FROM bawahan WHERE idAtasan=".$data['idPegawai'];
		$sqlJum = mysqli_query($conn,$queryJumlahBwh);
		$jmlBwh = mysqli_num_rows($sqlJum);
		$idPegawaiBwh = $data['idPegawai'];
		echo"
		<tr>
			<td>".$data['nama']."</td>
			<td>".$data['jabatan']."</td>
			<td>".$data['alamat']."</td>
			<td>".$data['telepon']."</td>
			<td id='jmlBwhBwh'>".$jmlBwh."</td>
			<td>
				<button class='btn btn-primary' data-toggle='modal' data-target='#detailBawahan' onclick='detailBwh(".$idPegawaiBwh.")'>Detail</button>
				<a class='btn btn-danger' href='../process/hapusBawahan.php?id=".$data['idBawahan']."' onclick='return confirm(\"Hapus bawahan dengan nama ".$data['nama']." ?\")'>Hapus</a>
			</td>
		</tr>
		<script>
		
		//count data bawahan
			var rowCount = $('#tampilBawahan tr').length;
			$('#jumlahBawahan').html(rowCount);
			
		//total jumlahBawahan
			var jmlBwhBwh = parseInt(".$jmlBwh.");
			
			seluruhBwh = seluruhBwh + jmlBwhBwh;
			$('#totalBwh').html(seluruhBwh+rowCount);
			console.log(seluruhBwh);
		</script>
		";

	}		
?>
	