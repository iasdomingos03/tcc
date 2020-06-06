
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style type="text/css">
	

	.wrapper {
		display: flex;
		align-items: stretch;
	}
	#sidebar {
		min-width: 200px;
		max-width: 200px;
		min-height: 100vh;
		/* don't forget to add all the previously mentioned styles here too */
		background:white;
		color:#007bff;
		transition: all 0.3s;

	}
	#sidebar.active {
		margin-left: -250px;
	}
	
	a[data-toggle="collapse"] {
		position: relative;
	}

	.dropdown-toggle::after {
		display: block;
		position: absolute;
		top: 50%;
		right: 20px;
		transform: translateY(-50%);
	}
	/*
    ADDITIONAL DEMO STYLE, NOT IMPORTANT TO MAKE THINGS WORK BUT TO MAKE IT A BIT NICER :)
    */
    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


    body {
    	font-family: 'Poppins', sans-serif;
    	/*background: #fafafa;*/
    }

    #sidebar p.components {
    	font-family: 'Poppins', sans-serif;
    	font-size: 1.1em;
    	font-weight: 300;
    	line-height: 1.7em;
    	color:#007bff;
    }

    a, a:hover, a:focus {
    	color: inherit;
    	text-decoration: none;
    }



    #sidebar .sidebar-header {
    	padding: 20px;
    	/*background: #6d7fcc;*/
    }

    #sidebar ul.components {
    	padding: 20px 0;
    	
    }

    #sidebar ul p {
    	color: #007bff;
    	padding: 10px;
    }

    #sidebar ul li a {
    	padding: 10px;
    	font-size: 1.1em;
    	display: block;
    }
    #sidebar ul li a:hover {
    	color:#007bff;
    	background:white;
    }

    #sidebar ul li.active > a, a[aria-expanded="true"] {
    	color:white;
    	background:#007bff;
    }
    ul ul a {
    	font-size: 0.9em !important;
    	padding-left: 30px !important;
    	background: white;
    }
</style>
<body>   
	<header class="navbar navbar-expand navbar-light shadow p-3 mb-5 bg-white rounded">
		<div class="navbar-nav-scroll">
			<ul class="navbar-nav bd-navbar-nav flex-row">
				<li class="nav-item ">
					<a class="nav-link text-primary" href=<?php echo base_url() ?>Cadastros/exibeFormulario/>Cadastrar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-primary" href=<?php echo base_url() ?>Exibir/exibeLista/>Listar</a>
				</li>
			</ul>
		</div>
	</header>

	<div class="wrapper">
		<nav id="sidebar">
			<ul class="list-unstyled components">
				<li>
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">SERVIÇOS</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<input type="radio" name="rdb" value="Jogos"/>
							<label>Jogos</label>
						</li>
						<li>
							<input type="radio" name="rdb" value="Computador"/>
							<label>Computador</label>
						</li>
						<li>
							<input type="radio" name="rdb" value="Manutencao">
							<label>Manutenção</label>
						</li>
						<li>
							<input type="radio" name="rdb" value="Pecas">
							<label>Peças</label>
						</li>
						<li>
							<input type="radio" name="rdb" value="Montagem">
							<label>Montagem</label>
						</li>
					</ul>
				</li>
			</ul>
			<!-- <li> -->
					<!-- <a href="#">About</a>
				</li>
				<li>
					<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Jogos</a>
					<ul class="collapse list-unstyled" id="pageSubmenu">
						<li>
							<a href="#"></a>
						</li>
						<li>
							<a href="#">Page 2</a>
						</li>
						<li>
							<a href="#">Page 3</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Portfolio</a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li>
			</ul>-->
		</nav> 

	<!-- <nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Jogos</a></li>
			<li class="breadcrumb-item"><a href="#">Categorias</a></li>
			<li class="breadcrumb-item active" aria-current="page"></li>
		</ol>
	</nav> -->

	
	<div class="container theme-showcase flex-row" role="main" id="container-computador">
		<div class="row">
			<div class="col-md-7">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Titulo</th>
							<th>Preço</th>
						</tr>
					</thead>
					<tbody> 
						<?php 
						$this->load->model('Teste_model');

						$teste= $this->Teste_model->exibirComputador();

						foreach($teste->result_array() as $rows_computador){ 
							$com_codigo=$rows_computador['com_codigo'];
								// $pro_categoria=$rows_jogos['pro_categoria'];
							?>
							<tr>
								<td><?php echo $rows_computador['com_codigo']; ?></td>
								<td><?php echo $rows_computador['com_nome']; ?></td>
								<td><?php echo $rows_computador['com_preco']; ?></td>

								<td>
									<?php 
									$imarc=$this->Teste_model->innerJoinMarca($com_codigo);
									$imodc=$this->Teste_model->innerJoinModelo($com_codigo);




									?>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExibeComputador<?php echo $rows_computador['com_codigo'];?>" data-whatevercodigo="<?php echo $rows_computador['com_codigo']; ?>" 
										data-whatevernome="<?php echo $rows_computador['com_nome'];?>"
										data-whateverdescricao="<?php echo $rows_computador['com_descricao']; ?>"
										data-whatevermarca="<?php echo $imarc[0]->mar_marca; ?>"
										data-whatevermodelo="<?php echo $imodc[0]->mod_modelo; ?>" 
										data-whateverarquitetura="<?php echo $rows_computador['com_arquitetura']; ?>"
										data-whateverpreco="<?php echo $rows_computador['com_preco']; ?>">
									Visualizar</button>
									<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAlteraComputador" data-whatevercodigo="<?php echo $rows_computador['com_codigo']; ?>" 
										data-whatevernome="<?php echo $rows_computador['com_nome'];?>"
										data-whateverdescricao="<?php echo $rows_computador['com_descricao']; ?>"
										data-whatevermarca="<?php echo $rows_computador['com_marca']; ?>"
										data-whatevermodelo="<?php echo $rows_computador['com_modelo']; ?>"
										data-whateverarquitetura="<?php echo $rows_computador['com_arquitetura']; ?>"
										data-whateverpreco="<?php echo $rows_computador['com_preco']; ?>">
									Editar</button>
									<button type="button" class="btn btn-danger">Apagar</button>
									<!-- Inicio Modal Modaaaaal de mostrar -->
									<!--Como é um modal só, usa-se o data-whatever-->
									<div class="modal fade" id="modalExibeComputador<?php echo $rows_computador['com_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												</div>
												<div class="modal-body">
													<table class="table">
														<thead>
															<tbody>
																<tr class="thead-dark">
																	<th scope="row">Código</th>
																	<td><?php echo $rows_computador['com_codigo']; ?></td>
																</tr>
																<tr class="thead-dark">
																	<th scope="row">Nome</th>
																	<td><?php echo $rows_computador['com_nome']; ?></td>
																</tr>
																<tr class="thead-dark">
																	<th scope="row">Descrição</th>
																	<td><?php echo $rows_computador['com_descricao']; ?></td>
																</tr>
																<tr class="thead-dark">
																	<th scope="row">Marca</th>
																	<td><?php echo $imarc[0]->mar_marca; ?></td>
																</tr>
																<tr class="thead-dark">
																	<th scope="row">Modelo</th>
																	<td><?php echo $imodc[0]->mod_modelo; ?></td>
																</tr>
																<tr class="thead-dark">
																	<th scope="row">Arquitetura</th>
																	<td><?php echo $rows_computador['com_arquitetura']; ?></td>
																</tr>
																<tr class="thead-dark">
																	<th scope="row">Preço</th>
																	<td><?php echo $rows_computador['com_preco']; ?></td>
																</tr>
															</tbody>
														</thead>
													</table>
												</div>
											</div>
										</div>
									</div>

									<!--Modal que altera-->
									<div class="modal fade" id="modalAlteraComputador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel">Jogo</h4>
												</div>
												<div class="modal-body">
													<?php echo validation_errors(); ?>
													<?php if(isset($mensagens)) echo $mensagens; ?>
													<?php  echo  form_open_multipart('Exibir/alteraComputador'); ?>

													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Nome</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="com_nome" id="com_nome">
														</div>
													</div>
													<div class="form-group">
														<label for="" class="col-sm-4 col-form-label">Descrição</label>
														<div class="col-sm-9">
															<textarea class="form-control" placeholder="max:500 caracteres" maxlength="500" id="com_descricao" rows="4" name="com_descricao"></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Marca</label>
														<div class="col-sm-9">
															<select id="mar_codigo" class="form-control" name="com_marca">
																<option selected>Escolha</option>
																<?php
																$this->Teste_model->selectMarca();	
																?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Modelo</label>
														<div class="col-sm-9">
															<select id="mod_codigo" class="form-control" name="com_modelo">
																<option selected>Escolha</option>
																<?php
																$this->Teste_model->selectModelo();	
																?>

															</select>
														</div>
													</div>
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Arquitetura</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="com_arquitetura" id="com_arquitetura">
														</div>
													</div>
													<div class="form-group row">
														<label for="com_preco" class="col-sm-4 col-form-label">Preço</label>
														<div class="col-sm-9">
															<input type="number" step="0.01" class="form-control" id="com_preco" name="com_preco">
														</div>
													</div>  
													<input name="com_codigo" type="hidden" class="form-control" id="com_codigo" value="">
													<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
													<button type="submit" class="btn btn-danger">Alterar</button>

													<?php echo form_close(); ?>
												</div>

											</div>
										</div>
									</div>
									<!-- Fim Modal -->
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>		
			</div>


			<div class="container theme-showcase flex-row" role="main" id="container-jogos">
				<div class="row">
					<div class="col-md-7">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Titulo</th>
									<th>Preço</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$this->load->model('Teste_model');

								$teste= $this->Teste_model->exibirJogos();

								foreach($teste->result_array() as $rows_jogos){ 
									$pro_codigo=$rows_jogos['pro_codigo'];
								// $pro_categoria=$rows_jogos['pro_categoria'];
									?>
									<tr>
										<td><?php echo $rows_jogos['pro_codigo']; ?></td>
										<td><?php echo $rows_jogos['pro_titulo']; ?></td>
										<td><?php echo $rows_jogos['pro_preco']; ?></td>

										<td>
											<?php 
											$icj=$this->Teste_model->innerJoinCategoria($pro_codigo);
											$ifj=$this->Teste_model->innerJoinFornecedor($pro_codigo);
											$iclaj=$this->Teste_model->innerJoinClassificacao($pro_codigo);




											?>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExibeJogo<?php echo $rows_jogos['pro_codigo'];?>" data-whatevercodigo="<?php echo $rows_jogos['pro_codigo']; ?>" 
												data-whatevernome="<?php echo $rows_jogos['pro_titulo']; ?>"
												data-whatevercategoria="<?php echo $icj[0]->cat_categoria; ?>"
												data-whateverfornecedor="<?php echo $ifj[0]->for_nomeFantasia; ?>" data-whateverclassificacao="<?php echo $iclaj[0]->cla_classificacao; ?>"
												data-whateverAno="<?php echo $rows_jogos['pro_anoLancamento'] ?>"
												data-whateversinopse="<?php echo $rows_jogos['pro_sinopse']; ?>"
												data-whateverdescricao="<?php echo $rows_jogos['pro_descricao']; ?>"
												data-whateverpreco="<?php echo $rows_jogos['pro_preco']; ?>">
											Visualizar</button>
											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAlteraJogo" data-whatevercodigo="<?php echo $rows_jogos['pro_codigo']; ?>" data-whatevernome="<?php echo $rows_jogos['pro_titulo']; ?>"
												data-whatevercategoria="<?php echo $rows_jogos['pro_categoria']; ?>"
												data-whateverfornecedor="<?php echo $rows_jogos['pro_fornecedor']; ?>" data-whateverclassificacao="<?php echo $rows_jogos['pro_classificacao']; ?>"
												data-whateverAno="<?php echo $rows_jogos['pro_anoLancamento'] ?>"
												data-whateversinopse="<?php echo $rows_jogos['pro_sinopse']; ?>"
												data-whateverdescricao="<?php echo $rows_jogos['pro_descricao']; ?>"
												data-whateverpreco="<?php echo $rows_jogos['pro_preco']; ?>">
											Editar</button>
											<button type="button" class="btn btn-danger">Apagar</button>
										</td>
									</tr>
									<!-- Inicio Modal Modaaaaal de mostrar -->
									<!--Como é um modal só, usa-se o data-whatever-->
									<div class="modal fade" id="modalExibeJogo<?php echo $rows_jogos['pro_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												</div>
												<div class="modal-body">
													<?php 
													?>
													<p><?php echo "<b>Codigo</b>:".$rows_jogos['pro_codigo']; ?></p>
													<p><?php echo "<b>Titulo</b>:".$rows_jogos['pro_titulo']; ?></p>
													<p><?php echo "<b>Categoria</b>:".$icj[0]->cat_categoria; ?></p>
													<p><?php echo "<b>Fornecedor</b>:".$ifj[0]->for_nomeFantasia; ?></p>
													<p><?php echo "<b>Classificação</b>: ".$iclaj[0]->cla_classificacao; ?></p>
													<p><?php echo "<b>Ano</b>:".$rows_jogos['pro_anoLancamento']; ?></p>
													<p><?php echo "<b>Sinopse</b>: ".$rows_jogos['pro_sinopse']; ?></p>
													<p><?php echo "<b>Descrição</b>: ".$rows_jogos['pro_descricao']; ?></p>
													<p><?php echo "<b>Preço</b>: ".$rows_jogos['pro_preco']; ?></p>
												</div>
											</div>
										</div>
									</div>

									<!--Modal que altera-->
									<div class="modal fade" id="modalAlteraJogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel">Jogo</h4>
												</div>
												<div class="modal-body">
													<?php echo validation_errors(); ?>
													<?php if(isset($mensagens)) echo $mensagens; ?>
													<?php  echo  form_open_multipart('Exibir/alteraJogo'); ?>
													<div class="form-group">
														<label for="nome" class="control-label">Nome:</label>
														<input name="pro_titulo" type="text" class="form-control" id="pro_titulo" value="">
													</div>
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Categoria</label>
														<div class="col-sm-9">
															<select id="cat_codigo" class="form-control" name="pro_categoria">
																<?php
																$this->Teste_model->selectCategoria();
																?>
															</select>
														</div>
													</div>
													<!------------------------------------ CERTO DAQUI PRA CIMA----------------------------->

													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Fornecedor</label>
														<div class="col-sm-9">
															<select id="for_cnpj" class="form-control" name="pro_fornecedor">
																<?php
																$this->Teste_model->selectFornecedor();	
																?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Classificação</label>
														<div class="col-sm-9">
															<select  class="form-control" name="pro_classificacao" id="cla_codigo">
																<?php
																$this->Teste_model->selectClassificacao();	
																?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label for="pro_anoLancamento" class="col-sm-4 col-form-label">Ano</label>
														<input type="number" name="pro_anoLancamento" class="form-control" id="pro_anoLancamento" value="" />
													</div> 

													<div class="form-group">
														<label for="" class="col-sm-4 col-form-label">Descrição</label>
														<div class="col-sm-9">
															<textarea class="form-control" placeholder="max:500 caracteres" maxlength="500" id="pro_descricao" rows="4" name="pro_descricao"></textarea>
														</div>
													</div>

													<div class="form-group">
														<label for="" class="col-sm-4 col-form-label">Sinopse</label>
														<div class="col-sm-9">
															<textarea class="form-control" placeholder="max:250 caracteres" maxlength="250" id="pro_sinopse" rows="3" name="pro_sinopse"></textarea>
														</div>
													</div>
													<!------------------------------------ CERTO DAQUI PRA BAIXO----------------------------->

													<div class="form-group row">
														<label for="pro_preco" class="col-sm-4 col-form-label">Preço</label>
														<div class="col-sm-9">
															<input type="number" step="0.01" class="form-control" id="pro_preco"name="pro_preco">
														</div>
													</div>
													<input name="pro_codigo" type="hidden" class="form-control" id="pro_codigo" value="">
													<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
													<button type="submit" class="btn btn-danger">Alterar</button>

													<?php echo form_close(); ?>
												</div>

											</div>
										</div>
									</div>
									<!-- Fim Modal -->
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>		
			</div>



			<div class="container theme-showcase flex-row" role="main" id="container-manutencao">
				<div class="row">
					<div class="col-md-7">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Titulo</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$this->load->model('Teste_model');

								$teste= $this->Teste_model->exibirManutencao();

								foreach($teste->result_array() as $rows_tmanutencao){ 
									$tman_codigo=$rows_tmanutencao['tman_codigo'];
								// $pro_categoria=$rows_jogos['pro_categoria'];
									?>
									<tr>
										<td><?php echo $rows_tmanutencao['tman_codigo']; ?></td>
										<td><?php echo $rows_tmanutencao['tman_nome']; ?></td>
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExibeTipoManutencao<?php echo $rows_tmanutencao['tman_codigo'];?>" data-whatevercodigotman="<?php echo $rows_tmanutencao['tman_codigo']; ?>" 
												data-whatevernometman="<?php echo $rows_tmanutencao['tman_nome']; ?>"
												data-whateverdescricaotman="<?php echo $rows_tmanutencao['tman_descricao']; ?>">
											Visualizar</button>
											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAlteraTipoManutencao" data-whatevercodigotman="<?php echo $rows_tmanutencao['tman_codigo']; ?>" 
												data-whatevernometman="<?php echo $rows_tmanutencao['tman_nome']; ?>"
												data-whateverdescricaotman="<?php echo $rows_tmanutencao['tman_descricao']; ?>">
											Editar</button>
											<button type="button" class="btn btn-danger">Apagar</button>
										</td>
									</tr>
									<!-- Inicio Modal Modaaaaal de mostrar -->
									<!--Como é um modal só, usa-se o data-whatever-->
									<div class="modal fade" id="modalExibeTipoManutencao<?php echo $rows_tmanutencao['tman_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												</div>
												<div class="modal-body">
													<?php 
													?>
													<p><?php echo "<b>Código: </b>".$rows_tmanutencao['tman_codigo']; ?></p>
													<p><?php echo "<b>Nome: </b>".$rows_tmanutencao['tman_nome']; ?></p>
													<p><?php echo "<b>Descrição: </b>".$rows_tmanutencao['tman_descricao']; ?></p>
												</div>
											</div>
										</div>
									</div>

									<!--Modal que altera-->
									<div class="modal fade" id="modalAlteraTipoManutencao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel">Jogo</h4>
												</div>
												<div class="modal-body">
													<?php echo validation_errors(); ?>
													<?php if(isset($mensagens)) echo $mensagens; ?>
													<?php  echo  form_open_multipart('Exibir/alteraTipoManutencao'); ?>
													<div class="form-group">
														<label for="tman_nome" class="control-label">Tipo Manutenção:</label>
														<input name="tman_nome" type="text" class="form-control" id="tman_nome" value="">
													</div>

													<div class="form-group">
														<label for="" class="col-sm-4 col-form-label">Descrição</label>
														<div class="col-sm-9">
															<textarea class="form-control" placeholder="max:500 caracteres" maxlength="500" id="tman_descricao" rows="4" name="tman_descricao"></textarea>
														</div>
													</div>

													<input name="tman_codigo" type="hidden" class="form-control" id="tman_codigo" value="">
													<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
													<button type="submit" class="btn btn-danger">Alterar</button>

													<?php echo form_close(); ?>
												</div>

											</div>
										</div>
									</div>
									<!-- Fim Modal -->
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>		
			</div>



			<div class="container theme-showcase flex-row" role="main" id="container-pecas">
				<div class="row">
					<div class="col-md-7">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Titulo</th>
									<th>Preço</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$this->load->model('Teste_model');

								$teste= $this->Teste_model->exibirPecasComputador();

								foreach($teste->result_array() as $rows_pecas){ 
									$pec_codigo=$rows_pecas['pec_codigo'];
								// $pro_categoria=$rows_jogos['pro_categoria'];
									?>
									<tr>
										<td><?php echo $rows_pecas['pec_codigo']; ?></td>
										<td><?php echo $rows_pecas['pec_nome']; ?></td>
										<td><?php echo $rows_pecas['pec_preco']; ?></td>

										<td>
											<?php 
											$icp=$this->Teste_model->innerJoinCategoriaPecas($pec_codigo);
											$ifp=$this->Teste_model->innerJoinFornecedorPecas($pec_codigo);
											$imarp=$this->Teste_model->innerJoinMarcaPecas($pec_codigo);
											$imodp=$this->Teste_model->innerJoinModeloPecas($pec_codigo);




											?>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExibePecas<?php echo $rows_pecas['pec_codigo'];?>" data-whatevercodigo="<?php echo $rows_pecas['pec_codigo']; ?>" 
												data-whatevernome="<?php echo $rows_pecas['pec_nome']; ?>"
												data-whatevercategoria="<?php echo $icp[0]->catp_nome; ?>"
												data-whateverfornecedor="<?php echo $ifp[0]->for_nomeFantasia; ?>"
												data-whatevermarca="<?php echo $imarp[0]->mar_marca; ?>"
												data-whatevermodelo="<?php echo $imodp[0]->mod_modelo; ?>"
												data-whateverdescricao="<?php echo $rows_pecas['pec_descricao']; ?>"
												data-whateverpreco="<?php echo $rows_pecas['pec_preco']; ?>">
											Visualizar</button>
											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAlteraPecas" data-whatevercodigo="<?php echo $rows_pecas['pec_codigo']; ?>" data-whatevernome="<?php echo $rows_pecas['pec_nome']; ?>"
												data-whatevercategoria="<?php echo $rows_pecas['pec_categoria']; ?>"
												data-whateverfornecedor="<?php echo $rows_pecas['pec_fornecedor']; ?>"
												data-whatevermarca="<?php echo $rows_pecas['pec_marca']; ?>"
												data-whatevermodelo="<?php echo $rows_pecas['pec_modelo']; ?>"
												data-whateverdescricao="<?php echo $rows_pecas['pec_descricao']; ?>"
												data-whateverpreco="<?php echo $rows_pecas['pec_preco']; ?>">
											Editar</button>
											<button type="button" class="btn btn-danger">Apagar</button>
										</td>
									</tr>
									<!-- Inicio Modal Modaaaaal de mostrar -->
									<!--Como é um modal só, usa-se o data-whatever-->
									<div class="modal fade" id="modalExibePecas<?php echo $rows_pecas['pec_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												</div>
												<div class="modal-body">

													<p><?php echo "<b>Código: </b>".$rows_pecas['pec_codigo']; ?></p>
													<p><?php echo "<b>Nome: </b>".$rows_pecas['pec_nome']; ?></p>
													<p><?php echo "<b>Categoria: </b>".$icp[0]->catp_nome; ?></p>
													<p><?php echo "<b>Fornecedor: </b>".$ifp[0]->for_nomeFantasia; ?></p>
													<p><?php echo "<b>Marca: </b>".$imarp[0]->mar_marca; ?></p>
													<p><?php echo "<b>Modelo: </b>".$imodp[0]->mod_modelo; ?></p>
													<p><?php echo "<b>Descrição: </b>".$rows_pecas['pec_descricao']; ?></p>
													<p><?php echo "<b>Preço: </b>".$rows_pecas['pec_preco']; ?></p>
												</div>
											</div>
										</div>
									</div>

									<!--Modal que altera-->
									<div class="modal fade" id="modalAlteraPecas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel">Pecas</h4>
												</div>
												<div class="modal-body">
													<?php echo validation_errors(); ?>
													<?php if(isset($mensagens)) echo $mensagens; ?>
													<?php  echo  form_open_multipart('Exibir/alteraPeca'); ?>

													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Nome</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="pec_nome" id="pec_nome">
														</div>
													</div>  
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Marca</label>
														<div class="col-sm-9">
															<select id="mar_codigo" class="form-control" name="pec_marca">
																<option selected>Escolha</option>
																<?php
																$this->Teste_model->selectMarca();	
																?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Modelo</label>
														<div class="col-sm-9">
															<select id="mod_codigo" class="form-control" name="pec_modelo">
																<option selected>Escolha</option>
																<?php
																$this->Teste_model->selectModelo();	
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label for="" class="col-sm-4 col-form-label">Descrição</label>
														<div class="col-sm-9">
															<textarea class="form-control" placeholder="max:500 caracteres" maxlength="500" id="pec_descricao" rows="4" name="pec_descricao"></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Fornecedor</label>
														<div class="col-sm-9">
															<select id="for_cnpj" class="form-control" name="pec_fornecedor">
																<?php
																$this->Teste_model->selectFornecedor();	
																?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Preço</label>
														<div class="col-sm-9">
															<input type="number" step="0.01" class="form-control" id="pec_preco"name="pec_preco">
														</div>
													</div> 
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Categoria</label>
														<div class="col-sm-9">
															<select id="catp_codigo" class="form-control" name="pec_categoria">
																<option selected>Escolha</option>
																<?php
																$this->Teste_model->selectCategoriaPecas();	
																?>
															</select>
														</div>
													</div> 
													<input name="pec_codigo" type="hidden" class="form-control" id="pec_codigo" value="">
													<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
													<button type="submit" class="btn btn-danger">Alterar</button>

													<?php echo form_close(); ?>
												</div>

											</div>
										</div>
									</div>
									<!-- Fim Modal -->
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>		
			</div>

		</div> <!--Wapper-->


	</body>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
			});

		});
	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			$("#container-computador").hide();
			$("#container-jogos").hide();
			$("#container-manutencao").hide();
			$("#container-pecas").hide();
			$("input[name='rdb']").click(function(){
				var select = $(this).val();
				console.log(select);
				if (select == "Jogos") {
					$("#container-jogos").show();
					$("#container-computador").hide();
					$("#container-manutencao").hide();
					$("#container-pecas").hide();
				}else if(select=="Computador"){
					$("#container-jogos").hide();
					$("#container-computador").show();
					$("#container-manutencao").hide();
					$("#container-pecas").hide();
				}else if(select=="Manutencao"){
					$("#container-manutencao").show();
					$("#container-computador").hide();
					$("#container-jogos").hide();
					$("#container-pecas").hide();
				}else if(select=="Pecas"){
					$("#container-manutencao").hide();
					$("#container-computador").hide();
					$("#container-jogos").hide();
					$("#container-pecas").show();
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
		  var anoLancamento = button.data('whateverAno')
		  var descricao = button.data('whateverdescricao')
		  var sinopse = button.data('whateversinopse')
		  var preco = button.data('whateverpreco')
		  

		  var modal = $(this)
		  modal.find('.modal-title').text(codigo)
		  modal.find('#pro_codigo').val(codigo)
		  modal.find('#pro_titulo').val(nome)
		  modal.find(".modal-body select[name='pro_categoria']").val(categoria)
		  modal.find(".modal-body select[name='pro_fornecedor']").val(fornecedor)
		  modal.find(".modal-body select[name='pro_classificacao']").val(classificacao)
		  modal.find("#pro_anoLancamento").val(anoLancamento)
		  modal.find('#pro_descricao').val(descricao)
		  modal.find('#pro_sinopse').val(sinopse)
		  modal.find('#pro_preco').val(preco)
		})

		$('#modalAlteraComputador').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var codigoC = button.data('whatevercodigo') 
			var nomeC = button.data('whatevernome')
			var descricaoC = button.data('whateverdescricao')
			var marcaC = button.data('whatevermarca')
			var modeloC = button.data('whatevermodelo')
			var arquitetura= button.data('whateverarquitetura')
			var precoC = button.data('whateverpreco')

			var modal = $(this)
			modal.find('.modal-title').text(codigoC)
			modal.find('#com_codigo').val(codigoC)
			modal.find('#com_nome').val(nomeC)
			modal.find('#com_descricao').val(descricaoC)
			modal.find(".modal-body select[name='com_marca']").val(marcaC)
			modal.find(".modal-body select[name='com_modelo']").val(modeloC)
			modal.find('#com_arquitetura').val(arquitetura)
			modal.find('#com_preco').val(precoC)

		})

		$('#modalAlteraTipoManutencao').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var codigotman = button.data('whatevercodigotman') 
			var nometman = button.data('whatevernometman')
			var descricaotman = button.data('whateverdescricaotman')

			var modal = $(this)
			modal.find('.modal-title').text(codigotman)
			modal.find('#tman_codigo').val(codigotman)
			modal.find('#tman_nome').val(nometman)
			modal.find('#tman_descricao').val(descricaotman)
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
		})
	</script>
	</html>