<!--doctype html-->
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/estilo.css">
    <title>Loja virtual Dr. Pecê</title>
</head>
<?php

//Para conseguir instanciar para essa página
$CI = & get_instance();
$CI->load->library('session');

if($CI->session->userdata("cli_email")=='' || $CI->session->userdata("cli_senha")==''){
    $CI->session->unset_userdata("cli_nome");
    $CI->session->unset_userdata("cli_email");
    $CI->session->unset_userdata("cli_senha");

    $CI->session->sess_destroy();
    header("Location: ".base_url());
}
//echo "<p> Olá".$CI->session->userdata("adm_email")."</p>";
?>

<body>
    <!--Inicio Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand h1 mb-0" href="#">
                <h2 class="text-success">Dr. Pecê </h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown" id="navDrop">
                        <a class="nav-link"  data-toggle="dropdown" data-placement="bottom" title=<?php echo $CI->session->userdata("cli_nome");?>><svg class="bi bi-people-circle" width="30px" height="30px"
                            viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/3500/svg">
                            <path
                            d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z" />
                            <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                            d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z"
                            clip-rule="evenodd" />
                        </svg></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item ml-2" href="#">Compras</a>
                            <a class="dropdown-item ml-2" href=<?=base_url().'Cliente/exibirDados'?>>Dados</a>
                            <a class="dropdown-item ml-2" href=<?=base_url().'Cliente/logoff'?>>Sair</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jogos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Arte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Computadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Peças</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manutenção</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                            Redes Sociais
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item ml-2" href="#"><img src="../../public/img/IconFace.png" width="30px"
                                height="30px" alt="Responsive image"></a>

                                <a class="dropdown-item ml-2" href="#"><img src="../../public/img/IconInsta.jpg" width="30px"
                                    height="30px" alt="Responsive image"></a>
                                    <a class="dropdown-item ml-2" href="#"><img src="../../public/img/IconTwit.png" width="30px"
                                        height="30px" alt="Responsive image"></a>

                                    </div>
                                </li>
                            </ul>
                            <form class="form-check-inline">
                                <input class="form-control mr-2" type="search" placeholder="O que você procura?">
                                <button type="button" class="btn btn-success">Buscar</button>
                            </form>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <div class="row">
                        <div class="col-2 shadow p-3 mb-5 bg-white rounded">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dados</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Compras</a>
                            </div>
                        </div> <!--FECHA O NAV FLEX-->
                        <?php 
                        $CI = & get_instance();
                        $CI->load->library('session');

                        if($CI->session->userdata("cli_email")=='' || $CI->session->userdata("cli_senha")==''){
                            $CI->session->unset_userdata("cli_nome");
                            $CI->session->unset_userdata("cli_email");
                            $CI->session->unset_userdata("cli_senha");

                            $CI->session->sess_destroy();
                            header("Location: ".base_url());
                        }else{
                            $CI->load->model('Cliente_model');
                            $semail=$CI->session->userdata("cli_email");
                            $ssenha=$CI->session->userdata("cli_senha");
                            $exibec=$CI->Cliente_model->exibirDado($semail,$ssenha);
                            foreach($exibec->result_array() as $rows_cli){ 
                                ?>
                                <div class="col-9 shadow p-3 mb-5 bg-white rounded">
                                    <div class="tab-content" id="v-pills-tabContent">
                                      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                          <div class="container">
                                           <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">Nome</label>
                                            <div class="col-sm-9">
                                                <input type="text" disabled class="form-control" id="" name="cli_nome" value="<?= $rows_cli['cli_nome'];?>" >
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">CPF</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control cpf" id="cli_cpf" name="cli_cpf" disabled value="<?= $rows_cli['cli_cpf'];?>">
                                            </div>
                                        </div>

                                        <div class="form-group inline">
                                            <label for="cep" class="col-sm-4 col-form-label">CEP</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control cep" id="cep" name="cli_cep" value="<?= $rows_cli['cli_cep'];?>" >
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success" id="btnPesquisaCep">Pesquisar</button>
                                        <div class="form-group row">
                                            <label for="logradouro" class="col-sm-4 col-form-label">Rua</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="rua" name="cli_endereco" value="<?= $rows_cli['cli_endereco'];?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">Numero</label>
                                            <!--Dimnuir o tamanho do input-->
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="" name="cli_numero" value="<?= $rows_cli['cli_numero'];?>" >
                                            </div>
                                        </div>
                                        <!--CEP DA BAIRRO E CIDADE??????-->
                                        <div class="form-group row">
                                            <label for="bairro" class="col-sm-4 col-form-label">Bairro</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bairro" name="cli_bairro" value="<?= $rows_cli['cli_bairro'];?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cidade" class="col-sm-4 col-form-label">Cidade</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cidade" name="cli_cidade" value="<?= $rows_cli['cli_cidade'];?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="uf" class="col-sm-4 col-form-label">Estado</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="estado" name="cli_estado" value="<?= $rows_cli['cli_estado'];?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">Telefone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control telefone" id="cli_telefone" name="cli_telefone" value="<?= $rows_cli['cli_telefone'];?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">Celular</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control sp_celphones" id="cli_celular" name="cli_celular" value="<?= $rows_cli['cli_celular'];?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="" name="cli_email" value="<?= $rows_cli['cli_email'];?>" >
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="container">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--Primeiro container-->
        <div class="container-fluid">
            <div class="card- text-white bg-dark mb-3" style="max-width: 100%;">
                <div class="card-header"></div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                    </p>
                </div>

            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="<?= base_url()?>../public/js/jquery.mask.min.js"></script>
        <script type="text/javascript">
            $('.cep').mask('00000-000');
            $('.telefone').mask('(99)9999-9999');
            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
            $('.cpf').mask('000.000.000-00', {reverse: true});

            var cel = function (val) {
              return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
          },
          spOptions = {
              onKeyPress: function(val, e, field, options) {
                  field.mask(cel.apply({}, arguments), options);
              }
          };
          $('.sp_celphones').mask(cel, spOptions);
      </script>
  </body>

  </html>