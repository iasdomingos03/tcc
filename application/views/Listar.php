<?php
defined('BASEPATH') or exit('No direct sript acess allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/estilo.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/menuestilo2.css">

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
				<li class="nav-item">
					<a class="nav-link" href=<?php echo base_url() ?>index.php/Pedidos/exibePedidos/>Pedidos</a>
				</li>
				<li class="nav-item">
					<a class="btn btn-success" href=<?=base_url()?>index.php/Login/logoffAdm/>Logoff</a>
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
					</ul>
				</li>
			</ul>
		</nav> 

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
											data-whateverfoto="<?php echo $rows_computador['com_foto']; ?>"
											data-whateverarquitetura="<?php echo $rows_computador['com_arquitetura']; ?>"
											data-whateverpreco="<?php echo $rows_computador['com_preco']; ?>"
											data-whateverstatus="<?php echo $rows_computador['com_status']; ?>">
										Visualizar</button>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAlteraComputador" data-whatevercodigo="<?php echo $rows_computador['com_codigo']; ?>" 
											data-whatevernome="<?php echo $rows_computador['com_nome'];?>"
											data-whateverdescricao="<?php echo $rows_computador['com_descricao']; ?>"
											data-whatevermarca="<?php echo $rows_computador['com_marca']; ?>"
											data-whatevermodelo="<?php echo $rows_computador['com_modelo']; ?>"
											data-whateverfoto="<?php echo $rows_computador['com_foto']; ?>"
											data-whateverarquitetura="<?php echo $rows_computador['com_arquitetura']; ?>"
											data-whateverpreco="<?php echo $rows_computador['com_preco']; ?>"
											data-whateverstatus="<?php echo $rows_computador['com_status']; ?>">
										Editar</button>

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
																		<td id='limit'><?php echo $rows_computador['com_descricao']; ?></td>
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
																		<th scope="row">Imagem</th>
																		<td><?php echo $rows_computador['com_foto']; ?></td>
																	</tr>
																	<tr class="thead-dark">
																		<th scope="row">Arquitetura</th>
																		<td><?php echo $rows_computador['com_arquitetura']; ?></td>
																	</tr>
																	<tr class="thead-dark">
																		<th scope="row">Preço</th>
																		<td><?php echo $rows_computador['com_preco']; ?></td>
																	</tr>
																	<tr class="thead-dark">
																		<th scope="row">Status</th>
																		<td><?php echo $rows_computador['com_status']; ?></td>
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
														<?php  echo  form_open_multipart('index.php/Exibir/alteraComputador'); ?>

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
														<label for="" class="col-sm-4 col-form-label">Imagem</label>
														<div class="col-sm-9">
															<div class="input-group">
																<div class="custom-file">
																	<input type="file" class="custom-file-input" id="com_foto" aria-describedby="" name="com_foto">
																	<label class="custom-file-label" for="">Escolha a imagem</label>
																</div>
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
														<div class="form-group row">
															<label for="com_status" class="col-sm-4 col-form-label">Ativar/Desativar</label>
															<input type="checkbox" name="com_status" id="com_status" data-toggle="tooltip" data-placement="top" title="" id="com_status" onmousemove="checadoC()">
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
													data-whateverano="<?php echo $rows_jogos['pro_anoLancamento'] ?>"
													data-whateversinopse="<?php echo $rows_jogos['pro_sinopse']; ?>"
													data-whateverdescricao="<?php echo $rows_jogos['pro_descricao']; ?>"
													data-whateverfoto="<?php echo $rows_jogos['pro_foto']; ?>"
													data-whateverpreco="<?php echo $rows_jogos['pro_preco']; ?>"
													data-whateverstatus="<?php echo $rows_jogos['pro_status']; ?>">
												Visualizar</button>
												<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAlteraJogo" data-whatevercodigo="<?php echo $rows_jogos['pro_codigo']; ?>" data-whatevernome="<?php echo $rows_jogos['pro_titulo']; ?>"
													data-whatevercategoria="<?php echo $rows_jogos['pro_categoria']; ?>"
													data-whateverfornecedor="<?php echo $rows_jogos['pro_fornecedor']; ?>" data-whateverclassificacao="<?php echo $rows_jogos['pro_classificacao']; ?>"
													data-whateverano="<?php echo $rows_jogos['pro_anoLancamento'] ?>"
													data-whateversinopse="<?php echo $rows_jogos['pro_sinopse']; ?>"
													data-whateverdescricao="<?php echo $rows_jogos['pro_descricao']; ?>"
													data-whateverfoto="<?php echo $rows_jogos['pro_foto']; ?>"
													data-whateverpreco="<?php echo $rows_jogos['pro_preco']; ?>"
													data-whateverstatus="<?php echo $rows_jogos['pro_status']; ?>">
												Editar</button>
												<!-- Inicio Modal Modaaaaal de mostrar -->
												<!--Como é um modal só, usa-se o data-whatever-->
												<div class="modal fade" id="modalExibeJogo<?php echo $rows_jogos['pro_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
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
																				<td><?php echo $rows_jogos['pro_codigo']; ?></td>
																			</tr>
																			<tr class="thead-dark">
																				<th scope="row">Nome</th>
																				<td><?php echo $rows_jogos['pro_titulo']; ?></td>
																			</tr>
																			<tr class="thead-dark">
																				<th scope="row">Categoria</th>
																				<td><?php echo $icj[0]->cat_categoria; ?></td>
																			</tr>
																			<tr class="thead-dark">
																				<th scope="row">Fornecedor</th>
																				<td><?php echo $ifj[0]->for_nomeFantasia; ?></td>
																			</tr>
																			<tr class="thead-dark">
																				<th scope="row">Classificação</th>
																				<td><?php echo $iclaj[0]->cla_classificacao; ?></td>
																			</tr>
																			<tr class="thead-dark">
																				<th scope="row">Ano</th>
																				<td><?php echo $rows_jogos['pro_anoLancamento'];  ?></td>
																			</tr>
																			<tr class="thead-dark">
																				<th scope="row">Sinopse</th>
																				<td><?php echo $rows_jogos['pro_sinopse'];  ?></td>
																			</tr>
																			<tr class="thead-dark">
																				<th scope="row">Imagem</th>
																				<td><?php echo $rows_jogos['pro_foto'];  ?></td>
																			</tr>
																			<tr class="thead-dark">
																				<th scope="row">Descrição</th>
																				<td><?php echo $rows_jogos['pro_descricao'];  ?></td>
																			</tr>
																			<tr class="thead-dark">
																				<th scope="row">Preço</th>
																				<td><?php echo $rows_jogos['pro_preco']; ?></td>
																			</tr>
																			<tr class="thead-dark">
																				<th scope="row">Status</th>
																				<td><?php echo $rows_jogos['pro_status']; ?></td>
																			</tr>
																		</tbody>
																	</thead>
																</table>


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
																<?php  echo  form_open_multipart('index.php/Exibir/alteraJogo'); ?>
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
																<div class="form-group">
																	<label for="pro_anoLancamento" class="col-sm-4 col-form-label">Ano</label>
																	<input type="number" name="pro_anoLancamento" class="form-control" id="pro_anoLancamento"/>
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
																<label for="" class="col-sm-4 col-form-label">Imagem</label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<div class="custom-file">
																			<input type="file" class="custom-file-input" id="pro_foto" aria-describedby="" name="pro_foto">
																			<label class="custom-file-label" for="">Escolha a imagem</label>
																		</div>
																	</div>
																</div>
																<!------------------------------------ CERTO DAQUI PRA BAIXO----------------------------->

																<div class="form-group row">
																	<label for="pro_preco" class="col-sm-4 col-form-label">Preço</label>
																	<div class="col-sm-9">
																		<input type="number" step="0.01" class="form-control" id="pro_preco"name="pro_preco">
																	</div>
																</div>
																<div class="form-group row">
																	<label for="pro_status" class="col-sm-4 col-form-label">Ativar/Desativar</label>
																	<input type="checkbox" name="pro_status" data-toggle="tooltip" data-placement="top" title="" id="pro_status" onmousemove="checadoJ()">
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
															data-whateverdescricaotman="<?php echo $rows_tmanutencao['tman_descricao']; ?>"
															data-whateverstatustman="<?php echo $rows_tmanutencao['tman_status']; ?>">
														Visualizar</button>
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAlteraTipoManutencao" data-whatevercodigotman="<?php echo $rows_tmanutencao['tman_codigo']; ?>" 
															data-whatevernometman="<?php echo $rows_tmanutencao['tman_nome']; ?>"
															data-whateverdescricaotman="<?php echo $rows_tmanutencao['tman_descricao']; ?>"
															data-whateverstatustman="<?php echo $rows_tmanutencao['tman_status']; ?>">
														Editar</button>								
														<!-- Inicio Modal Modaaaaal de mostrar -->
														<!--Como é um modal só, usa-se o data-whatever-->
														<div class="modal fade" id="modalExibeTipoManutencao<?php echo $rows_tmanutencao['tman_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
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
																						<td><?php echo$rows_tmanutencao['tman_codigo']; ?></td>
																					</tr>
																					<tr class="thead-dark">
																						<th scope="row">Nome</th>
																						<td><?php echo $rows_tmanutencao['tman_nome']; ?></td>
																					</tr>
																					<tr class="thead-dark">
																						<th scope="row">Descrição</th>
																						<td><?php echo $rows_tmanutencao['tman_descricao']; ?></td>
																					</tr>
																					<tr class="thead-dark">
																						<th scope="row">Status</th>
																						<td><?php echo $rows_tmanutencao['tman_status']; ?></td>
																					</tr>
																				</tbody>
																			</thead>
																		</table>
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
																		<?php  echo  form_open_multipart('index.php/Exibir/alteraTipoManutencao'); ?>
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
																		<div class="form-group row">
																			<label for="tman_status" class="col-sm-4 col-form-label">Ativar/Desativar</label>
																			<input type="checkbox" name="tman_status" data-toggle="tooltip" data-placement="top" title="" id="tman_status" onmousemove="checadoM()">
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
																	data-whateverpreco="<?php echo $rows_pecas['pec_preco']; ?>"
																	data-whateverstatus="<?php echo $rows_pecas['pec_status']; ?>">
																Visualizar</button>
																<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAlteraPecas" data-whatevercodigo="<?php echo $rows_pecas['pec_codigo']; ?>" data-whatevernome="<?php echo $rows_pecas['pec_nome']; ?>"
																	data-whatevercategoria="<?php echo $rows_pecas['pec_categoria']; ?>"
																	data-whateverfornecedor="<?php echo $rows_pecas['pec_fornecedor']; ?>"
																	data-whatevermarca="<?php echo $rows_pecas['pec_marca']; ?>"
																	data-whatevermodelo="<?php echo $rows_pecas['pec_modelo']; ?>"
																	data-whateverdescricao="<?php echo $rows_pecas['pec_descricao']; ?>"
																	data-whateverpreco="<?php echo $rows_pecas['pec_preco']; ?>"
																	data-whateverstatus="<?php echo $rows_pecas['pec_status']; ?>">
																Editar</button>
																<!-- Inicio Modal Modaaaaal de mostrar -->
																<!--Como é um modal só, usa-se o data-whatever-->
																<div class="modal fade" id="modalExibePecas<?php echo $rows_pecas['pec_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
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
																								<td><?php echo $rows_pecas['pec_codigo']; ?></td>
																							</tr>
																							<tr class="thead-dark">
																								<th scope="row">Nome</th>			
																								<td><?php echo $rows_pecas['pec_nome']; ?></td>
																							</tr>
																							<tr class="thead-dark">
																								<th scope="row">Categoria</th>
																								<td><?php echo $icp[0]->catp_nome; ?></td>
																							</tr>
																							<tr class="thead-dark">
																								<th scope="row">Fornecedor</th>
																								<td><?php echo $ifp[0]->for_nomeFantasia; ?></td>
																							</tr>
																							<tr class="thead-dark">
																								<th scope="row">Marca</th>
																								<td><?php echo $imarp[0]->mar_marca; ?></td>
																							</tr>
																							<tr class="thead-dark">
																								<th scope="row">Modelo</th>
																								<td><?php echo $imodp[0]->mod_modelo;  ?></td>
																							</tr>
																							<tr class="thead-dark">
																								<th scope="row">Descricao</th>
																								<td><?php echo $rows_pecas['pec_descricao'];  ?></td>
																							</tr>

																							<tr class="thead-dark">
																								<th scope="row">Preço</th>
																								<td><?php echo $rows_pecas['pec_preco']; ?></td>
																							</tr>
																							<tr class="thead-dark">
																								<th scope="row">Status</th>
																								<td><?php echo $rows_pecas['pec_status']; ?></td>
																							</tr>
																						</tbody>
																					</thead>
																				</table>
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
																				<?php  echo  form_open_multipart('index.php/Exibir/alteraPeca'); ?>

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
																				<div class="form-group row">
																					<label for="pec_status" class="col-sm-4 col-form-label">Ativar/Desativar</label>
																					<input type="checkbox" name="pec_status" data-toggle="tooltip" data-placement="top" title="" id="pec_status" onmousemove="checadoṔ()">
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


								<script src=<?=base_url()?>public/js/Listar.js></script>
								<script src="<?= base_url()?>public/js/Checkbox.js"></script>

								</html>