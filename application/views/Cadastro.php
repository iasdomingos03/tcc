
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta lang="pt-br"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>   
	<header class="navbar navbar-expand navbar-dark bg-dark">
		<div class="navbar-nav-scroll">
			<ul class="navbar-nav bd-navbar-nav flex-row">
				<li class="nav-item">
					<a class="nav-link" href=<?php echo base_url()?>index.php/Cadastros/exibeFormulario/>Cadastrar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href=<?php echo base_url() ?>index.php/Exibir/exibeLista/>Listar</a>
				</li>
			</ul>
		</div>
	</header>
	

	<div class="container shadow-lg p-3 mb-5 bg-white rounded sm-5">
		<ul class="nav nav-tabs " id="myTab" role="tablist">
			<li class="nav-item ">
				<a class="nav-link active shadow p-3 mb-5 bg-white rounded" id="jogos-tab" data-toggle="tab" href="#jogos" role="tab" aria-controls="jogos" aria-selected="true">Jogos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link shadow p-3 mb-5 bg-white rounded" id="cadastros-tab" data-toggle="tab" href="#cadastros" role="tab" aria-controls="cadastros" aria-selected="false">Cadastros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link shadow p-3 mb-5 bg-white rounded" id="pecas-tab" data-toggle="tab" href="#pecas" role="tab" aria-controls="pecas" aria-selected="false">Peças</a>
			</li>
			<li class="nav-item">
				<a class="nav-link shadow p-3 mb-5 bg-white rounded" id="fornecedor-tab" data-toggle="tab" href="#fornecedor" role="tab" aria-controls="fornecedor" aria-selected="false">Fornecedor</a>
			</li>
			<li class="nav-item">
				<a class="nav-link shadow p-3 mb-5 bg-white rounded" id="computador-tab" data-toggle="tab" href="#computador" role="tab" aria-controls="computador" aria-selected="false">Computador</a>
			</li>
			<li class="nav-item">
				<a class="nav-link shadow p-3 mb-5 bg-white rounded" id="manutencao-tab" data-toggle="tab" href="#manutencao" role="tab" aria-controls="manutencao" aria-selected="false">Manutenção</a>
			</li>
		</ul>

		<!-- Painel de abas -->
		<div class="tab-content">
			<div class="tab-pane active" id="jogos" role="tabpanel" aria-labelledby="jogos-tab">
				<div class="container">

					<?php echo validation_errors(); ?> 
					<?php if(isset($mensagens)) echo $mensagens; ?>
					<?php  echo  form_open_multipart('index.php/CadastroJogo/cadastraJogos'); ?><!--Nome do metodo que cadastra-->

					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Título</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="" name="pro_titulo">
						</div>
					</div>  
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Categoria</label>
						<div class="col-sm-9">
							<select id="cat_codigo" class="form-control" name="pro_categoria">
								<option value="" selected>Escolha</option>
								<?php
								$this->load->model('Formulario_model');

								$this->Formulario_model->selectCategoria();					
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Fornecedor</label>
						<div class="col-sm-9">
							<select id="for_cnpj" class="form-control" name="pro_fornecedor">
								<option value="" selected>Escolha</option>
								<?php
								$this->load->model('Formulario_model');
								$this->Formulario_model->selectFornecedor();	
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Classificação</label>
						<div class="col-sm-9">
							<select  class="form-control" name="pro_classificacao" id="cla_codigo">
								<option value="" selected>Escolha</option>
								<?php
								$this->load->model('Formulario_model');
								$this->Formulario_model->selectClassificacao();	
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Ano Lançamento</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="" name="pro_anoLancamento">
						</div>
					</div>  

					<div class="form-group">
						<label for="" class="col-sm-4 col-form-label">Descrição</label>
						<div class="col-sm-9">
							<textarea class="form-control" placeholder="max:500 caracteres" maxlength="500" id="" rows="4" name="pro_descricao"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-sm-4 col-form-label">Sinopse</label>
						<div class="col-sm-9">
							<textarea class="form-control" placeholder="max:250 caracteres" maxlength="250" id="" rows="3" name="pro_sinopse"></textarea>
						</div>
					</div>
					<label for="" class="col-sm-4 col-form-label">Imagem</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="" aria-describedby="" name="pro_foto">
								<label class="custom-file-label" for="">Escolha a imagem</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Preço</label>
						<div class="col-sm-9">
							<input type="number" step="0.01" class="form-control" id="" name="pro_preco">
						</div>
					</div>  
					<button type="submit" class="btn btn-success">Cadastrar</button>

					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="tab-pane" id="cadastros" role="tabpanel" aria-labelledby="cadastros-tab">

				<div class="container">
					<?php echo validation_errors(); ?>
					<?php if(isset($mensagens)) echo $mensagens; ?>
					<?php  echo form_open('index.php/Cadastros/cadastraCategoria'); ?> 

					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Categoria</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="cat_categoria">
						</div>
						<button type="submit" class="btn btn-success" id="btn_cat">Cadastrar</button>
					</div>  

					<?php echo form_close(); ?>

					<?php  echo form_open('index.php/Cadastros/cadastraClassificacao'); ?>

					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Classificação</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="cla_classificacao">
						</div>
						<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>  

					<?php echo form_close(); ?>


					<?php  echo form_open('index.php/Cadastros/cadastraModelo'); ?>

					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Modelo</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="" name="mod_modelo">
						</div>
						<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>
					<?php echo form_close(); ?>

					<?php  echo form_open('index.php/Cadastros/cadastraMarca'); ?>

					<div class="form-group row">
						<div class="col-sm-5">
							<label for="">Marca</label>
							<input type="text" class="form-control" id="" name="mar_marca">
						</div>
						<div class="col-sm-5">
							<label for="" >Fabricante</label>
							<input type="text" class="form-control" id="" name="mar_fabricante">
						</div>
					</div>
					<button type="submit" class="btn btn-success" >Cadastrar</button>
					<?php echo form_close(); ?>

					<?php  echo form_open('index.php/CadastroPecas/cadastraCategoriaPecas'); ?>

					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Categoria Peça</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="catp_nome">
						</div>
						<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>  
					<?php echo form_close(); ?>
				</div>
			</div>
			<!--FIM TAB CADASTRO-->
			<div class="tab-pane" id="pecas" role="tabpanel" aria-labelledby="pecas-tab">
				<?php echo validation_errors(); ?>
				<?php if(isset($mensagens)) echo $mensagens; ?>
				<?php  echo form_open_multipart('index.php/CadastroPecas/cadastraPecas'); ?>
				<div class="container">

					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Nome</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="pec_nome">
						</div>
					</div>  
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Marca</label>
						<div class="col-sm-9">
							<select id="mar_codigo" class="form-control" name="pec_marca">
								<option value="" selected>Escolha</option>
								<?php
								$this->Formulario_model->selectMarca();	
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Modelo</label>
						<div class="col-sm-9">
							<select id="mod_codigo" class="form-control" name="pec_modelo">
								<option value="" selected>Escolha</option>
								<?php
								$this->Formulario_model->selectModelo();	
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-4 col-form-label">Descrição</label>
						<div class="col-sm-9">
							<textarea class="form-control" placeholder="max:500 caracteres" maxlength="500" id="" rows="4" name="pec_descricao"></textarea>
						</div>
					</div>

					<label for="" class="col-sm-4 col-form-label">Imagem</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="imagem" aria-describedby="" name="pec_foto">
								<label class="custom-file-label" for="">Escolha a imagem</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Fornecedor</label>
						<div class="col-sm-9">
							<select id="for_cnpj" class="form-control" name="pec_fornecedor">
								<option value="" selected>Escolha</option>
								<?php
								$this->Formulario_model->selectFornecedor();	
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Preço</label>
						<div class="col-sm-9">
							<input type="number" step="0.01" class="form-control" id=""name="pec_preco">
						</div>
					</div> 
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Categoria</label>
						<div class="col-sm-9">
							<select id="catp_codigo" class="form-control" name="pec_categoria">
								<option value="" selected>Escolha</option>
								<?php
								$this->Formulario_model->selectCategoriaPecas();	
								?>
							</select>
						</div>
					</div> 
					<button type="submit" class="btn btn-success">Cadastrar</button>
					<?php echo form_close(); ?>
				</div>
			</div>
			<div class="tab-pane" id="fornecedor" role="tabpanel" aria-labelledby="fornecedor-tab">
				<div class="container">

					<?php echo validation_errors(); ?>
					<?php if(isset($mensagens)) echo $mensagens; ?>
					<?php  echo form_open('index.php/cadastroFornecedor/cadastraFornecedor'); ?><!--Nome do metodo que cadastra-->

					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">CNPJ</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="" name="for_cnpj" exact_length="14">
						</div>
					</div>  
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Razao Social</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="" name="for_razaoSocial">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Nome Fantasia</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="" name="for_nomeFantasia">
						</div>
					</div>
					<div class="form-group inline">
						<label for="cep" class="col-sm-4 col-form-label">CEP</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="cep" name="for_cep"/>
						</div>
					</div>
					<button type="button" class="btn btn-success" id="btnPesquisar">Pesquisar</button>
					<div class="form-group row">
						<label for="logradouro" class="col-sm-4 col-form-label">Rua</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="rua" name="for_endereco">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Numero</label>
						<!--Dimnuir o tamanho do input-->
						<div class="col-sm-9">
							<input type="text" class="form-control" id="" name="for_numero">
						</div>
					</div>
					<!--CEP DA BAIRRO E CIDADE??????-->
					<div class="form-group row">
						<label for="bairro" class="col-sm-4 col-form-label">Bairro</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="bairro" name="for_bairro">
						</div>
					</div>
					<div class="form-group row">
						<label for="cidade" class="col-sm-4 col-form-label">Cidade</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="cidade" name="for_cidade">
						</div>
					</div>
					<div class="form-group row">
						<label for="uf" class="col-sm-4 col-form-label">Estado</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="estado" name="for_estado">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Telefone</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="" name="for_telefone">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Celular</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="" name="for_celular">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" id="" name="for_email">
						</div>
					</div>
					<button type="submit" class="btn btn-success">Cadastrar</button>

					<?php echo form_close(); ?>
				</div>	
			</div>
			<div class="tab-pane" id="computador" role="tabpanel" aria-labelledby="computador-tab">

				<div class="container">
					<?php echo validation_errors(); ?>
					<?php if(isset($mensagens)) echo $mensagens; ?>
					<?php  echo  form_open_multipart('index.php/CadastroComputador/cadastraComputador'); ?>

					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Nome</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="com_nome">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-4 col-form-label">Descrição</label>
						<div class="col-sm-9">
							<textarea class="form-control" placeholder="max:500 caracteres" maxlength="500" id="" rows="4" name="com_descricao"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Marca</label>
						<div class="col-sm-9">
							<select id="mar_codigo" class="form-control" name="com_marca">
								<option value="" selected>Escolha</option>
								<?php
								$this->Formulario_model->selectMarca();	
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Modelo</label>
						<div class="col-sm-9">
							<select id="mod_codigo" class="form-control" name="com_modelo">
								<option value="" selected>Escolha</option>
								<?php
								$this->Formulario_model->selectModelo();	
								?>

							</select>
						</div>
					</div>
					<label for="" class="col-sm-4 col-form-label">Imagem</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="" aria-describedby="" name="com_foto">
								<label class="custom-file-label" for="">Escolha a imagem</label>
							</div>
						</div>
					</div>
					<!--A ARQUITETURA COLOCA COMO SELECT OU DEIXA DIGITAR???????-->
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Arquitetura</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="com_arquitetura">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Preço</label>
						<div class="col-sm-9">
							<input type="number" step="0.01" class="form-control" id="" name="com_preco">
						</div>
					</div>  
					<button type="submit" class="btn btn-success">Cadastrar</button>
					<?php echo form_close(); ?>
				</div>
			</div> 
			<div class="tab-pane" id="manutencao" role="tabpanel" aria-labelledby="manutencao-tab">

				<div class="container">
					<?php echo validation_errors(); ?>
					<?php if(isset($mensagens)) echo $mensagens; ?>
					<?php  echo  form_open('index.php/Cadastros/cadastraTipoManutencao'); ?>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Tipo de Manutencao</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="tman_nome">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-4 col-form-label">Descrição</label>
						<div class="col-sm-9">
							<textarea class="form-control" placeholder="max:500 caracteres" maxlength="500" id="" rows="4" name="tman_descricao"></textarea>
						</div>
					</div>
					<button type="submit" class="btn btn-success">Cadastrar</button>
					<?php echo form_close();?>
				</div>
				<!--************************************************-->
			</div>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$('#myTab a').on('click', function (e) {
			e.preventDefault()
			$(this).tab('show')
		})

	</script>
	<script type="text/javascript">

		const btnPesquisar = document.querySelector("#btnPesquisar");

		btnPesquisar.addEventListener("click", e =>{ 
	//Bloqueia o evento default
	e.preventDefault();
//pegando valores
const inputDoCep = document.querySelector("#cep");
const valorDoCep = inputDoCep.value;
//fazendo a requisicao
const url = `https://viacep.com.br/ws/${valorDoCep}/json/`;
//fetch retorna uma promise
fetch(url).then(response =>{
	return response.json();
}).then(dado =>{
	if(dado.erro)
	{
		alert("O CEP DIGITADO ESTÁ INVÁLIDO");
		return ;
	}
	atribuirCampos(dado);
})
})
		function atribuirCampos(dado)
		{
			const rua = document.querySelector("#rua");
			const bairro = document.querySelector("#bairro");
			const cidade = document.querySelector("#cidade");
			const estado = document.querySelector("#estado");

			rua.value = dado.logradouro;
			bairro.value = dado.bairro;
			cidade.value = dado.localidade;
			estado.value = dado.uf;
		}
	</script>

	<script type="text/javascript">
	//	$(document).ready(function() {
			// $('#btn_cat').on('click', function() {

			// 	var categoria = $('cat_categoria').val();
			// 	$.ajax({
			// 		url: "<?php //echo base_url("Cadastros/cadastraCategoria");?>",
			// 		type: "POST",
			// 		data: {
			// 			categoria
			// 		},
			// 		cache: false,
			// 		success: function(data){
			// 			alert(data.categoriaOptions);
			// 			// var option = '<option>Selecione a Categoria</option>';
			// 			// $.each(data, function(i, obj){
			// 			// 	option += '<option value="'+obj.cat_codigo+'">'+obj.cat_categoria+'</option>';
			// 			// })
			// 			// $('#cat_codigo').html(option).show();
			// 		}// },
					// error:function(data){
					// 	console.log("erro");
					// }
			// 		})//ajax
			// })
			// });//function ready

		</script>
		</html>