window.onload = function () {
	
	tampilPegawai('all');
	$('#kab').change(function(){
		if(this.value == ""){
			tampilPegawai('all');
		}else{
			tampilPegawai('kab');
		}
		
	});
	$('#kec').change(function(){
		if(this.value == ""){
			tampilPegawai('kab');
		}else{
			tampilPegawai('kec');
		}
	}); 
	
};

function tampilPegawai(command){
	// Create our XMLHttpRequest object
	var tampil = new XMLHttpRequest();
	var txt="";
	var no = 0;
	// Create some variables we need to send to our PHP file
	var url = "../../process/adminProcess/tampilPegawai.php";
	var kabupaten = document.getElementById("kab").value;
	var kecamatan = document.getElementById("kec").value;
	var data = "kabupaten="+kabupaten+"&kecamatan="+kecamatan+"&command="+command;
	tampil.open("POST", url, true);
	tampil.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Access the onreadystatechange event for the XMLHttpRequest object
	tampil.onreadystatechange = function() {
		if(tampil.readyState == 4 && tampil.status == 200) {
			document.getElementById("dataTbody").innerHTML = "";
			var return_data = JSON.parse(this.responseText);
			console.log(return_data);
			//txt += "<table border='1'>"
				$.each(return_data, function(i, return_data) {
					no++
					var body = "<tr>";
					body    += "<td>" + no + "</td>";
					body    += "<td>" + return_data.nama + "</td>";
					body    += "<td>" + return_data.jabatan + "</td>";
					body    += "<td>" + return_data.alamat + "</td>";
					body    += "<td>" + return_data.kabupaten + "</td>";
					body    += "<td>" + return_data.kecamatan + "</td>";
					body    += "<td>" + return_data.desa + "</td>";
					body    += "<td>" + return_data.telepon + "</td>";
					body    += "</tr>";
					$("#dataTbody").append(body);
				});
			//txt += "</table>"        
				//document.getElementById("isiTabel").innerHTML = txt;
			}
	}
	// Send the data to PHP now... and wait for response to update the status div
	tampil.send(data); // Actually execute the request
	console.log('wait request');
	
}





