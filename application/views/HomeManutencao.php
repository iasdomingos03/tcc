<?php
defined('BASEPATH') or exit('No direct sript acess allowed');
$CI = & get_instance();
$CI->load->library('session');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/estilo2.css">

    <title>Loja virtual Dr. Pecê</title>
</head>

<body style="background-image: url(img/fundo-manu.jpg);">
    <!--Inicio Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand h1 mb-0" href="<?=base_url();?>">
                <h2 class="text-success">Dr. Pecê</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav mr-auto">
                 <?php 
                 if($CI->session->userdata("cli_email") =='' || $CI->session->userdata("cli_senha") ==''){

                    $CI->session->unset_userdata("cli_nome");
                    $CI->session->unset_userdata("cli_email");
                    $CI->session->unset_userdata("cli_senha");

                    $CI->session->sess_destroy();

                    header("Location: ".base_url()."index.php/Cliente/logar");
                }else{
                    ?>
                    <li class="nav-item dropdown" id="navDrop">
                        <a class="nav-link"  data-toggle="dropdown" data-placement="bottom" title=<?php echo $CI->session->userdata("cli_nome")?>><svg class="bi bi-people-circle" width="30px" height="30px"
                            viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/3500/svg">
                            <path
                            d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z" />
                            <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                            d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z"
                            clip-rule="evenodd" />
                        </svg></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item ml-2" href=<?=base_url().'index.php/Cliente/exibirDados'?>>Dados</a>
                            <a class="dropdown-item ml-2" href=<?=base_url().'index.php/Cliente/logoff'?>>Sair</a>
                        </div>
                    </li>
                    <?php 
                }
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url().'index.php/Jogos';?>">Jogos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url().'index.php/Computador';?>">Computadores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url().'index.php/Pecas';?>">Peças</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url().'index.php/Manutencao';?>">Manutenção</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                    Redes Sociais
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item ml-2" href="#"><img src="<?=base_url();?>img/IconFace.png" width="30px"
                        height="30px" alt="Responsive image">Facebook</a>

                        <a class="dropdown-item ml-2" href="#"><img src="<?=base_url();?>img/IconInsta.jpg" width="30px"
                            height="30px" alt="Responsive image">Instagram</a>
                            <a class="dropdown-item ml-2" href="#"><img src="<?=base_url();?>img/IconTwit.png" width="30px"
                                height="30px" alt="Responsive image">Twitter</a>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>

        <div class="container p-5 bg-white rounded" style="width: 50%; margin-top: 100px;">
         <?php echo validation_errors(); ?> 
         <?php if(isset($vman)) echo $vman; ?>
         <?php  echo  form_open('index.php/Manutencao/verificaManutencao'); ?>
         <h3 class="text-success text-center">Selecione os tipos de Manutenção que você deseja</h3>
         <br>
         <?php
         $man=$this->Teste_model->exibirManutencao1();
         ?>
         <div class="container"> 
            <?php
            foreach($man->result_array() as $rows_manutencao){ 
             ?>
             <div class="row">
                <div class="col-6 mb-4">
                    <input type="checkbox" name="tman[]" value="<?= $rows_manutencao['tman_codigo'];?>">
                    <span class="checkmark" data-toggle="tooltip" data-placement="bottom" title="<?= $rows_manutencao['tman_descricao'];?>"><?= $rows_manutencao['tman_nome'];?></span>
                </div>
            </div>
            
            <?php
        }
        ?>
       
        <div class="form-group">
<!--              <p class="text-justify">Descreva o tipo de Manutenção que você deseja.</p>
 -->            <label for="pman_descricao"><strong>Descreva os detalhes da manutenção que você deseja.</strong></label>
            <textarea class="form-control" id="pman_descricao" name="pman_descricao" rows="3"
            placeholder="Descreva o tamanho, modelo, ano, tipo de produto, polegadas etc..."></textarea>
        </div>
    <div class="container">
        <div class=" form-row  text-center">
            <div class="col-sm-3  ">
                <button type="submit" class="btn btn-success btn-block" style="float: right;">Enviar</button>
            </div>
            <div class="col-sm-3 ">
                <button type="reset" class="btn btn-secondary btn-block" style="float: left;">Limpar</button>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>