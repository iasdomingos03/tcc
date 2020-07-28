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
    <style type="text/css">
     a:not([href]):hover {
        color: #007bff;
        /*text-decoration:underline;*/
        cursor: pointer;
    }
</style>

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
        <!--Collapse-->
        
        <div class="container" style="background-color: white">
            <?php echo validation_errors(); ?> 
            <?php if(isset($vman)) echo $vman; ?>
            <?php  echo  form_open('index.php/MontagemComputador/verificaMontagem'); ?>
            <?php
            $i=1;
            $this->load->model('Formulario_model');
            $catpec=$this->Formulario_model->exibirCategoriaPecas();
            ?>
            <div class="accordion" id="accordionExample">
                <?php
                foreach ($catpec->result_array() as $ct) { 
                    $catp_codigo=$ct['catp_codigo'];
                    ?>
                    <div class="card">   
                        <div class="card-header" id="headingOne">
                            <button class="btn btn-link <?php if($i>1) echo "collapsed"; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i==1) ? 'true': 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
                                <?= $ct['catp_nome'];?>
                            </button>
                        </div>
                        <?php
                        $this->load->model('Teste_model');
                        $pecas=$this->Teste_model->exibirPecaspCategoria($catp_codigo);
                        foreach ($pecas->result_array() as $pec) { 
                            $pec_codigo=$pec['pec_codigo'];
                            $icp=$this->Teste_model->innerJoinCategoriaPecas($pec_codigo);
                            $ifp=$this->Teste_model->innerJoinFornecedorPecas($pec_codigo);
                            $imarp=$this->Teste_model->innerJoinMarcaPecas($pec_codigo);
                            $imodp=$this->Teste_model->innerJoinModeloPecas($pec_codigo);

                            ?>
                            <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i==1) echo 'show'; ?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordionExample">
                              <div class="card-body">
                                <?php
                                if($pec['pec_foto']==''){
                                    ?>
                                    <input type="checkbox" name="pecMontagem[]" value="<?=$ct['catp_codigo']?>,<?=$pec['pec_codigo']?>">
                                    <a data-toggle="modal" data-target="#myModalPecas<?php echo $pec['pec_codigo'];?>" data-tt="tooltip" title="O produto ainda não possui visualização!">
                                     <span class="checkmark"><?= $pec['pec_nome'];?></span>
                                 </a>
                                 <div class="modal fade" id="myModalPecas<?php echo $pec['pec_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
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
                                                                <td><?php echo $pec['pec_nome']; ?></td>
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
                                                                <th>Descricao</th>
                                                                <td><?php echo $pec['pec_descricao'];  ?></td>
                                                            </tr>

                                                            <tr class="thead-dark">
                                                                <th scope="row">Preço</th>
                                                                <td><?php echo $pec['pec_preco']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }else{
                                ?>   
                                <input type="checkbox" name="pecMontagem[]" value="<?=$ct['catp_codigo']?>,<?=$pec['pec_codigo']?>">

                                <a data-toggle="modal" data-target="#myModalPecas<?php echo $pec['pec_codigo'];?>" data-tt="tooltip" title="<img src='<?=base_url();?>uploads/<?= $pec['pec_foto']; ?>' class='card-img-top' alt='Responsive image' />">
                                    <span class="checkmark"><?= $pec['pec_nome'];?></span>
                                </a>
                                <div class="modal fade" id="myModalPecas<?php echo $pec['pec_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal">
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
                                                                <td><?php echo $pec['pec_nome']; ?></td>
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
                                                                <th>Descricao</th>
                                                                <td><?php echo $pec['pec_descricao'];  ?></td>
                                                            </tr>

                                                            <tr class="thead-dark">
                                                                <th scope="row">Preço</th>
                                                                <td><?php echo $pec['pec_preco']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
            $i++;
        } ?>
    </div>
    <br>
    <button type="submit"  class="btn btn-success" style="color: white">Enviar</button>
    <?php echo form_close(); ?>

</div><!-- Fim container-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    // $("a[data-tt=tooltip]").tooltip();

    $('a[data-tt="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',
        html: true
    });
    // $('[data-toggle="modal"]').modal();
</script>
</body>
</html>