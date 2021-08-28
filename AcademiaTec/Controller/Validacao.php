<?php


class Validacao {
    //put your code here
    public function verifcaCampoVazios($arrayDados) {
        $saida = true;
        foreach ($arrayDados as $dados){            
            if(empty($dados)){
                $saida = false;
                break;
            }
        }
        return $saida;
    }
    public function validaEmail($param) {
        return filter_var($param['email'], FILTER_VALIDATE_EMAIL);
    }
    public function validaSenha($param) {
        echo $param['senha'] ."<br>";
        if( preg_match("^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$", $param['senha'])){
            echo "Senha dentro do padrão";
        }else{
            echo "senha inválida";
        }
    }
    public function removeTagHtml($arrayDados) {
        $saida = true;
        foreach ($arrayDados as $key=> $valor){ 
            $valor = str_replace("'", "", $valor);            
            $valor = str_replace(",", "", $valor);
            $valor = str_replace("<", "", $valor);            
            $valor = str_replace(">", "", $valor);
            
            if($valor != $arrayDados[$key]){
                $saida = false;
                break;;
            }
        }
        return $saida;
    }
}
