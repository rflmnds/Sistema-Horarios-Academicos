$('#turma').change(function(){
	var turma = $('#turma').val();

	$.ajax({
		type: "POST";
		url: "restrito/acoes/script_horario.php";
		data: {turma: turma};
		success: function(msg){
			$('horario').html(msg);
		}
	});
});