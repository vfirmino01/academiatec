<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Área Restrita</h1>
        <?php
            session_start();
            if(! $_SESSION['email']){
                header('location:../index.php');
                exit();
            }
            echo $_SESSION['email'];
            echo "<br>";
            echo $_SESSION['id'];
        ?>
        <br>
        <a href="../Controller/Logoff.php">Sair</a>
    </body>
</html>
