<!-- Modal -->
<div id="addBawahan" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Daftar Bawahan</h4>
            </div>
            <div class="modal-body">
               
                <form action="../process/CheckTbhBawahan.php" method="post">
					<input type="hidden" id="idAtasan" name="idAtasan" value="<?php echo $idPegawai;?>"></input>
					<div class="form-group">
						<label for="bwhNama">Nama:</label>
						<input type="text" class="form-control" id="bwhNama" name="bwhNama" required>
					</div>
					<div class="form-group">
						<label for="bwhJabatan">Jabatan:</label>
						<input type="text" class="form-control" id="bwhJabatan" name="bwhJabatan" required>
					</div>
					<div class="form-group">
						<label for="bwhAlamat">Alamat:</label>
						<input type="text" class="form-control" id="bwhAlamat" name="bwhAlamat" required>
					</div>
					<div class="form-group">
						<label for="kab">Kabupaten:</label>
						<select  id="kab" class="form-control" name="bwhKabupaten" required>
							<option value="" disabled selected>Kabupaten</option>
						</select>
					</div>
					<div class="form-group">
						<label for="kec">Kecamatan</label>
						<select id="kec" class="form-control" name="bwhKecamatan" required>
							<option value="" disabled selected>Kecamatan</option>   
						</select>
						
					</div>
					<div class="form-group">
						<label for="des">Desa </label>
						<select id="des" class="form-control" name="bwhDesa" required>
							<option value="" disabled selected>Desa</option>  
						</select>
					</div>
					<div class="form-group">
						<label for="bwhTelepon">Telepon:</label>
						<input type="text" class="form-control" id="bwhTelepon" name="bwhTelepon" required>
					</div>
					<div class="form-group">
						<label for="bwhUsername">Username:</label>
						<input type="text" class="form-control" id="bwhUsername" name="bwhUsername" readonly>
					</div>
					
					<button type="submit" class="btn btn-success ">Submit</button>
					<button class="btn btn-default" data-dismiss="modal">Batal</button>
				</form>
				
            </div>
           
        </div>
    </div>
</div>

