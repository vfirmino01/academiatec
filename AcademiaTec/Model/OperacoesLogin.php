<?php
session_start();


require_once '../AcademiaTec/Model/Conexao.php';

class OperacoesLogin {

    //put your code here
    private $conexao;

    public function verificaLogin(Login $login) {
        //$sql = "select * from login where email = '".$email."' and senha = '".$senha."' ";
        $sql = "select * from login where email = ? and senha = ? ";
        $con = new Conexao();
        $this->conexao = $con->getConexao();
        $stm = $this->conexao->prepare($sql);

        $stm->bindValue(1, $login->getEmail(), PDO::PARAM_STR);
        $stm->bindValue(2, $login->getSenha(), PDO::PARAM_STR);

        $stm->execute();
        if ($stm->rowCount() > 0) {
            //echo"<br> Usuário Autenticado"; 
            $_SESSION['email'] = $login->getEmail();
            $_SESSION['id'] = session_id();
            
            //$_SESSION['status'] = "ativo";
            header('location:./View/home.php');
        } else {
            //echo"<br> Usuário não existe na tabela Login";
            header('location:index.php');
        }
    }

    public function cadastroLogin(Login $log) {
        try {
            $con = new Conexao();
            $this->conexao = $con->getConexao();
            $sql = "insert into login (email, senha, status)values (?, ?, ?)";
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $log->getEmail(), PDO::PARAM_STR);
            $stm->bindValue(2, md5($log->getSenha()), PDO::PARAM_STR);
            $stm->bindValue(3, "ativo", PDO::PARAM_STR);
            //md5 = criptografia
            if($stm->execute()){
                echo "Cadastro efetuado com sucesso !!";
            }else{
                echo "Erro ao efetuar Cadastro !!";
            }                    
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
