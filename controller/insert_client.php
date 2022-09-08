<?php 
include_once "../model/ConexaoBD.php";
$con = new ConexaoBD;
header('Content-type:text/html;charset=utf8');
if(!empty($_POST))
{
    $cont = 0;
    foreach($_POST as $valor)
    {
        if(empty($valor))
        {
            $cont++;
        }
    }

    if($cont > 0)
    {
        ?><script>
        window.confirm("Pelo menos um dos campos não foi preenchido, " + 
                       "portanto, não foi possível cadastrar o usuário!\n" +
                       "Preencha todos os campos para cadastrar-se!")

                     
        if(retorno == true)
        {
            <?php 
            // header('location:../view./page_register.php');
            die();
            ?>
        }
        </script>
        <?php
    }else
    {
        $con->NoQuery("insert into usuario values(null,".$_POST['name'].",".$_POST['email'].",".$_POST['senha'].",".$_POST['birth'].",".$_POST['phone'].",".$_POST['adress'].");");
    }
}else
{
    
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
</body>
</html>