<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <div class="container">            
            <div class="row p-2 w-50 bg-w-50 bg-success">
                <div class="col-md">
                    <form action="index.php" method="post">
                        <p>
                            <label for="txtEmail">Email</label>
                            <input class="form-control" type="email" name="txtEmail" id="txtEmail">
                        </p>
                        <p>
                            <label for="txtSenha">Senha</label>
                            <input class="form-control" type="text" name="txtSenha" id="txtSenha">
                            <!--pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$"-->
                        </p>
                        <p>
                            <input type="submit" name="btnEntrar" value="Entrar" >
                            <input type="submit" name="btnCadastrar" value="Cadastre-se" >
                        </p>
                    </form>

                </div>                
            </div>

        </div>        

        <?php
        // put your code here
        require_once '../AcademiaTec/Controller/Login.php';
        require_once '../AcademiaTec/Model/Conexao.php';
        require_once '../AcademiaTec/Model/OperacoesLogin.php';
        require_once '../AcademiaTec/Controller/Validacao.php';

        function getCampos() {
            $arrayDados = [];
            $arrayDados['email'] = $_POST['txtEmail'];
            $arrayDados['senha'] = $_POST['txtSenha'];
            return $arrayDados;
        }

        if (isset($_POST['btnEntrar'])) {
            $valida = new Validacao();
            //if (!empty($_POST['txtEmail'] && $_POST['txtSenha'])) {
            if ($valida->verifcaCampoVazios(getCampos())) {
                if ($valida->removeTagHtml(getCampos())) {
                    if ($valida->validaEmail(getCampos())) {
                        //cria um objeto da classe Login
                        $login = new Login();
                        $login->setEmail(getCampos());
                        $login->setSenha(getCampos());

                        $opLogin = new OperacoesLogin();
                        $opLogin->verificaLogin($login);
                    } else {
                        echo "Email inválido ";
                    }
                } else {
                    //echo "você digitou simbolos inapropriados";
                    header('location:index.php');
                }
            } else {
                echo "Existe campos vazios";
            }
        }
        if (isset($_POST['btnCadastrar'])) {
            $valida = new Validacao();
            //if (!empty($_POST['txtEmail'] && $_POST['txtSenha'])) {
            if ($valida->verifcaCampoVazios(getCampos())) {
                if ($valida->removeTagHtml(getCampos())) {
                    if ($valida->validaEmail(getCampos())) {
                        //cria um objeto da classe Login
                        $login = new Login();
                        $login->setEmail(getCampos());
                        $login->setSenha(getCampos());

                        $opLogin = new OperacoesLogin();
                        $opLogin->cadastroLogin($login);
                    } else {
                        echo "Email inválido ";
                    }
                } else {
                    //echo "você digitou simbolos inapropriados";
                    header('location:index.php');
                }
            } else {
                echo "Existe campos vazios";
            }
        }
        ?>
    </body>
</html>
