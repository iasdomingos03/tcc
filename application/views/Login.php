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

<body class="bg-light">
    <!--login-->

    <div class="mx-auto my-lg-5" style="width: 480px; height: 650px;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded-lg my-3">
            <div class="card-body ">
                <img src="../../public/img/McpreS.jpeg" height="300px" width="80%" class=" rounded-pill d-block mx-auto"
                    alt="Responsive image">
                <br>
                <form name="login" action="../index.php/Login/formLogin" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><h5>Endereço de e-mail</h5></label>
                        <input type="email" class="form-control" id="" name="adm_email" id="adm_email"aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><h5>Password</h5></label>
                        <input type="password" class="form-control my-3" name="adm_senha" id="adm_senha">
                    </div>
                   <!-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>-->
                    <button type="submit" class="btn btn-primary btn-lg  btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>