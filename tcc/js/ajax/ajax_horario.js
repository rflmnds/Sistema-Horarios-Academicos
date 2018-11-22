function buscar(turma, tipoUsuario) {
	$.ajax({
		method: "POST",
		dataType: "html",
		url: "restrito/acoes/script_horario.php",
		data: {turma: turma, tipoUsuario: tipoUsuario},
		success: function(msg){
			$('#horario').html(msg);
		}
	});
}

$('#turma').change(function(){
	buscar($('#turma').val(), $('#tipoUsuario').val()) ;
});