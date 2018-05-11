<!-- Modal -->
<div id="addPegawai" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Pegawai</h4>
            </div>
            <div class="modal-body">
               
                <form action="../../process/adminProcess/addPegawaiProcess.php" method="POST"> 
                <!-- nama jabatan kabupaten/kota kecamatan desa alamat tlp -->
                <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required 
				oninvalid="this.setCustomValidity('Enter Name')" oninput="setCustomValidity('')"/>
                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan"/>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat"/>
                <select  id="kabUp" class="form-control" name="kabupaten">
                    
                </select>
                <select id="kecUp" class="form-control" name="kecamatan">
                    <option value="" disabled selected>Kecamatan</option>   
                </select>
                <select id="desUp" class="form-control" name="desa">
                    <option value="" disabled selected>Desa</option>  
                </select>
                <input type="tel" name="telepon" class="form-control" placeholder="Telepon">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
								<input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
								<p id="message"><p>
                <div class="submit-control">
                  <button id="register" class="btn btn-primary" type="submit" value="submit" disabled name="submit"> Simpan </button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
              </form>	
            </div> 
			
			<script>
				$(function(){
					$("#kabUp").html('<option value="" disabled selected>Kabupaten</option>');
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

					$('#confirm_password').keyup(function(){
						if ($('#password').val() === $('#confirm_password').val()) {
							$('#register').prop('disabled', false);
							$('#message').html('password match');
						} else {
							$('#register').prop('disabled', true);
							$('#message').html('not match')
						}
					});

				});

				$("#kabUp").change(function(){
					let dataLokasi = {tag:"kecamatan", kabUp:$("#kabUp").val()}
					$.ajax({
						type:"POST",
						url:"../../process/adminProcess/tampilLokasi.php",
						data:dataLokasi,
						success:function(msg){
							$("#kecUp").html('<option value="" readonly selected>Kecamatan</option>');
							$("#desUp").html('<option value="" readonly selected>Desa</option>');
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
							$("#desUp").html('<option value="" readonly selected>Desa</option>');
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
</div>

