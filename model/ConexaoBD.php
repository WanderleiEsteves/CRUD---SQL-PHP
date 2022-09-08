<?php  
class ConexaoBD
{
    private $host = "localhost";
    private $db = "LoginCadastro";
    private $user = "root";
    private $pwd = "";
    private $con;

    public function __construct()
    {
        try
        {
            $this->con = new PDO("mysql:host={$this->host};dbname={$this->db};charset=utf8",$this->user,$this->pwd);

        }catch (PDOException $ex)
        {
            echo "Erro: " . $ex->getMessage();
            die();
        }
    }

    public function NoQuery($comando)
    {
        try
        {
            $sql = $this->con->prepare($comando);
            $sql->execute();

            if($sql->rowCount() < 1)
            {
                return '1'; // retorna um array

            }else
            {
                return $sql->errorInfo(); // retorna um array
            }

        }catch(PDOException $erro)
        {
            echo "Erro: " . $erro->getMessage();
            die();
        }
    }

    public function Query($comando)
    {
        $sql = $this->con->prepare($comando);
        $sql->execute();

        try
        {
            if($sql->rowCount() > 0)
            {
                return $sql->fetchAll(PDO::FETCH_CLASS);
            }else
            {
                return 0;
            }

        }catch (PDOException $erro)
        {
            echo "Erro: " . $erro->getMessage();
        }
    }
}
?>