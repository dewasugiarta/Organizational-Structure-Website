<!-- Modal -->
		<div id="detailBawahan" class="modal fade" role="dialog">
			<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Detail Bawahan</h4>
						</div>
						<div class="modal-body">

							<div class="row">
								<div class="col-md-3">
									<img src="../public/img/default.jpeg" alt="profile" style="width:100%; height:auto; margin-bottom:10px;">
								</div>
								<div class="col-md-9">
								<ul class="list-group">
									<li class="list-group-item"><label class="lbl-info">Nama</label><span id="namaBawahan">Made Nyoman</span></li>
									<li class="list-group-item"><label class="lbl-info">Jabatan</label><span id="jabatanBawahan">Made Nyoman</span></li>
									<li class="list-group-item"><label class="lbl-info">Alamat</label><span id="alamatBawahan">Made Nyoman</span></li>
									<li class="list-group-item"><label class="lbl-info">Kabupaten/Kota</label><span id="kabupatenBawahan">Made Nyoman</span></li>
									<li class="list-group-item"><label class="lbl-info">Kecamatan</label><span id="kecamatanBawahan">Made Nyoman</span></li>
									<li class="list-group-item"><label class="lbl-info">Desa</label><span id="desaBawahan">Made Nyoman</span></li>
									<li class="list-group-item"><label class="lbl-info">Telepon</label><span id="teleponBawahan">Made Nyoman</span></li>
									<li class="list-group-item"><label class="lbl-info">Username</label><span id="usernameBawahan">Made Nyoman</span></li>
									<li class="list-group-item"><label class="lbl-info">Password</label><span id="passwordBawahan">Made Nyoman</span></li>
								</ul>
								</div>
							</div>
							
							<h3>Daftar Bawahan</h3>
							<table class="table table-striped">
								<thead>
								<tr>
									<th>Nama</th>
									<th>Jabatan</th>
									<th>Alamat</th>
									<th>Telepon</th>
								</tr>
								</thead>
								<tbody id="bwhBawahan">
								
								</tbody>
							</table>
							
						</div>
						<div class="modal-footer">
							<button class="btn btn-success" data-dismiss="modal">Selesai</button>
						</div>
					</div>

				</div>
			</div>
<script>
	function detailBwh(id){
		var dataBwh = {idPegawai: id};
		$.ajax({
			type:'POST',
			url:'../process/processDetailBawahan.php',
			data: dataBwh,
			success:function(msg)
			{	
				var obj = JSON.parse(msg);
				$('#namaBawahan').html(obj['nama']);
				$('#jabatanBawahan').html(obj['jabatan']);
				$('#alamatBawahan').html(obj['alamat']);
				$('#kabupatenBawahan').html(obj['kabupaten']);
				$('#kecamatanBawahan').html(obj['kecamatan']);
				$('#desaBawahan').html(obj['desa']);
				$('#teleponBawahan').html(obj['teleponBwh'])
				$('#usernameBawahan').html(obj['userNameBwh']);
				$('#passwordBawahan').html(obj['teleponBwh']);
				
				//$('#namaBawahan').html(msg);
			}
		});
		
		$.ajax({
			type:'POST',
			url:'../process/dataBwhBawahan.php',
			data: dataBwh,
			success:function(msg)
			{	
				$('#bwhBawahan').html(msg);
				//$('#namaBawahan').html(msg);
			}
		});
	}
</script>
	

