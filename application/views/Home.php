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
                        height="30px" alt="Responsive image"></a>

                        <a class="dropdown-item ml-2" href="#"><img src="<?=base_url();?>public/img/IconInsta.jpg" width="30px"
                            height="30px" alt="Responsive image"></a>
                            <a class="dropdown-item ml-2" href="#"><img src="<?=base_url();?>public/img/IconTwit.png" width="30px"
                                height="30px" alt="Responsive image"></a>

                            </div>
                        </li>
                    </ul>
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
                    <img src="<?=base_url();?>public/img/banner1.jpg" class="img-fluid d-block w-200" alt="Responsive image">
                    <div class="carousel-caption d-none d-md-block">
                        <h2></h2>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?=base_url();?>public/img/banner1.jpg" class="img-fluid d-block w-200" alt="Responsive image">
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
        </div>

        <!--Scrollspy-->
        <div class="container">
            <div class="row align-content-center text-justify " >
                <div class="col-sm-4 col-md-3 ">
                    <nav id="Scrollspy1" class="Scrollspy1" class="navbar-lg navbar-dark bg-light">
                        <nav class=" nav nav-pills flex-column ">
                            <li class="nav-item">
                                <a class="nav-link" href="#item-1">Jogos</a>
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
        </div>
        <div class="container-fluid align-content-center bg-dark rounded" style="height: 100px;">
            <div class="row">
                <div class="col-12 text-center  my-0">
                    <h2 class="display-3">
                    <!--Loja Virtual Dr.Pecê</h2>
                        <p>Para um computador melhor.
                        </p>-->
                    </div>
                </div>
            </div>
            <!--Cards-->
            <div class="form-container2 align-items-center">
                <div class="row">
                   <?php 
                   $CI->load->model('Teste_model');
                   $teste= $CI->Teste_model->randonComputador();
                   $comp=0;
                   foreach($teste->result_array() as $rows_computador){ 
                    $com_codigo=$rows_computador['com_codigo']; 
                    $imarc=$CI->Teste_model->innerJoinMarca($com_codigo);
                    $imodc=$CI->Teste_model->innerJoinModelo($com_codigo);

                    ?>
                    <!--Cards-->
                    <div class="card-deck mx-auto justify-content-center">
                        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 15rem;">
                            <!--SAIR 2 VEZES DA PASTA PQ OS UPLOADS ENCONTRAM-SE FORA DO INDEX.PHP -->

                            <?php
                            if($rows_computador['com_foto']==''){
                                ?>
                                <img src="<?=base_url();?>public/img/semFoto.jpg" class="card-img-top" class="card-img-top" alt="Responsive image" style="height:9rem;">
                                <?php
                            }else{
                                ?>

                                <img src="<?=base_url();?>uploads/<?= $rows_computador['com_foto']; ?>" class="card-img-top" alt="Responsive image" style="height:9rem;">
                                <?php
                            }
                            ?>
                            <div class="card-body" style="max-height:10rem;">
                                <h5 class="card-title"><?php echo $rows_computador['com_nome']?></h5>
                                <?php
                                if(strlen($rows_computador['com_descricao'])> 70){
                                    $rows_pedacoC=substr($rows_computador['com_descricao'],0,70);
                                    ?>
                                    <p class="card-text"><?php echo $rows_pedacoC."...".'<br>';?>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalVerComputador<?php echo $rows_computador['com_codigo'];?>" data-whatevercodigo="<?php echo $rows_computador['com_codigo']; ?>" 
                                data-whatevernome="<?php echo $rows_computador['com_nome'];?>"
                                data-whateverdescricao="<?php echo $rows_computador['com_descricao']; ?>"
                                data-whatevermarca="<?php echo $imarc[0]->mar_marca; ?>"
                                data-whatevermodelo="<?php echo $imodc[0]->mod_modelo; ?>" 
                                data-whateverfoto="<?php echo $rows_computador['com_foto']; ?>"
                                data-whateverarquitetura="<?php echo $rows_computador['com_arquitetura']; ?>"
                                data-whateverpreco="<?php echo $rows_computador['com_preco']; ?>">
                            Visualizar</button>
                            <!-- Inicio Modal Modaaaaal de mostrar -->
                            <!--Como é um modal só, usa-se o data-whatever-->
                            <div class="modal fade" id="modalVerComputador<?php echo $rows_computador['com_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
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
                                                    </tbody>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            $jog=0;
            foreach($teste->result_array() as $rows_jogos){ 
                $pro_codigo=$rows_jogos['pro_codigo'];
                $pro_titulo=$rows_jogos['pro_titulo'];
                $pro_titulo=preg_replace('/[ -]+/','-',$pro_titulo);
                $icj=$CI->Teste_model->innerJoinCategoria($pro_codigo);
                $ifj=$CI->Teste_model->innerJoinFornecedor($pro_codigo);
                $iclaj=$CI->Teste_model->innerJoinClassificacao($pro_codigo);


                ?>
                <div class="card-deck mx-auto justify-content-center">
                    <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 15rem;">
                       <!--SAIR 2 VEZES DA PASTA PQ OS UPLOADS ENCONTRAM-SE FORA DO INDEX.PHP -->
                       <?php
                       if($rows_jogos['pro_foto']==''){
                        ?>
                        <img src="<?=base_url();?>public/img/semFoto.jpg" class="card-img-top" class="card-img-top" alt="Responsive image" style="height:9rem;">
                        <?php
                    }else{
                        ?>

                        <img src="<?=base_url();?>uploads/<?= $rows_jogos['pro_foto']; ?>" class="card-img-top" alt="Responsive image" style="height:9rem;">
                        <?php
                    }
                    ?>
                    <div class="card-body" style="max-height:10rem;">
                        <h5 class="card-title"><?php echo $rows_jogos['pro_titulo']?></h5>
                        <?php
                        if(strlen($rows_jogos['pro_sinopse'])> 70){
                            $rows_pedaco=substr($rows_jogos['pro_sinopse'],0,70);
                            ?>
                            <p class="card-text"><?php echo $rows_pedaco."...".'</br>';?>
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
                    <!---------------------VEEEEEEEEEEEEEEEEEEEEEEEEEEERRRRRRRR PROOOOOOODUTTOOOOOOOOOOOOOOO-------->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalVerJogo<?php echo $rows_jogos['pro_codigo'];?>" data-whatevercodigo="<?php echo $rows_jogos['pro_codigo']; ?>" 
                        data-whatevernome="<?php echo $rows_jogos['pro_titulo']; ?>"
                        data-whatevercategoria="<?php echo $icj[0]->cat_categoria; ?>"
                        data-whateverfornecedor="<?php echo $ifj[0]->for_nomeFantasia; ?>" data-whateverclassificacao="<?php echo $iclaj[0]->cla_classificacao; ?>"
                        data-whateverano="<?php echo $rows_jogos['pro_anoLancamento'] ?>"
                        data-whateversinopse="<?php echo $rows_jogos['pro_sinopse']; ?>"
                        data-whateverdescricao="<?php echo $rows_jogos['pro_descricao']; ?>"
                        data-whateverfoto="<?php echo $rows_jogos['pro_foto']; ?>"
                        data-whateverpreco="<?php echo $rows_jogos['pro_preco']; ?>">
                    Visualizar</button>
                </div>
                <div class="modal fade" id="modalVerJogo<?php echo $rows_jogos['pro_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
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
                                            <tr>
                                                <th></th><!--Pro botão ir pro meio-->
                                                <td> <a href="" class="btn btn-success">Comprar</a></td>
                                            </tr>
                                        </tbody>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
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
 foreach($teste->result_array() as $rows_pecas){
    $pec_codigo=$rows_pecas['pec_codigo'];
    $icp=$CI->Teste_model->innerJoinCategoriaPecas($pec_codigo);
    $ifp=$CI->Teste_model->innerJoinFornecedorPecas($pec_codigo);
    $imarp=$CI->Teste_model->innerJoinMarcaPecas($pec_codigo);
    $imodp=$CI->Teste_model->innerJoinModeloPecas($pec_codigo);

    ?>
    <div class="card-deck mx-auto justify-content-center">
        <div class="card text-center text-white bg-dark mb-3 d-flex" style="width: 15rem;">
           <!--SAIR 2 VEZES DA PASTA PQ OS UPLOADS ENCONTRAM-SE FORA DO INDEX.PHP -->
           <?php
           if($rows_pecas['pec_foto']==''){
            ?>
            <img src="<?=base_url();?>public/img/semFoto.jpg" class="card-img-top" class="card-img-top" alt="Responsive image" style="height:9rem;">
            <?php
        }else{
            ?>

            <img src="<?=base_url();?>uploads/<?= $rows_pecas['pec_foto']; ?>" class="card-img-top" alt="Responsive image" style="height:9rem;">
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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalVerPecas<?php echo $rows_pecas['pec_codigo'];?>" data-whatevercodigo="<?php echo $rows_pecas['pec_codigo']; ?>" 
            data-whatevernome="<?php echo $rows_pecas['pec_nome']; ?>"
            data-whatevercategoria="<?php echo $icp[0]->catp_nome; ?>"
            data-whateverfornecedor="<?php echo $ifp[0]->for_nomeFantasia; ?>"
            data-whatevermarca="<?php echo $imarp[0]->mar_marca; ?>"
            data-whatevermodelo="<?php echo $imodp[0]->mod_modelo; ?>"
            data-whateverdescricao="<?php echo $rows_pecas['pec_descricao']; ?>"
            data-whateverpreco="<?php echo $rows_pecas['pec_preco']; ?>">
        Visualizar</button>
        <div class="modal fade" id="modalVerPecas<?php echo $rows_pecas['pec_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
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
                                </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php
if(++$pec==4) break;
}
?>
</div>
</div>
<!--Fechamento container-->
<div class="container mt-5" style="height: 300px;">
    <div class="row mt-3 text-center">
        <div class="col md-4 text-center">
            <img src="<?=base_url();?>public/img/dr.pc1.jpeg" class="img-fluid h-25" alt="Responsive image">
        </div>
        <div class="col md-8  text-justify">
            <p> A empresa <strong>Dr. PeCê</strong> oficina de computadores tem como objetivo disponibilizar
                seus produtos e serviços voltados para a área de tecnologia para que o cliente possa visualizar tudo
                o
                que empreendedor tem a oferecer, assim
                possibilitanto
                acesso as suas midias sociais como Facebook e WhatsApp, alem de telefone para que posteriormente
                possam
                entrar em contanto para fazer compras e
                contratar seus serviços.
                <br />Estaremos aguardando seu contato!</p>
            </div>
        </div>
    </div>
    <hr class="mb-1">
    <div class="row mt-3 mb-1">
        <div class="col-12 md-12">
            <div class="container-fluid  mt-5">
                <h2 class="text-center text-success" style="font-size: 60px; 
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                Sobre o nosso site.
            </h2>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col md-4 p-0">
        <div class="card border border-0"style="width: 20rem;">
            <img src="<?=base_url()?>public/img/gleyci.jpeg"class="card-img-top img2 "alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Gleyciane Paiva</h5>
                <p class="card-text text-justify"style="font-size: large;">
                    Gleyciane Paiva nasceu no ano 2000, na cidade de Coroatá,
                    filha de Evaneide Oliveira e José Pereira,
                    cursou informática básica, atendimento ao
                    cliente e marketing. Mudou-se para a Cidade de Guaratinguetá - SP
                    em 2018 para estudar e atualmente mora na cidade. Iniciou o curso técnico em
                    desenvolvimento de sistema, foi voluntaria no "Projeto do
                    Menor" dando aula de informática básico para pessoas de 7 até
                    45 anos.
                </p>
            </div>
        </div>
    </div>
    <div class="col md-4 p-0">
        <div class="card border border-0"style="width: 20rem;">
            <img src="<?=base_url()?>public/img/ingrid.jpeg"class="card-img-top img2 "alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Ingrid Nayara</h5>
                <p class="card-text text-justify"style="font-size: large;">
                    Ingrid Nayara A. Rodrigues nasceu no no de 1995 na cidade de Pindamonhangaba-SP,
                    onde viveu até seus 5 anos de idade. Foi criada em Caraguatatuba-SP e aos 18 anos
                    desenvolvendo
                    alguns talentos artisticos,
                    após esses período se mudou para Guaratinguetá também do estado de São Paulo onde se formou
                    em
                    técnico em Administração e
                    Desenvolvimento de sistemas.
                </p>
            </div>
        </div>
    </div>
    <div class="col md-4">
        <div class="card border border-0"style="width: 20rem;">
            <img src="<?=base_url()?>public/img/iris.jpeg"class="card-img-top img2"alt="Responsive image">
            <div class="card-body">
                <h5 class="card-title">Iris Agnes</h5>
                <p class="card-text text-justify"style="font-size: large;">
                    Iris Agnes Domingos nasceu no ano de 2000, filha de Renata Cibéle, cresceu na
                    cidade de
                    Guaratinguetá-SP, é formada em técnico em
                    informatica Industrial e Desenvolvimento de Sistemas, está cursando o ensino superior em
                    Gestão
                    Comercial.
                </p>
            </div>
        </div>
    </div>

</div>


<footer class="container-fluid bg-dark">
    <h3 class="text-white text-center mb-5">
        Faça seu pedido pelos telefones:
    </h3>

    <div class="row">
        <div class="col-4">
            <h5 class="text-white">Telefone:</h5>
            <p class="text-break text-white"  style="font-size: 20px;">(12) XXXX-XXXX</p>

        </div>

        <div class="col-4">
            <h5 class="text-white">Celular:</h5>
            <p class="text-break text-white" style="font-size: 20px;">(12) XXXXX-XXXX</p>
        </div>
        <div class=" col-4 container text-center mb-2">
            <h5 class="text-white">WhatsApp:</h5>
            <p class="text-white" style="font-size: 20px;"><img src="<?=base_url();?>public/img/Whatsapp.png" width="40px" height="40px" alt="Responsive image">  XXXXX-XXXX</p>
        </div>
    </div>


</footer>
<!-- <div class="container-fluid">
    <div class="card- text-white bg-dark mb-3" style="max-width: 100%;">
        <div class="card-header"></div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
            </p>
        </div>

    </div>
</div>
-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>