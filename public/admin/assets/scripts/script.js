
function initScript(){
    $('.numero').mask('#', { placeholder: 'Informe a idade', reverse: false });
	$('.celular').mask('(00)00000-0000', { placeholder: '(00)00000-0000', reverse: false });
    $("#cpf").mask('000.000.000-00', { "placeholder": "000.000.000-00" }); 
}


$('.cpf').blur(function () {
	cpf = $(this).val();
	if (cpf != "")
		cpf = $(this).cleanVal();

	if (testarCpf(cpf) == false) {
		alert("Cpf inválido");
		return;
	}
});


$('#btn-modal').click(() => {
	$('#form').attr('action',$(this).data('action'));
    $('#modal-cadastro').modal('toggle');
});

$("#listagem").on("click", ".btn-editar", function () {
	$('#title').text("Editar usuário");
	let  user = $(this).data('user');
	$('#form').attr('action',$(this).data('action'));
	$('#container').html('<input type="hidden" name="_method" value="PUT">');
    $('#nome').val(user.nome);
    $('#idade').val(user.idade);
    $('#cpf').val(user.cpf);
    $('#telefone').val(user.whatsapp);
    $('#modal-cadastro').modal('toggle');
});


$('#btn-deletar').click(()=>{
	$('#modal-deletar').modal('toggle');
});

$('#btn-submit').click(()=>{
	$('#form-delete').submit();
});



function testarCpf(strCPF) {
	var Soma;
	var Resto;
	Soma = 0;
	if (strCPF == "00000000000") return false;

	for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
	Resto = (Soma * 10) % 11;

	if ((Resto == 10) || (Resto == 11)) Resto = 0;
	if (Resto != parseInt(strCPF.substring(9, 10))) return false;

	Soma = 0;
	for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
	Resto = (Soma * 10) % 11;

	if ((Resto == 10) || (Resto == 11)) Resto = 0;
	if (Resto != parseInt(strCPF.substring(10, 11))) return false;
	return true;
}

