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
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/estilo.css">

    <title>Loja virtual Dr. Pecê</title>


</head>

<body class="bg-dark">
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
                    if($CI->session->userdata("cli_email") !='' || $CI->session->userdata("cli_senha") !=''){
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
                                <a class="dropdown-item ml-2" href="#">Compras</a>
                                <a class="dropdown-item ml-2" href=<?=base_url().'index.php/Cliente/exibirDados'?>>Dados</a>
                                <a class="dropdown-item ml-2" href=<?=base_url().'index.php/Cliente/logoff'?>>Sair</a>
                            </div>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url().'index.php/Cliente/logar';?>"><svg class="bi bi-people-circle" width="30px"
                                height="30px" viewBox="0 0 16 16" fill="currentColor"
                                xmlns="http://www.w3.org/3500/svg">
                                <path
                                d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z" />
                                <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z"
                                clip-rule="evenodd" />
                            </svg></a>
                        </li>
                        <?php 
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url().'index.php/Jogos';?>">Jogos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Arte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url().'index.php/Computador';?>">Computadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url().'index.php/Pecas';?>">Peças</a>
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
                            height="30px" alt="Responsive image">Facebook</a>

                            <a class="dropdown-item ml-2" href="#"><img src="../public/img/IconInsta.jpg" width="30px"
                                height="30px" alt="Responsive image">Instagram</a>
                                <a class="dropdown-item ml-2" href="#"><img src="../public/img/IconTwit.png" width="30px"
                                    height="30px" alt="Responsive image">Twitter</a>

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
            <div class="container-fluid my-1">
                <div class="figure-img img-fluid" style="width: 100%; ">
                    <img class="col-12" src="../public/img/imagem1.jpg" alt="Responsive image">
                </div>
            </div>

            <div class="container" style="width: 100%;">
                <div class="row justify-content-md-center">
                    <h1 class="col-12 text-center text-light">
                        Os melhores jogos você encontra aqui.
                    </h1>
                    <div class="form-inline">
                        <div class="col-12 my-1 p-2">

                            <div class="btn-group">

                                <h3 class="text-light mr-2">Busque por categoria.</h3>

                                <button type="button" class="btn btn-success rounded">Selecionar</button>
                                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                data-reference="parent">
                            </button>
                            <div class="dropdown-menu col-12" aria-labelledby="dropdownMenuReference">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="form-container2 align-items-center">
        <div class="row">
           <?php 

           $CI->load->model('Teste_model');
           $teste= $CI->Teste_model->randonComputador();
           $comp=0;
           foreach($teste->result_array() as $rows_computador){ 
            ?>
            <!--Cards-->
            <div class="card-deck mx-auto justify-content-center">
                <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
                    <!--SAIR 2 VEZES DA PASTA PQ OS UPLOADS ENCONTRAM-SE FORA DO INDEX.PHP -->

                    <?php
                    if($rows_computador['com_foto']==''){
                        ?>
                        <img src="../uploads/semFoto.jpg" class="card-img-top" class="card-img-top" alt="Responsive image" style="height:9rem;">
                        <?php
                    }else{
                        ?>

                        <img src="../uploads/<?= $rows_computador['com_foto']; ?>" class="card-img-top" alt="Responsive image" style="height:9rem;">
                        <?php
                    }
                    ?>
                    <div class="card-body" style="max-height:10rem;">
                        <h5 class="card-title"><?php echo $rows_computador['com_nome']?></h5>
                        <?php
                        if(strlen($rows_computador['com_descricao'])> 70){
                            $rows_pedacoC=substr($rows_computador['com_descricao'],0,70);
                            ?>
                            <p class="card-text"><?php echo $rows_pedacoC."...";?></p>
                            <?php
                        }else{
                            ?>
                            <p class="card-text"><?php echo $rows_computador['com_descricao'];?></p> 
                            <?php
                        }
                        ?>
                    </div>
                    <div class="ml-4" style="height:2rem;">
                        <h6 id=""><?php echo $rows_computador['com_preco']?></h6>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-block btn btn-success">Ver</a>
                    </div>
                </div>
            </div>
            <?php
           // if(++$comp==4) break;
        }
        ?>
    </div>
</div><!--Form Container-->


<!--    <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
        <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
        <div class="card-body">
            <h5 class="card-title">Notebook</h5>
            <p class="card-text">Descrição do Produto
            </p>
        </div>
        <div class="ml-4">
            <h6 id="">Preço</h6>
            <h6 id="">Parcela</h6>
        </div>
        <div class="card-body">
            <a href="#" class="btn-block btn btn-success">Ver</a>
        </div>
    </div>
    <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
        <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
        <div class="card-body">
            <h5 class="card-title">Notebook</h5>
            <p class="card-text">Descrição do Produto
            </p>
        </div>
        <div class="ml-4">
            <h6 id="">Preço</h6>
            <h6 id="">Parcela</h6>
        </div>
        <div class="card-body">
            <a href="#" class="btn-block btn btn-success">Ver</a>
        </div>
    </div>
    <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
        <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
        <div class="card-body">
            <h5 class="card-title">Notebook</h5>
            <p class="card-text">Descrição do Produto
            </p>
        </div>
        <div class="ml-4">
            <h6 id="">Preço</h6>
            <h6 id="">Parcela</h6>
        </div>
        <div class="card-body">
            <a href="#" class="btn-block btn btn-success">Ver</a>
        </div>
    </div>
</div>
</div>


    <div class="card-deck mx-auto justify-content-center">
        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Notebook</h5>
                <p class="card-text">Descrição do Produto
                </p>
            </div>
            <div class="ml-4">
                <h6 id="">Preço</h6>
                <h6 id="">Parcela</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn-block btn btn-success">Ver</a>
            </div>
        </div>

        
        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Notebook</h5>
                <p class="card-text">Descrição do Produto
                </p>
            </div>
            <div class="ml-4">
                <h6 id="">Preço</h6>
                <h6 id="">Parcela</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn-block btn btn-success">Ver</a>
            </div>
        </div>
        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Notebook</h5>
                <p class="card-text">Descrição do Produto
                </p>
            </div>
            <div class="ml-4">
                <h6 id="">Preço</h6>
                <h6 id="">Parcela</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn-block btn btn-success">Ver</a>
            </div>
        </div>
        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Notebook</h5>
                <p class="card-text">Descrição do Produto
                </p>
            </div>
            <div class="ml-4">
                <h6 id="">Preço</h6>
                <h6 id="">Parcela</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn-block btn btn-success">Ver</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card-deck mx-auto  justify-content-center">
        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Notebook</h5>
                <p class="card-text">Descrição do Produto
                </p>
            </div>
            <div class="ml-4">
                <h6 id="">Preço</h6>
                <h6 id="">Parcela</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn-block btn btn-success">Ver</a>
            </div>
        </div> 

       
        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Notebook</h5>
                <p class="card-text">Descrição do Produto
                </p>
            </div>
            <div class="ml-4">
                <h6 id="">Preço</h6>
                <h6 id="">Parcela</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn-block btn btn-success">Ver</a>
            </div>
        </div>
        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Notebook</h5>
                <p class="card-text">Descrição do Produto
                </p>
            </div>
            <div class="ml-4">
                <h6 id="">Preço</h6>
                <h6 id="">Parcela</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn-block btn btn-success">Ver</a>
            </div>
        </div>
        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 18rem;">
            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Notebook</h5>
                <p class="card-text">Descrição do Produto
                </p>
            </div>
            <div class="ml-4">
                <h6 id="">Preço</h6>
                <h6 id="">Parcela</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn-block btn btn-success">Ver</a>
            </div>
        </div>
    </div>
</div>
</div>
    <!--<div class="row my-3 align-content-center">
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
                            <div class="card-body">
                                <h5 class="card-title">Notebook</h5>
                                <p class="card-text">Descrição do Produto
                                </p>
                            </div>
                            <div class="ml-4">
                                <h6 id="">Preço</h6>
                                <h6 id="">Parcela</h6>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn-block btn btn-success">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
                            <div class="card-body">
                                <h5 class="card-title">Notebook</h5>
                                <p class="card-text">Descrição do Produto
                                </p>
                            </div>
                            <div class="ml-4">
                                <h6 id="">Preço</h6>
                                <h6 id="">Parcela</h6>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn-block btn btn-success">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
                            <div class="card-body">
                                <h5 class="card-title">Notebook</h5>
                                <p class="card-text">Descrição do Produto
                                </p>
                            </div>
                            <div class="ml-4">
                                <h6 id="">Preço</h6>
                                <h6 id="">Parcela</h6>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn-block btn btn-success">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
                            <div class="card-body">
                                <h5 class="card-title">Notebook</h5>
                                <p class="card-text">Descrição do Produto
                                </p>
                            </div>
                            <div class="ml-4">
                                <h6 id="">Preço</h6>
                                <h6 id="">Parcela</h6>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn-block btn btn-success">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row my-3 align-content-lg-center">
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
                            <div class="card-body">
                                <h5 class="card-title">Notebook</h5>
                                <p class="card-text">Descrição do Produto
                                </p>
                            </div>
                            <div class="ml-4">
                                <h6 id="">Preço</h6>
                                <h6 id="">Parcela</h6>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn-block btn btn-success">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
                            <div class="card-body">
                                <h5 class="card-title">Notebook</h5>
                                <p class="card-text">Descrição do Produto
                                </p>
                            </div>
                            <div class="ml-4">
                                <h6 id="">Preço</h6>
                                <h6 id="">Parcela</h6>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn-block btn btn-success">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
                            <div class="card-body">
                                <h5 class="card-title">Notebook</h5>
                                <p class="card-text">Descrição do Produto
                                </p>
                            </div>
                            <div class="ml-4">
                                <h6 id="">Preço</h6>
                                <h6 id="">Parcela</h6>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn-block btn btn-success">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="../public/img/note.jpeg" class="card-img-top" alt="Responsive image">
                            <div class="card-body">
                                <h5 class="card-title">Notebook</h5>
                                <p class="card-text">Descrição do Produto
                                </p>
                            </div>
                            <div class="ml-4">
                                <h6 id="">Preço</h6>
                                <h6 id="">Parcela</h6>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn-block btn btn-success">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="form-container2 container align-content-center ">

        <div class="row">
            <div class="col-sm-6">
                https://blog.da2k.com.br/2015/02/25/css-float-ou-overflow/
                <div class="img1">
                    <img src="../public/img/arte.png" alt="Responsive image" />
                </div>
            </div>
            <div class="col-sm-6 ">
                <h5 class="card-title text-success" id="">Título</h5>
                <h6 class="card-text ">Descrição do produto:</h6>
                <h6 class="card-text text-break ">vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv</h6>
                <h6 id="">Preço:</h6>
                <p id="">30,00</p>
                <h6>Classificação</h6>
                <container id="" class="bg-danger rounded ">16</container>
                <br>
                <button class="btn btn-success">Comprar</button>
            </div>
        </div>
        

    </div>
-->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>