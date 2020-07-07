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

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/estilo.css">

    <script src="https://use.fontawesome.com/5ab8d1aeb8.js"></script>

    <title>Loja virtual Dr. Pecê</title>
</head>

<body class="bg-light">
    <!--login-->

    <div class="mx-auto my-lg-5" style="width: 480px; height: 650px;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded-lg my-3">
            <div class="card-body ">
                <?php echo validation_errors(); ?>
                <?php if(isset($mensagens)) echo $mensagens; ?>
                <?php  echo  form_open('index.php/Login/formLogin'); ?>
                <img src="<?=base_url();?>/public/img/McpreS.jpeg" height="300px" width="80%" class=" rounded-pill d-block mx-auto"
                alt="Responsive image">
                <br>
                <!--                 <form name="login" action="../Login/formLogin" method="POST"> -->

                    <div class="form-group">
                        <label for="exampleInputEmail1"><h5>Endereço de e-mail</h5></label>
                        <input type="email" class="form-control" id="" name="adm_email" id="adm_email"aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                        <br>
                        <label for="exampleInputPassword1"><h5>Password</h5></label>
                        <div class="input-group" id="show_hide_password">
                          <input class="form-control" type="password" name="adm_senha" id="adm_senha">
                          <div class="input-group-text">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true" style="color:blue;"></i></a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg  btn-block mt-5">Submit</button>
                </div>
                   <!-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>-->
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