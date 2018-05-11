		$(function(){
			let dataLokasi = {tag:'kabupaten'}
			
				$.ajax({
					type:"POST",
					url:"../process/tampilLokasi.php",
					data:dataLokasi,
					success:function(msg){
						$("#kab").html('<option value="" disabled selected>Kabupaten</option>');
						let kabupaten = JSON.parse(msg);
						kabupaten = kabupaten.map(kab=>{
							return `<option value="${kab}">${kab}</option>`
						})
						
						$("#kab").append(kabupaten)
					}
					
				})
				

		});

		$("#kab").change(function(){
			let dataLokasi = {tag:'kecamatan', kab:$("#kab").val()}
			$.ajax({
				type:"POST",
				url:"../process/tampilLokasi.php",
				data:dataLokasi,
				success:function(msg){
					$("#des").html('<option value="" disabled selected>Desa</option>');
					let kecamatan = JSON.parse(msg);
					kecamatan = kecamatan.map(kec=>{
						return `<option value="${kec}">${kec}</option>`
					})
					
					$("#kec").html(kecamatan)
				}
			})
		});

		$("#kec").change(function(){
			let dataLokasi = {tag:'desa', kec:$("#kec").val()}
			$.ajax({
				type:"POST",
				url:"../process/tampilLokasi.php",
				data:dataLokasi,
				success:function(msg){
					let desa = JSON.parse(msg);
					des = desa.map(des=>{
						return `<option value="${des}">${des}</option>`
					})
					
					$("#des").html(des)
				}
			})
		})