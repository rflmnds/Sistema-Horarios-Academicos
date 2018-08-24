$('#add').click(function(){

	var disc = $('#disc').val();

	$('#disc').changed(function()){
		$.ajax({
			method:"POST";
			url: "ajax/ajax_oferta";
			data: "{disc:" + disc + "}";
			success: add;
			fail: failAdd;
		}

		function add(disc){
			$('#added').append($('<tr><td>Teste</td><tr>'));
		}
	}
}