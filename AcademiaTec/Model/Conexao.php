<?php

class Conexao {
    //put your code here
    private $dsn = 'mysql:host=localhost;dbname=academia_tec';
    private $usuario = 'root';
    private $senha = '';
    private $conexao;

    public function __construct() {
        try {
            $this->conexao = new PDO($this->dsn, $this->usuario, $this->senha) ;
            $this->conexao->exec('SET NAMES utf8');
            //echo "Banco Academia_tec conectado com sucesso";
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }        
    }
    public function getConexao() {
        return $this->conexao;
    }
    public function fechaConexao() {
        if($this->conexao != null){
            $this->conexao = null;
            echo"<br>conexão finalizada";
        }
    }
    
}
