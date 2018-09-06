function buscar(turma) {
	$.ajax({
		method: "POST",
		dataType: "html",
		url: "restrito/acoes/script_horario.php",
		data: {turma: turma},
		success: function(msg){
			$('#horario').html(msg);
		}
	});
}

$('#turma').change(function(){
	buscar($('#turma').val())
});