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

<body>
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
                    <a class="dropdown-item ml-2" href="#"><img src="./public/img/IconFace.png" width="30px"
                        height="30px" alt="Responsive image"></a>

                        <a class="dropdown-item ml-2" href="#"><img src="./public/img/IconInsta.jpg" width="30px"
                            height="30px" alt="Responsive image"></a>
                            <a class="dropdown-item ml-2" href="#"><img src="./public/img/IconTwit.png" width="30px"
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
        <!--Carrossel-->
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./public/img/banner1.jpg" class="img-fluid d-block w-200" alt="Responsive image">
                    <div class="carousel-caption d-none d-md-block">
                        <h2></h2>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./public/img/banner1.jpg" class="img-fluid d-block w-200" alt="Responsive image">
                    <div class="carousel-caption d-none d-md-block">
                        <h2></h2>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./public/img/banner1.jpg" class="img-fluid d-block w-200" alt="Responsive image">
                    <div class="carousel-caption d-none d-md-block">
                        <h2></h2>
                        <p></p>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <!--Titulo-->
        <div class="container-fluid bg-dark text-light rounded">
            <h1 class="text-md-center text-sm-center">
                Loja Virtual Dr.Pecê
            </h1>
            <p class="text-light text-md-center text-sm-center">
                O melhor para seu computador.
            </p>
        <!--<div class="row ">
            <div class="col-2 ml-auto my-2">
                <div class="container align-content-start bg-success rounded">
                    <img src="./public/img/game.png" class="img-thumbnail img-fluid" alt="Responsive image">
                </div>
            </div>
            <div class="col-2  my-2">
                <div class="container align-content-start bg-success rounded">
                    <img src="./public/img/ferra.png" class="img-thumbnail" alt="Responsive image">
                </div>
            </div>

            <div class="col-2  my-2">
                <div class="container align-content-start bg-success rounded">
                    <img src="./public/img/arte.png" class="img-thumbnail" alt="Responsive image">
                </div>
            </div>
            <div class="col-2  my-2">
                <div class="container align-content-start bg-success rounded">
                    <img src="./public/img/peças.png" class="img-thumbnail" alt="Responsive image">
                </div>
            </div>
            <div class="col-2 my-2 mr-auto">
                <div class="container align-content-start bg-success rounded">
                    <img src="./public/img/" class="img-thumbnail" alt="Responsive image">
                </div>
            </div>
        </div>-->
    </div>

    <!--Scrollspy-->

    <div class="row align-content-center text-justify " >
        <div class="col-sm-4 col-md-3 ">
            <nav id="Scrollspy1" class="Scrollspy1" class="navbar-lg navbar-dark bg-light">
                <nav class=" nav nav-pills flex-column ">
                    <li class="nav-item">
                        <a class="nav-link" href="#item-1">Jogos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#item-2">Arte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#item-3">Computadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#item-4">Peças</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#item-5">Manutenção</a>
                    </li>

                </nav>
            </nav>
        </div>
        <div class="col-sm-8 col-md-9">
            <div data-spy="scroll" class="ScrollspySite"  data-target="#Scrollspy1" data-offset="0">
                <h4 id="item-1">Jogos</h4>
                <p class="ml-4">É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto
                    legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                quando estiver examinando sua diagramação.</p>
                <h4 id="item-2">Artes</h4>
                <p class="ml-4">É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto
                    legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                quando estiver examinando sua diagramação.</p>
                <h4 id="item-3">Computadores</h4>
                <p class="ml-4">É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto
                    legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                quando estiver examinando sua diagramação.</p>
                <h4 id="item-4">Peças</h4>
                <p class="ml-4">É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto
                    legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                quando estiver examinando sua diagramação.</p>
                <h4 id="item-5">Manutenção</h4>
                <p class="ml-4">É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto
                    legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                    quando estiver examinando sua diagramação.É um fato conhecido de todos que um leitor
                    se distrairá
                    com o conteúdo de texto legível de uma página
                quando estiver examinando sua diagramação.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid align-content-center bg-dark rounded" style="height: 100px;">
        <div class="row">
            <div class="col-12 text-center  my-0">
                <h2 class="display-3">
                    <!--Loja Virtual Dr.Pecê</h2>
                        <p>Para um computador melhor.-->
                        </p>
                    </div>
                </div>
            </div>
            <div class="form-container2 align-items-center">
                <div class="row">
                 <?php 
                 $CI->load->model('Teste_model');
                 $teste= $CI->Teste_model->randonComputador();
                 $comp=0;
                //Variavel para mostrar apenas uma quantidade do produto, no caso 4.
                 foreach($teste->result_array() as $rows_computador){ 
                    ?>
                    <!--Cards-->
                    <div class="card-deck mx-auto justify-content-center">
                        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 15rem;">
                            <!--SAIR 2 VEZES DA PASTA PQ OS UPLOADS ENCONTRAM-SE FORA DO INDEX.PHP -->

                            <?php
                            if($rows_computador['com_foto']==''){
                                ?>
                                <img src="./uploads/semFoto.jpg" class="card-img-top" class="card-img-top" alt="Responsive image" style="height:9rem;">
                                <?php
                            }else{
                                ?>

                                <img src="./uploads/<?= $rows_computador['com_foto']; ?>" class="card-img-top" alt="Responsive image" style="height:9rem;">
                                <?php
                            }
                            ?>
                            <div class="card-body" style="max-height:10rem;">
                                <h5 class="card-title"><?php echo $rows_computador['com_nome']?></h5>
                                <?php
                                if(strlen($rows_computador['com_descricao'])> 70){
                                    $rows_pedacoC=substr($rows_computador['com_descricao'],0,70);
                                    ?>
                                    <p class="card-text"><?php echo $rows_pedacoC."...";?>
                                    <?php
                                }else{
                                    ?>
                                    <p class="card-text"><?php echo $rows_computador['com_descricao'];?> 
                                    <?php
                                }
                                ?>
                            </p>
                        </div>
                        <div class="ml-4" style="height:2rem;">
                            <h6 id=""><?php echo $rows_computador['com_preco']?></h6>
                            <!--   <h6 id="">Parcela</h6> -->
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn-block btn btn-success">Ver</a>
                        </div>
                    </div>
                </div>
                <?php
                if(++$comp==4) break;
            }
            ?>
        </div>

        <div class="row">
            <!--Cards-->       
            <?php 
            $CI->load->model('Teste_model');
            $teste= $CI->Teste_model->randonJogos();
        //Variavel para mostrar apenas uma quantidade do produto, no caso 4.
            $jog=0; 
            foreach($teste->result_array() as $rows_jogos){ 

                ?>
                <div class="card-deck mx-auto justify-content-center">
                    <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 15rem;">
                     <!--SAIR 2 VEZES DA PASTA PQ OS UPLOADS ENCONTRAM-SE FORA DO INDEX.PHP -->
                     <?php
                     if($rows_jogos['pro_foto']==''){
                        ?>
                        <img src="./uploads/semFoto.jpg" class="card-img-top" class="card-img-top" alt="Responsive image" style="height:9rem;">
                        <?php
                    }else{
                        ?>
                        <img src="./uploads/<?= $rows_jogos['pro_foto']; ?>" class="card-img-top" alt="Responsive image" style="height:9rem;">
                        <?php
                    }
                    ?>
                    <div class="card-body" style="max-height:10rem;">
                        <h5 class="card-title"><?php echo $rows_jogos['pro_titulo']?></h5>
                        <?php
                        if(strlen($rows_jogos['pro_sinopse'])> 70){
                            $rows_pedaco=substr($rows_jogos['pro_sinopse'],0,70);
                            ?>
                            <p class="card-text"><?php echo $rows_pedaco."...";?>
                            <?php
                        }else{
                            ?>
                            <p class="card-text"><?php echo $rows_jogos['pro_sinopse'];?> 
                            <?php
                        }
                        ?>
                    </p>
                </div>
                <div class="ml-4"  style="height:2rem;">
                    <h6 id=""><?php echo $rows_jogos['pro_preco']?></h6>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn-block btn btn-success">Ver</a>
                </div>
            </div>
        </div>
        <?php
        if(++$jog==4) break;
    }
    ?>
</div>



<div class="row">
 <?php 
 $CI->load->model('Teste_model');
 $teste= $CI->Teste_model->randonPecas();
 $pec=0;
//Variavel para mostrar apenas uma quantidade do produto, no caso 4.
 foreach($teste->result_array() as $rows_pecas){ 

    ?>
    <div class="card-deck mx-auto justify-content-center">
        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 15rem;">
           <!--SAIR 2 VEZES DA PASTA PQ OS UPLOADS ENCONTRAM-SE FORA DO INDEX.PHP -->
           <?php
           if($rows_pecas['pec_foto']==''){
            ?>
            <img src="./uploads/semFoto.jpg" class="card-img-top" alt="Responsive image" style="height:9rem;">
            <?php
        }else{
            ?>

            <img src="./uploads/<?= $rows_pecas['pec_foto']; ?>" class="card-img-top" alt="Responsive image" style="height:9rem;">
            <?php
        }
        ?>
        <div class="card-body" style="max-height:10rem;">
            <h5 class="card-title"><?php echo $rows_pecas['pec_nome']?></h5>
            <?php
            if(strlen($rows_pecas['pec_descricao'])> 70){
                $rows_pedacoP=substr($rows_pecas['pec_descricao'],0,70);
                ?>
                <p class="card-text"><?php echo $rows_pedacoP."...";?>
                <?php
            }else{
                ?>
                <p class="card-text"><?php echo $rows_pecas['pec_descricao'];?> 
                <?php
            }
            ?>
        </p>
    </div>
    <div class="ml-4" style="height:2rem;">
        <h6 id=""><?php echo $rows_pecas['pec_preco']?></h6>
    </div>
    <div class="card-footer">
        <a href="#" class="btn-block btn btn-success">Ver</a>
    </div>
</div>
</div>
<?php
if(++$pec==4) break;
}
?>
</div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>


</html>
