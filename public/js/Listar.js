

$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
	});

});

$(document).ready(function () {
	$("#container-computador").hide();
	$("#container-jogos").hide();
	$("#container-manutencao").hide();
	$("#container-pecas").hide();
	$("#container-Pmontagem").hide();
	$("#container-Pmanutencao").hide();
	$("input[name='rdb']").click(function(){
		var select = $(this).val();
		console.log(select);
		if (select == "Jogos") {
			$("#container-jogos").show();
			$("#container-computador").hide();
			$("#container-manutencao").hide();
			$("#container-pecas").hide();
			$("#container-Pmontagem").hide();
			$("#container-Pmanutencao").hide();
		}else if(select=="Computador"){
			$("#container-jogos").hide();
			$("#container-computador").show();
			$("#container-manutencao").hide();
			$("#container-pecas").hide();
			$("#container-Pmontagem").hide();
			$("#container-Pmanutencao").hide();
		}else if(select=="Manutencao"){
			$("#container-computador").hide();
			$("#container-jogos").hide();
			$("#container-manutencao").show();
			$("#container-pecas").hide();
			$("#container-Pmontagem").hide();
			$("#container-Pmanutencao").hide();
		}else if(select=="Pecas"){
			$("#container-computador").hide();
			$("#container-jogos").hide();
			$("#container-manutencao").hide();
			$("#container-pecas").show();
			$("#container-Pmontagem").hide();
			$("#container-Pmanutencao").hide();
		}else if(select=="PManutencao"){
			$("#container-computador").hide();
			$("#container-jogos").hide();
			$("#container-manutencao").hide();
			$("#container-pecas").hide();
			$("#container-Pmanutencao").show();
			$("#container-Pmontagem").hide();
		}else if(select=="PMontagem"){
			$("#container-computador").hide();
			$("#container-jogos").hide();
			$("#container-manutencao").hide();
			$("#container-pecas").hide();
			$("#container-Pmanutencao").hide();
			$("#container-Pmontagem").show();
		}
	});
});



$('#modalAlteraJogo').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var codigo = button.data('whatevercodigo') // Extract info from data-* attributes
var nome = button.data('whatevernome')
var categoria = button.data('whatevercategoria')
var fornecedor = button.data('whateverfornecedor')
var classificacao = button.data('whateverclassificacao')
var anoLancamento = button.data('whateverano')
var descricao = button.data('whateverdescricao')
var sinopse = button.data('whateversinopse')
var foto= button.data('whateverfoto')
var preco = button.data('whateverpreco')
var status = button.data('whateverstatus')		  

var modal = $(this)
modal.find('.modal-title').text(codigo)
modal.find('#pro_codigo').val(codigo)
modal.find('#pro_titulo').val(nome)
modal.find(".modal-body select[name='pro_categoria']").val(categoria)
modal.find(".modal-body select[name='pro_fornecedor']").val(fornecedor)
modal.find(".modal-body select[name='pro_classificacao']").val(classificacao)
modal.find('#pro_anoLancamento').val(anoLancamento)
modal.find('#pro_descricao').val(descricao)
modal.find('#pro_sinopse').val(sinopse)
//modal.find(".modal-body input[name='pro_foto']").val(foto)
modal.find('#pro_preco').val(preco)
if(status==1){
	modal.find(".modal-body input[name='pro_status']").attr('checked', true);
}else{
	modal.find(".modal-body input[name='pro_status']").attr('checked', false);  	
}

})

$('#modalAlteraComputador').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) 
	var codigoC = button.data('whatevercodigo') 
	var nomeC = button.data('whatevernome')
	var descricaoC = button.data('whateverdescricao')
	var marcaC = button.data('whatevermarca')
	var modeloC = button.data('whatevermodelo')
	var fotoC= button.data('whateverfoto')
	var arquitetura= button.data('whateverarquitetura')
	var precoC = button.data('whateverpreco')
	var statusC = button.data('whateverstatus')

	var modal = $(this)
	modal.find('.modal-title').text(codigoC)
	modal.find('#com_codigo').val(codigoC)
	modal.find('#com_nome').val(nomeC)
	modal.find('#com_descricao').val(descricaoC)
	modal.find(".modal-body select[name='com_marca']").val(marcaC)
	modal.find(".modal-body select[name='com_modelo']").val(modeloC)
	modal.find('#com_arquitetura').val(arquitetura)
	modal.find('#com_preco').val(precoC)
	if(statusC==1){
		modal.find(".modal-body input[name='com_status']").attr('checked', true);
	}else{
		modal.find(".modal-body input[name='com_status']").attr('checked', false);  	
	}


})

$('#modalAlteraTipoManutencao').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) 
	var codigotman = button.data('whatevercodigotman') 
	var nometman = button.data('whatevernometman')
	var descricaotman = button.data('whateverdescricaotman')
	var statusM = button.data('whateverstatustman')

	var modal = $(this)
	modal.find('.modal-title').text(codigotman)
	modal.find('#tman_codigo').val(codigotman)
	modal.find('#tman_nome').val(nometman)
	modal.find('#tman_descricao').val(descricaotman)
	if(statusM==1){
		modal.find(".modal-body input[name='tman_status']").attr('checked', true);
	}else{
		modal.find(".modal-body input[name='tman_status']").attr('checked', false);  	
	}
})

$('#modalAlteraPecas').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var codigoP = button.data('whatevercodigo') // Extract info from data-* attributes
var nomeP = button.data('whatevernome')
var marcaP = button.data('whatevermarca')
var categoriaP = button.data('whatevercategoria')
var modeloP = button.data('whatevermodelo')
var fornecedorP = button.data('whateverfornecedor')
var precoP = button.data('whateverpreco')
var descricaoP = button.data('whateverdescricao')
var statusP = button.data('whateverstatus')

var modal = $(this)
modal.find('.modal-title').text(codigoP)
modal.find('#pec_codigo').val(codigoP)
modal.find('#pec_nome').val(nomeP)
modal.find(".modal-body select[name='pec_modelo']").val(modeloP)
modal.find(".modal-body select[name='pec_categoria']").val(categoriaP)
modal.find(".modal-body select[name='pec_fornecedor']").val(fornecedorP)
modal.find(".modal-body select[name='pec_marca']").val(marcaP)
modal.find('#pec_descricao').val(descricaoP)
modal.find('#pec_preco').val(precoP)
if(statusP==1){
	modal.find(".modal-body input[name='pec_status']").attr('checked', true);
}else{
	modal.find(".modal-body input[name='pec_status']").attr('checked', false);  	
}

});
