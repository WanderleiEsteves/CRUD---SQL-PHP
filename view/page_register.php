<?php
header('Content-type:text/html;charset=utf8');
include_once "../model/ConexaoBD.php";
$con = new ConexaoBD;
$cont = 0;

if($_POST)
{
    foreach($_POST as $valor)
    {
        if($valor == '')
        {
            $cont++;          
        }
    }

    if($cont > 0)   
    {
        echo "Não foi possível cadastrar-se!</br>Há campos que não foram preechidos.</br>";
        unset($_POST);
        ?><a href="page_register.php"><button>Voltar</button></a><?php
        exit;

    }else
    {
        $comando = "insert into usuario values (null,'{$_POST["name"]}','{$_POST["email"]}','{$_POST["senha"]}','{$_POST["birth"]}','{$_POST["phone"]}','{$_POST["adress"]}');";
        $resultado = $con->NoQuery($comando);

        if($resultado[0] != '00000')
        {
            echo "Erro! Não foi possível cadastrar-se</br>";
            unset($_POST);
            ?><a href="page_register.php"><button>Voltar</button></a><?php
            exit;

        }else
        {
            ?><script>alert("Cadastro realizado com sucesso!")</script><?php
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <?php header('Content-type:text/html;charset=utf8');?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD - Udemy</title>

        <!-- Ícone na janela do navegador -->
        <link rel="shortcut icon" href="../resources/favicon.png" type="image/x-con">

        <!-- Bootstrapt 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- Ícones do Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- GoogleForms - OpenSars -->
        <link href="fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>

        <!-- Folha de Estilo(CSS) -->
        <style>

            body
            {
                margin: 20px;
                background-color: #FFFFFF;
            }

            *
            {
                font-family:'Open Sans', sans-serif;
            }

            h2
            {
                font-family:'Open Sans', sans-serif;
            }

            .thead
            {
                background-color: #F7F7F7;
            }

        </style>
    </head>
    <body>

        <div class="container">
            <h2 class="py-5 text-center">Novo usuário</h2>

            <form method="POST" action="">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nome <i class="bi bi-person"></i></label>
                        <input type="text" class="form-control" name="name" required autofocus>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail <i class="bi bi-envelope"></i></label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="col-md-4">
                        <label for="senha" class="form-label">Senha <i class="bi bi-file-earmark-lock"></i></label>
                        <input type="password" class="form-control" name="senha" required>
                    </div>

                    <div class="col-md-4">
                        <label for="birth" class="form-label">Dt. de Nascimento <i class="bi bi-calendar"></i></label>
                        <input type="date" class="form-control" name="birth" required>
                    </div>

                    <div class="col-md-4">
                        <label for="phone" class="form-label">Telefone <i class="bi bi-whatsapp"></i></label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>

                    <div class="col-md-12">
                        <label for="address" class="form-label">Endereço <i class="bi bi-map"></i></label>
                        <input type="text" class="form-control" name="adress">
                    </div>

                    <hr class="my-4">

                    <div class="col-md-12 text-end">
                        <button class="btn btn-primary btn-lg" type="submit">Cadastrar</button>
                        <a class="btn btn-success btn-lg" href="index.php">Cancelar</a>
                    </div>

                </div>
            </form>

        </div>

        <!-- JQuery e JqueryMask-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js/"></script>

    </body>
</html>