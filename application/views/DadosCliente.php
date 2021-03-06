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
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/estilo.css">

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
            <a class="navbar-brand h1 mb-0" href="<?=base_url();?>">
                <h2 class="text-success">Dr. Pecê </h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown" id="navDrop">
                        <!--TEM COMO A PESSOA COLOCAR IMAGEM. SALVA EM ALGUMA PASTA?SALVA NO BANCO?-->
                        <a class="nav-link"  data-toggle="dropdown" data-placement="bottom" title=<?php echo $CI->session->userdata("cli_nome");?>><img src="../../public/img/circleImagem.jpg"class="rounded-circle" width="30px" height="30px"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item ml-2" href="#">Compras</a>
                            <a class="dropdown-item ml-2" href="<?=base_url().'index.php/Cliente/exibirDados';?>">Dados</a>
                            <a class="dropdown-item ml-2" href="<?=base_url().'index.php/Cliente/logoff';?>">Sair</a>
                        </div>
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
                            <a class="dropdown-item ml-2" href="#"><img src=".<?=base_url();?>public/img/IconFace.png" width="30px"
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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 shadow p-3 mb-5 bg-white rounded">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dados</a>
                                <a class="nav-link" id="v-pills-man-tab" data-toggle="pill" href="#v-pills-man" role="tab" aria-controls="v-pills-man" aria-selected="false">Pedidos Manutenção</a>
                                <a class="nav-link" id="v-pills-mon-tab" data-toggle="pill" href="#v-pills-mon" role="tab" aria-controls="v-pills-mon" aria-selected="false">Pedidos Montagem</a>
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
                                <div class="col-lg-9 col-md-9 col-sm-12 shadow p-3 mb-5 bg-white rounded" style="position:center;">
                                    <div class="tab-content" id="v-pills-tabContent">
                                      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <?php echo validation_errors(); ?>
                                        <?php if(isset($mensagens)) echo $mensagens; ?>

                                        <?php  echo form_open('index.php/Cliente/AlteraCliente'); ?>
                                        <div class="container">
                                           <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">Nome</label>
                                            <div class="col-sm-9">
                                                <input type="text"  class="form-control" id="" name="cli_nome" readonly="readonly" value="<?= $rows_cli['cli_nome'];?>" >
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">CPF</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control cpf" id="cli_cpf" name="cli_cpf" readonly="readonly" value="<?= $rows_cli['cli_cpf'];?>">
                                            </div>
                                        </div>

                                        <div class="form-group inline">
                                            <label for="cep" class="col-sm-4 col-form-label">CEP</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control cep" id="cep" name="cli_cep" value="<?= $rows_cli['cli_cep'];?>" >
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success" id="btnPesquisar">Pesquisar</button>
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
                                       <!--  <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">Foto</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="" name="cli_imagem" >
                                            </div>
                                        </div> -->
                                        <?php
                                    }
                                    ?>
                                    <div class="col-sm-3 ">
                                        <button type="submit" class="btn btn-warning btn-block">Alterar</button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>

                                <hr noshade=”noshade”/>
                                <?php echo validation_errors(); ?>
                                <?php if(isset($mensagens)) echo $mensagens; ?>
                                <?php  echo form_open('index.php/Cliente/AlteraSenhaCliente'); ?>
                                <div class="container">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Senha atual</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password1" name="cli_senhaAntiga"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Nova senha</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password2" name="cli_senha"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 ">
                                        <button type="submit" class="btn btn-warning btn-block">Alterar</button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>

                            <div class="tab-pane fade" id="v-pills-man" role="tabpanel" aria-labelledby="v-pills-man-tab">
                                <div class="container">
                                  <div class="container theme-showcase flex-row" role="main" id="container-Pmanutencao">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo Manutenção</th>
                                                        <th>Descrição</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $CI = & get_instance();
                                                    $CI->load->library('session');

                                                    $CI->load->model('Teste_model');
                                                    $cpf=$CI->session->userdata('cli_cpf');
                                                    $man=$CI->Teste_model->exibeMandaManutencao01($cpf);
                                        //$manman=$this->Teste_model->exibeMandaItensManutencao();
                                                    if($man->num_rows()== 0){ ?>
                                                        <tr><td><?php echo "Ainda não foi realizado nenhum pedido!";?></td></tr>
                                                        <?php
                                                    }else{                                                    foreach($man->result_array() as $rows_mmanutencao){ 

                                                        $pman_codigo=$rows_mmanutencao['pman_codigo']; 
                                                    //$cli_cpf=$rows_mmanutencao['cli_cpf'];
                                                        $data=$CI->Teste_model->exibeMandaItensManutencao01($pman_codigo);
                                                        $cliente=$CI->Teste_model->selecionaCliente01();
                                                    //print_r($this->db->last_query()); 
                                                        ?>
                                                        <tr>   
                                                            <td>    
                                                                <?php
                                                                foreach($data as $datas){ ?>
                                                                   <li> <?php echo $datas['tman_nome']."</br>"; ?></li>
                                                                   <?php
                                                               }
                                                               ?>
                                                           </td>
                                                           <td>    
                                                            <?php
                                                            foreach($data as $datas){ ?>
                                                                <li><?php echo $datas['pman_descricao']."</br>"; ?></li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-mon" role="tabpanel" aria-labelledby="v-pills-mon-tab">
                    <div class="container">
                      <div class="container theme-showcase flex-row" role="main" id="container-Pmontagem">
                        <div class="row">
                            <div class="col-md-7">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Montagem</th>
                                            <th>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $CI = & get_instance();
                                        $CI->load->library('session');

                                        $CI->load->model('Teste_model');
                                        $cpf=$CI->session->userdata('cli_cpf');
                                        $mon=$CI->Teste_model->exibeMandaMontagem01($cpf);
                                        //$manman=$this->Teste_model->exibeMandaItensManutencao();
                                        if($mon->num_rows()== 0){ ?>
                                            <tr><td><?php echo "Ainda não foi realizado nenhum pedido!";?></td></tr>
                                            <?php
                                        }else{ 
                                            foreach($mon->result_array() as $rows_mmontagem){ 

                                                $pmon_codigo=$rows_mmontagem['pmon_codigo']; 
                                                    //$cli_cpf=$rows_mmanutencao['cli_cpf'];
                                                $data=$CI->Teste_model->exibeMandaItensMontagem01($pmon_codigo);
                                                $cliente=$CI->Teste_model->selecionaCliente01();
                                            //print_r($this->db->last_query()); 
                                                ?>
                                                <tr>
                                                    <td>    
                                                        <?php
                                                        foreach($data as $datas){ ?>
                                                            <li><?php echo $datas['pec_nome']."</br>";?></li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>    
                                                        <?php
                                                        foreach($data as $datas){ ?>
                                                           <li> <?php echo $datas['catp_nome']."</br>"; ?></li>
                                                           <?php
                                                       }
                                                       ?>
                                                   </td>
                                               </tr>
                                               <?php
                                           }
                                       } ?>
                                   </tbody>
                               </table>
                           </div>
                       </div>      
                   </div>
               </div>
           </div>


       </div>
   </div>
   <?php
                        }//fecha if
                        ?>
                    </div> 
                </div><!--Primeiro container-->
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
                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->

                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
                <script src="<?= base_url()?>public/js/CEP.js"></script>
                <script src="<?= base_url()?>public/js/jquery.mask.min.js"></script>
                <script src="<?= base_url()?>public/js/Mascara.js"></script>

                <script type="text/javascript">
            /*$('.cep').mask('00000-000');
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
          $('.sp_celphones').mask(cel, spOptions);*/
      </script>
      <!-- <script type="text/javascript">
          const password1=document.getElementById("password1");
          const eyeBtn=document.getElementById("eye-btn");

          eyeBtn.addEventListener("click",(e)=>{
            if(password1.type ==="password"){
                e.target.setAttribute("class","glyphicon glyphicon-eye-close");
                password1.type="text";
            }else{
              e.target.setAttribute("class","glyphicon glyphicon-eye-open");
              password1.type="password";   
          }
      });
  </script> -->
</body>

</html>