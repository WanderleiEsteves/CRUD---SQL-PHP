<?php
Header('Content-type:text/html;charset=utf8');
require_once "../model/ConexaoBD.php";
$con = new ConexaoBD;
$rows = "";
$id = "";
if($_POST)
{
    if(isset($_POST['update']))
    {
        $id = $_POST['update'];

        if($id == '')
        {
            echo "Uma valor está faltando, por favor, volte a página inicial!<br/>";
            unset($_POST);
            ?>
            <a href="index.php">
                <button>
                    Voltar para a página inicial
                </button>
            </a>
            <?php
            exit;

        }else
        {
            $id = intval($id);
            $rows = $con->Query("select nome,email,senha,dt_nasc,telefone,endereco from usuario where id=". $id .";");
        }
    }

    if(isset($_POST['id']))
    {
        $comando = "update usuario set nome='{$_POST['name']}', email='{$_POST['email']}', senha='{$_POST['senha']}', dt_nasc='{$_POST['birth']}', telefone='{$_POST['phone']}', endereco='{$_POST['adress']}' where id={$_POST['id']};";
        $resultado = $con->NoQuery($comando);

        if($resultado[0] != '00000')
        {
            echo "Erro! Não foi possível atualizar o perfil</br>";
            ?><a href="page_update.php"><button>Voltar</button></a><?php
            exit;

        }else
        {
            header('location:index.php');
        }
    }
}else
{
    Echo "Tente acessar essa página passando primeiro pela página inicial!</br>";
    ?>
    <a href="index.php">
        <button>
            Voltar para a página inicial
        </button>
    </a>
    <?php
    exit;
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
        <?php foreach($rows as $row){ ?>

        <div class="container">
            <h2 class="py-5 text-center">Alterar usuário</h2>

            <form method="POST" action="">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nome <i class="bi bi-person"></i></label>
                        <input type="text" placeholder="<?php echo $row->nome;?>" class="form-control" name="name" required autofocus>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail <i class="bi bi-envelope"></i></label>
                        <input type="email" placeholder="<?php echo $row->email;?>" class="form-control" name="email" required>
                    </div>

                    <div class="col-md-4">
                        <label for="senha" class="form-label">Senha <i class="bi bi-file-earmark-lock"></i></label>
                        <input type="password" placeholder="<?php echo $row->senha;?>" class="form-control" name="senha" required>
                    </div>

                    <div class="col-md-4">
                        <label for="birth" class="form-label">Dt. de Nascimento <i class="bi bi-calendar"></i></label>
                        <input type="date" class="form-control" name="birth" required>
                    </div>

                    <div class="col-md-4">
                        <label for="phone" class="form-label">Telefone <i class="bi bi-whatsapp"></i></label>
                        <input type="text" placeholder="<?php echo $row->telefone;?>" class="form-control" name="phone" required>
                    </div>

                    <div class="col-md-12">
                        <label for="address" class="form-label">Endereço <i class="bi bi-map"></i></label>
                        <input type="text" placeholder="<?php echo $row->endereco;?>" class="form-control" name="adress">
                    </div><?php }?>

                    <hr class="my-4">

                    <div class="col-md-12 text-end">
                        <button class="btn btn-primary btn-lg" type="submit" name="id" value="<?php echo $id;?>">Atualizar</button>
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