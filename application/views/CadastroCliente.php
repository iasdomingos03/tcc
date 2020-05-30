<?php
defined('BASEPATH') or exit('No direct sript acess allowed');
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
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/estilo.css">
    <title>Loja virtual Dr. Pecê</title>
</head>

<body>
    <!--Inicio Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand h1 mb-0" href="#">
                <h2 class="text-success">Dr. Pecê</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=<?php echo base_url()?>index.php/Cliente/logar><svg class="bi bi-people-circle" width="30px" height="30px"
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
                            <a class="dropdown-item ml-2" href="#"><img src="../public/img/IconFace.png" width="30px"
                                height="30px" alt="Responsive image"></a>

                                <a class="dropdown-item ml-2" href="#"><img src="../public/img/IconInsta.jpg" width="30px"
                                    height="30px" alt="Responsive image"></a>
                                    <a class="dropdown-item ml-2" href="#"><img src="../public/img/IconTwit.png" width="30px"
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

                <div class="container mt-5">

                   <?php echo validation_errors(); ?>
                   <?php if(isset($mensagens)) echo $mensagens; ?>
                   <?php  echo form_open('index.php/Cliente/cadastraCliente'); ?>

                   <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nome</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="cli_nome">
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">CPF</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="" name="cli_cpf">
                    </div>
                </div>

                <div class="form-group inline">
                    <label for="cep" class="col-sm-4 col-form-label">CEP</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="cep" name="cli_cep"/>
                    </div>
                </div>
                <button type="button" class="btn btn-success" id="btnPesquisaCep">Pesquisar</button>
                <div class="form-group row">
                    <label for="logradouro" class="col-sm-4 col-form-label">Rua</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="rua" name="cli_endereco">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Numero</label>
                    <!--Dimnuir o tamanho do input-->
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="cli_numero">
                    </div>
                </div>
                <!--CEP DA BAIRRO E CIDADE??????-->
                <div class="form-group row">
                    <label for="bairro" class="col-sm-4 col-form-label">Bairro</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="bairro" name="cli_bairro">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cidade" class="col-sm-4 col-form-label">Cidade</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cidade" name="cli_cidade">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uf" class="col-sm-4 col-form-label">Estado</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="estado" name="cli_estado">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Telefone</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="" name="cli_telefone">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Celular</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="" name="cli_celular">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="" name="cli_email">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>

                <?php echo form_close(); ?>
            </div>

            <div class="container-fluid mt-5">
                <div class="card- text-white bg-dark mb-3" style="max-width: 100%;">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                        </p>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <script type="text/javascript">

                const btnPesquisar = document.querySelector("#btnPesquisar");

                btnPesquisaCep.addEventListener("click", e =>{ 
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
        </body>

        </html>