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
					<a>PEDIDOS</a>
					<ul class="list-unstyled">
						<li>
							<input type="radio" name="rdb" value="PManutencao">
							<label>Manutenção</label>
						</li>
						<li>
							<input type="radio" name="rdb" value="PMontagem">
							<label>Montagem</label>
						</li>
					</ul>
				</li>
			</ul>
		</nav> 


		<div class="container theme-showcase flex-row" role="main" id="container-Pmanutencao">
			<div class="row">
				<div class="col-md-7">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Email</th>
								<th>Pedido</th>
								<th>Tipo Manutenção</th>
								<th>Descrição</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$this->load->model('Teste_model');

							$man=$this->Teste_model->exibeMandaManutencao();
										//$manman=$this->Teste_model->exibeMandaItensManutencao();
							foreach($man->result_array() as $rows_mmanutencao){ 

								$pman_codigo=$rows_mmanutencao['pman_codigo']; 
								$cli_cpf=$rows_mmanutencao['cli_cpf'];
								$data=$this->Teste_model->exibeMandaItensManutencao($pman_codigo);
								$cliente=$this->Teste_model->selecionaCliente($cli_cpf);
											//print_r($this->db->last_query()); 
								?>
								<tr>
									<?php
									foreach($cliente->result_array() as $cli){ ?>
										<td><?php echo $cli['cli_nome'];?></td>
										<td><?php echo $cli['cli_email'];?></td>
									<?php } ?>
									<td><?php echo $rows_mmanutencao['pman_codigo']; ?></td>	
									<td>	
										<?php
										foreach($data as $datas){ ?>
											<?php echo $datas['tman_nome']."</br>"; ?>
											<?php
										}
										?>
									</td>
									<td>	
										<?php
										foreach($data as $datas){ ?>
											<?php echo $datas['pman_descricao']."</br></br>"; ?>
											<?php
										}
										?>
									</td>
								</tr>
								<?php
							} ?>
						</tbody>
					</table>
				</div>
			</div>		
		</div>
		
		<div class="container theme-showcase flex-row" role="main" id="container-Pmontagem">
			<div class="row">
				<div class="col-md-7">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Email</th>
								<th>Pedido</th>
								<th>Peca</th>
								<th>Categoria</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$this->load->model('Teste_model');

							$mon=$this->Teste_model->exibeMandaMontagem();
							foreach($mon->result_array() as $rows_mmontagem){ 

								$pmon_codigo=$rows_mmontagem['pmon_codigo']; 
								$cli_cpf=$rows_mmontagem['cli_cpf'];
								$data=$this->Teste_model->exibeMandaItensMontagem($pmon_codigo);
								$cliente=$this->Teste_model->selecionaCliente($cli_cpf);
								?>
								<tr>
									<?php
									foreach($cliente->result_array() as $cli){ ?>
										<td><?php echo $cli['cli_nome'];?></td>
										<td><?php echo $cli['cli_email'];?></td>
									<?php } ?>
									<td><?php echo $rows_mmontagem['pmon_codigo']; ?></td>	
									<?php
									foreach($data as $datas){ ?>
										<div class='row'>
											<td  nowrap="nowrap"><?php echo $datas['pec_nome']?>
											<?php echo $datas['catp_nome'];?></td>
										</div>
										<?php
									}
									?>
								</tr>
								<?php
							} ?>
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

</html>