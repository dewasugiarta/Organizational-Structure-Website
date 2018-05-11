<?php
	require_once'../../config/dbcon.php';
	$username = $_POST['username'];
	$idPegawai = $_POST['idPegawai'];
	$query = "SELECT * FROM pegawai WHERE idPegawai='".$idPegawai."'";
	$sql = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($sql);
	
	$id = $data['idPegawai'];
	$nama = $data['nama'];
	$jabatan = $data['jabatan'];
	$alamat = $data['alamat'];
	$kabupaten = $data['kabupaten'];
	$kecamatan = $data['kecamatan'];
	$desa = $data['desa'];
	$telepon = $data['telepon'];
	$userName = $data['userName'];
	
	
	echo'
		<!-- Modal -->
		<div id="updatemodal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Update Data Diri</h4>
					</div>
					<div class="modal-body">
						<div >
							<form method="POST" action="../process/updateProcess.php"> 
								<input type="hidden"  name="id" value="'.$id.'">
							<!-- nama jabatan kabupaten/kota kecamatan desa alamat tlp -->
								<label for="updateNama">Nama</label>
								<input id="updateNama" type="text" name="updateNama" class="form-control" placeholder="Nama lengkap" value="'.$nama.'" required 
									oninvalid="this.setCustomValidity("Enter Name")"/>
								<label for="updateJabatan">Jabatan</label>
								<input type="text" id="updateJabatan" name="updateJabatan" class="form-control" placeholder="Jabatan" value="'.$jabatan.'"/>
								<label for="updateAlamat">Alamat</label>
								<input type="text" id="updateAlamat" name="updateAlamat" class="form-control" placeholder="Alamat" value="'.$alamat.'"/>
								<label for="kab">Kabupaten</label>
								<select  id="kab" class="form-control" name="updateKabupaten" required>
									<option value="" disabled selected>Kabupaten</option>
								</select>
								<label for="kec">Kecamatan</label>
								<select id="kec" class="form-control" name="updateKecamatan" required>
									<option value="" disabled selected>Kecamatan</option>   
								</select>
								<label for="des">Desa </label>
								<select id="des" class="form-control" name="updateDesa" required>
									<option value="" disabled selected>Desa</option>  
								</select>
								<label for="updateTelepon">Telepon</label>
								<input id="updateTelepon" type="tel" name="updateTelepon" class="form-control" placeholder="Telepon" value="'.$telepon.'">
								<label for="updateUsername">Username</label>
								<input id="updateUsername" type="text" name="updateUsername" class="form-control" placeholder="Username" value="'.$userName.'" readonly>
								<div>
									<button type="submit" class="btn btn-default register" id="UpdatePegawai"> Update </button>
									<button type="button" class="btn btn-default register" data-dismiss="modal">Batal</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<script>
					$(function(){
						$("#updatemodal").modal("show");
						console.log("bukak modal");
					});
					$(function(){
						$("#kab").html(\'<option value="" disabled selected>Kabupaten</option>\');
						let dataLokasi = {tag:"kabupaten"}
						
							$.ajax({
								type:"POST",
								url:"../process/tampilLokasi.php",
								data:dataLokasi,
								success:function(msg){
									let kabupaten = JSON.parse(msg);
									kabupaten = kabupaten.map(kab=>{
										return `<option value="${kab}">${kab}</option>`
									})
									
									$("#kab").append(kabupaten)
								}
								
							})
							

					});

					$("#kab").change(function(){
						let dataLokasi = {tag:"kecamatan", kab:$("#kab").val()}
						$.ajax({
							type:"POST",
							url:"../process/tampilLokasi.php",
							data:dataLokasi,
							success:function(msg){
								$("#kec").html(\'<option value="" disabled selected>Kecamatan</option>\');
								$("#des").html(\'<option value="" disabled selected>Desa</option>\');
								let kecamatan = JSON.parse(msg);
								kecamatan = kecamatan.map(kec=>{
									return `<option value="${kec}">${kec}</option>`
								})
								
								$("#kec").html(kecamatan)
							}
						})
					});

					$("#kec").change(function(){
						let dataLokasi = {tag:"desa", kec:$("#kec").val()}
						$.ajax({
							type:"POST",
							url:"../process/tampilLokasi.php",
							data:dataLokasi,
							success:function(msg){
								$("#des").html(\'<option value="" disabled selected>Desa</option>\');
								let desa = JSON.parse(msg);
								des = desa.map(des=>{
									return `<option value="${des}">${des}</option>`
								})
								
								$("#des").html(des)
							}
						})
					})
					
					
					
				</script>
			</div>
		</div>
		';
 
?>

