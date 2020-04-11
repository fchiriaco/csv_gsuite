$(document).ready(function(){
	
	
	$('#add').click(function(e){
		e.preventDefault();
		cognome = $('#cognome').val() + "";
		nome = $('#nome').val() + "";
		stringa = $.trim($('#utenti').val() + "");
		if(stringa == '')
			$('#utenti').val(cognome + ';' + nome);
		else
			$('#utenti').val(stringa + '|' + cognome + ';' + nome);
		stringahtml = $('#stringa').html() + "";
		stringahtml +=  '<br>' + cognome + ' ' +  nome;
		$('#stringa').html(stringahtml);
		$('#nome').val('');
		$('#cognome').val('');
		return false;
	});
});