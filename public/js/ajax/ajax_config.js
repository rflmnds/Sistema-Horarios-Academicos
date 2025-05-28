function mostrarQtd(qtd) {
	$.ajax({
		method: "POST",
		dataType: "html",
		url: "restrito/acoes/script_config.php",
		data: {qtd: qtd},
		success: function(msg){
			$('#show').html(msg);
		}
	});
}

$('#qtd').change(function(){
	mostrarQtd($('#qtd').val())
});