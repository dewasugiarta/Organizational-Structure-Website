<?php
	require_once'../../config/dbcon.php';
	$idPegawai = $_POST['data'];
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
	$username = $data['userName'];
	
	
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
							<form method="POST" action="../../process/updateProcess.php"> 
								<input type="hidden"  name="id" value="'.$id.'">
							<!-- nama jabatan kabupaten/kota kecamatan desa alamat tlp -->
								<label for="updateNama">Nama</label>
								<input id="updateNama" type="text" name="updateNama" class="form-control" placeholder="Nama up" value="'.$nama.'" required 
									oninvalid="this.setCustomValidity("Enter Name")"/>
								<label for="updateJabatan">Jabatan</label>
								<input type="text" id="updateJabatan" name="updateJabatan" class="form-control" placeholder="Jabatan" value="'.$jabatan.'"/>
								<label for="updateAlamat">Alamat</label>
								<input type="text" id="updateAlamat" name="updateAlamat" class="form-control" placeholder="Alamat" value="'.$alamat.'"/>
								<label for="kabUp">Kabupaten</label>
								<select  id="kabUp" class="form-control" name="updateKabupaten" required>
									<option value="" disabled selected>Kabupaten</option>
								</select>
								<label for="kecUp">Kecamatan</label>
								<select id="kecUp" class="form-control" name="updateKecamatan" required>
									<option value="" disabled selected>Kecamatan</option>   
								</select>
								<label for="desUp">Desa </label>
								<select id="desUp" class="form-control" name="updateDesa" required>
									<option value="" disabled selected>Desa</option>  
								</select>
								<label for="updateTelepon">Telepon</label>
								<input id="updateTelepon" type="tel" name="updateTelepon" class="form-control" placeholder="Telepon" value="'.$telepon.'">
								<label for="updateUsername">Username</label>
								<input id="updateUsername" type="text" name="updateUsername" class="form-control" placeholder="Username" value="'.$username.'" readonly>
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
						$("#kabUp").html(\'<option value="" disabled selected>Kabupaten</option>\');
						let dataLokasi = {tag:"kabupaten"}
						
							$.ajax({
								type:"POST",
								url:"../../process/adminProcess/tampilLokasi.php",
								data:dataLokasi,
								success:function(msg){
									let kabupaten = JSON.parse(msg);
									kabupaten = kabupaten.map(kab=>{
										return `<option value="${kab}">${kab}</option>`
									})
									
									$("#kabUp").append(kabupaten)
								}
								
							})
							

					});

					$("#kabUp").change(function(){
						let dataLokasi = {tag:"kecamatan", kabUp:$("#kabUp").val()}
						$.ajax({
							type:"POST",
							url:"../../process/adminProcess/tampilLokasi.php",
							data:dataLokasi,
							success:function(msg){
								$("#kecUp").html(\'<option value="" readonly selected>Kecamatan</option>\');
								$("#desUp").html(\'<option value="" readonly selected>Desa</option>\');
								let kecamatan = JSON.parse(msg);
								kecamatan = kecamatan.map(kec=>{
									return `<option value="${kec}">${kec}</option>`
								})
								
								$("#kecUp").append(kecamatan)
							}
						})
					});

					$("#kecUp").change(function(){
						let dataLokasi = {tag:"desa", kecUp:$("#kecUp").val()}
						$.ajax({
							type:"POST",
							url:"../../process/adminProcess/tampilLokasi.php",
							data:dataLokasi,
							success:function(msg){
								$("#desUp").html(\'<option value="" readonly selected>Desa</option>\');
								let desa = JSON.parse(msg);
								des = desa.map(des=>{
									return `<option value="${des}">${des}</option>`
								})
								
								$("#desUp").append(des)
							}
						})
					})
					
					
					
				</script>
			</div>
		</div>
		';
 
?>

