<?php

class Login {
    //put your code here
    private $email;
    private $senha;
    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setEmail($email): void {
        $this->email = $email['email'];
    }

    function setSenha($senha): void {
        $this->senha = md5($senha['senha']);
    }


}
