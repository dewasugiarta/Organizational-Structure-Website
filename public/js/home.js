$(function(){
	$('#bwhNama').keyup(function(){
		var nama = $('#bwhNama').val();
		var getRandom = Math.floor(Math.random() * (999 - 111 + 1) + 111);
		var username = nama.replace(/\s/g,'').toLowerCase().substring(0, 10)+getRandom;
		$('#bwhUsername').val(username);
	})
	
	
});


