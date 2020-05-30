<!doctype html>
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
    <!--Carrossel-->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../public/img/banner1.jpg" class="img-fluid d-block w-200" alt="Responsive image">
                <div class="carousel-caption d-none d-md-block">
                    <h2></h2>
                    <p></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../public/img/banner1.jpg" class="img-fluid d-block w-200" alt="Responsive image">
                <div class="carousel-caption d-none d-md-block">
                    <h2></h2>
                    <p></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../public/img/banner1.jpg" class="img-fluid d-block w-200" alt="Responsive image">
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
                    <img src="img/game.png" class="img-thumbnail img-fluid" alt="Responsive image">
                </div>
            </div>
            <div class="col-2  my-2">
                <div class="container align-content-start bg-success rounded">
                    <img src="img/ferra.png" class="img-thumbnail" alt="Responsive image">
                </div>
            </div>

            <div class="col-2  my-2">
                <div class="container align-content-start bg-success rounded">
                    <img src="img/arte.png" class="img-thumbnail" alt="Responsive image">
                </div>
            </div>
            <div class="col-2  my-2">
                <div class="container align-content-start bg-success rounded">
                    <img src="img/peças.png" class="img-thumbnail" alt="Responsive image">
                </div>
            </div>
            <div class="col-2 my-2 mr-auto">
                <div class="container align-content-start bg-success rounded">
                    <img src="img/" class="img-thumbnail" alt="Responsive image">
                </div>
            </div>
        </div>-->
    </div>

    <!--Scrollspy-->

    <div class="row align-content-center ">
        <div class="col-sm-4 col-md-3 ">
            <nav id="Scrollspy1" class="Scrollspy1" class="navbar-lg navbar-dark bg-light">
                <nav class=" nav nav-pills  flex-column">
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
            <div data-spy="scroll" class="ScrollspySite" data-target="#Scrollspy1" data-offset="0">
                <h4 id="item-1">Jogos</h4>
                <p>É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto
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
                <p>É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto
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
                <p>É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto
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
                <p>É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto
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
                <p>É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto
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
    <!--faixa negra-->
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
    <!--Cards-->
    <div class="row my-3 justify-content-sm-center">
        <div class="col-sm-auto col-md-3">
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
        <div class="col-sm-auto col-md-3">
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
        <div class="col-sm-auto col-md-3">
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
        <div class="col-sm-auto col-md-3">
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


    <div class="row my-3 justify-content-sm-center">
        <div class="col-sm-auto col-md-3">
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
        <div class="col-sm-auto col-md-3">
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
        <div class="col-sm-auto col-md-3">
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
        <div class="col-sm-auto col-md-3">
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
</body>

</html>