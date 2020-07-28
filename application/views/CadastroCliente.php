

<?php
defined('BASEPATH') or exit('No direct sript acess allowed');
?>
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

    <title>Loja virtual Dr. Pecê</title>
</head>

<body class="bg-secondary">
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
                        <a class="nav-link" href="<?php echo base_url()?>index.php/Cliente/logar"><svg class="bi bi-people-circle" width="30px" height="30px"
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
                        <a class="nav-link" href="<?=base_url()?>index.php/Jogos">Jogos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>index.php/Computador">Computadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>index.php/Pecas">Peças</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>index.php/Manutencao">Manutenção</a>
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
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="form-container1">
                            <?php echo validation_errors(); ?>
                            <?php if(isset($mensagens)) echo $mensagens; ?>
                            <?php  echo form_open('index.php/Cliente/cadastraCliente'); ?>
                            <div class="form-group row">
                                <div class="form-group col-sm-6">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="cli_nome" placeholder="Nome Completo">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control cpf" id="cpf" name="cli_cpf" placeholder="xxx.xxx.xxx-xx" onblur="ValidaCPF()">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control cep" id="cep" name="cli_cep" placeholder="Somente números">
                                    <button type="button" class="btn btn-success" id="btnPesquisar">Buscar</button>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control"id="bairro" name="cli_bairro">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="rua">Rua</label>
                                    <input type="text" class="form-control"  id="rua" name="cli_endereco" placeholder="Nome da rua...Apartamento / Studio / Piso">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="numero">Número</label>
                                    <input type="numero" class="form-control" id="numero" name="cli_numero" placeholder="Número da residência.">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cli_cidade">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="estado">Estado</label>
                                <!-- <select id="inputState" class="form-control">
                                    <option selected></option>
                                    <option>SP</option>
                                </select> -->
                                <input type="text" class="form-control" id="estado" name="cli_estado" placeholder="Ex.: SP">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control telefone" id="telefone" name="cli_telefone"  placeholder="(DDD) xxxx-xxxx">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control sp_celphones" id="celular" name="cli_celular" placeholder="(DDD) xxxxx-xxxx">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email"  class="form-control" id="email" name="cli_email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mr-1 ">
                                <input type="submit" class="btn btn-success btn-block" value="Cadastrar" onclick="ValidaCPF()" />
                            </div>
                            <div class="col-sm-3 ">
                                <input type="reset" class="btn btn-secondary btn-block" value="Limpar"/>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <script src="<?php echo base_url()?>public/js/CEP.js"></script>

            <script src="<?= base_url()?>public/js/jquery.mask.min.js"></script>
            <script src="<?= base_url()?>public/js/Mascara.js"></script>


            <script type="text/javascript">

                let CPF = document.querySelector("#cpf");

                function ValidaCPF() {
                 let aux = CPF.value;
                 console.log("aux" + aux);
                 let varCpf = aux.replace(".", "").replace(".", "").replace("-","");
                 console.log("var" + varCpf);

                 let soma = 0;
                 let verificador1 = 0;
                 let verificador2 = 0;

                 for (let index = 0, valor = 10; index < 9; index++, valor--) {
                     soma += varCpf[index] * valor;
                 }

                 verificador1 = soma * 10 % 11;

                 if (verificador1 == 10) {
                     verificador1 = 0;
                 }


 //------------------------------------------------
 soma = 0;
 for (let index = 0, valor = 11; index < 9; index++, valor--) {
     soma += varCpf[index] * valor;
 }
 soma += verificador1 * 2;

 verificador2 = soma * 10 % 11;

 if (verificador2 == 10) {
     verificador2 = 0;
 }


 if (verificador1 != varCpf[9] || verificador2 != varCpf[10]) {
     CPF.value = "";
 }else{
  if(
    varCpf[0]==varCpf[1] &&
    varCpf[1]==varCpf[2] &&
    varCpf[2]==varCpf[3] &&
    varCpf[3]==varCpf[4] &&
    varCpf[4]==varCpf[5] &&
    varCpf[5]==varCpf[6] &&
    varCpf[6]==varCpf[7] &&
    varCpf[7]==varCpf[8] &&
    varCpf[8]==varCpf[9] &&
    varCpf[9]==varCpf[10]){

    CPF.value="";
}
}
}
</script>


</body>
</html>