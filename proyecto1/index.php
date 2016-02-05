<?php

if ( isset($_POST['acceder']) )
    header('location: login.php');
if ( isset($_POST['registrar']) )
    header('location: registrar.php');


?>
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
        <form action="" method="post">
            Login: <input type="text" name="login" value="" /><br>
            Password: <input type="password" name="password" value="" /><br>
            <input type="submit" name="acceder" value="Acceder" />
            <input type="submit" name="registrar" value="Registrar" />
        </form>             
        <?php
        // put your code here
        ?>
    </body>
</html>
