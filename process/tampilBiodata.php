<?php
	include_once'../config/dbcon.php';
	$username = $_POST['username'];
	$idPegawai = $_POST['idPegawai'];
	$query = "SELECT * FROM pegawai WHERE idPegawai='$idPegawai'";
	$sql = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($sql);
	
	echo'
		<li class="list-group-item"><label class="lbl-info">Nama</label><span id="nama">'.$data['nama'].'</span></li>
		<li class="list-group-item"><label class="lbl-info">Jabatan</label><span id="jabatan">'.$data['jabatan'].'</span></li>
		<li class="list-group-item"><label class="lbl-info">Alamat</label><span id="alamat">'.$data['alamat'].'</span></li>
		<li class="list-group-item"><label class="lbl-info">Kabupaten/Kota</label><span id="kabupaten">'.$data['kabupaten'].'</span></li>
		<li class="list-group-item"><label class="lbl-info">Kecamatan</label><span id="kecamatan">'.$data['kecamatan'].'</span></li>
		<li class="list-group-item"><label class="lbl-info">Desa</label><span id="desa">'.$data['desa'].'</span></li>
		<li class="list-group-item"><label class="lbl-info">Telepon</label><span id="telepon">'.$data['telepon'].'</span></li>
		<li class="list-group-item"><label class="lbl-info">Username</label><span id="username">'.$data['userName'].'</span></li>
	';
 
?>