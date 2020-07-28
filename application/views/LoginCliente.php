<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/estilo.css">
    <script src="https://use.fontawesome.com/5ab8d1aeb8.js"></script>
    <title>Loja virtual Dr. Pecê</title>
</head>
<body>
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
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url().'index.php/Cliente/logar';?>"><svg class="bi bi-people-circle" width="30px" height="30px"
                            viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/3500/svg">
                            <path
                            d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z" />
                            <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                            d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z"
                            clip-rule="evenodd" />
                        </svg></a>
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
                            <a class="dropdown-item ml-2" href="#"><img src="<?=base_url();?>public/img/IconFace.png" width="30px"
                                height="30px" alt="Responsive image">Facebook</a>

                                <a class="dropdown-item ml-2" href="#"><img src="<?=base_url();?>public/img/IconInsta.jpg" width="30px"
                                    height="30px" alt="Responsive image">Instagram</a>
                                    <a class="dropdown-item ml-2" href="#"><img src="<?=base_url();?>public/img/IconTwit.png" width="30px"
                                        height="30px" alt="Responsive image">Twitter</a>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="container01">
                   <div class="box">
                     <?php echo validation_errors(); ?>
                     <?php if(isset($mensagens)) echo $mensagens; ?>
                     <?php  echo  form_open_multipart('index.php/Cliente/formLoginC'); ?>
                     <div class="form-container">
                        <div class="form-group">
                            <h3 class="text-success"
                            style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                            Login
                        </h3>
                        <label for="emailc"><strong>E-mail</strong></label>
                        <input type="email" class="form-control" name="cli_email" id="emailc">
                        <small id="emailHelp" class="form-text text-muted">Nós nunca iremos compartilhar seu e-mail.</small>
                        <label for="senhac"><strong>Senha</strong></label>
                        <div class="input-group" id="show_hide_password">
                          <input class="form-control" type="password" name="cli_senha" id="senhac">
                          <div class="input-group-text">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true" style="color:green;"></i></a>
                        </div>
                    </div>
                    <!-- <input type="password" class="form-control" name="cli_senha" id="senhac"> -->
                    <br>
                    <div class="item">
                        <h6 class="ml-2">
                            Ainda não tem cadastro?
                        </h6>
                        <div class="btn btn-link "><a href="<?php echo base_url()?>index.php/Cliente/cadastraCliente">
                            cadastre-se
                        </a>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-block">Entrar</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>public/js/Logar.js"></script>



</html>