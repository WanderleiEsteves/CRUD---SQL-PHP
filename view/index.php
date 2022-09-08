<?php
include_once "../model/ConexaoBD.php"; 
$con = new ConexaoBD;
$rows = $con->Query("Select * from usuario;");
if($_POST)
{
    if(isset($_POST['drop']))
    {
        $id = intval($_POST['drop']);
        $sql = $con->Query("Delete from usuario where id={$id};");
    }
    $rows = $con->Query("Select * from usuario;");
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php header('Content-type:text/html;charset=utf8');?>
        <meta charset="UTF-8">
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

            *{ text-align: center;}

        </style>
    </head>
    <body>

        <!-- Dentro do container será criado toda a página -->
        <div class="container">            
            <h2 class="text-center"> Lista de Usuários <i class="bi bi-people-fill"></i></h2>
            <h5 class="text-end">
                <a href="page_register.php" class="btn btn-primary btn-xs">
                    <i class="bi bi-person-plus-fill"></i>
                </a>
            </h5>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead">
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>E-MAIL</th>
                            <th>SENHA</th>
                            <th>DT. DE NASCIMENTO</th>
                            <th>ENDERECO</th>
                            <th>TELEFONE</th>
                            <th colspan="3">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rows as $row){?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->nome; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->senha; ?></td>
                            <td><?php echo $row->dt_nasc; ?></td>
                            <td><?php echo $row->endereco; ?></td>
                            <td><?php echo $row->telefone; ?></td>
                            <td>
                                <form method="POST" action="page_update.php">
                                    <button class="btn btn-warning btn-xs" name="update" value="<?php echo $row->id;?>">
                                        <i class="bi bi-person-square"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="index.php" onclick="return window.confirm('Você realmente quer excluir essa conta?')">
                                    <button class="btn btn-danger btn-xs" name="drop" value="<?php echo $row->id;?>">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>


        
        <!-- JQuery e JqueryMask-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js/"></script>

    </body>
</html>