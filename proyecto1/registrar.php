<?php

include 'config.php';

if ( isset($_POST['cancelar']) )
    header('location: index.php');

if ( isset($_POST['alta']) )    
    if (!empty($_POST['login'])  && !empty ($_POST['password']))
        $mysql = new mysqli($host, $user, $pass, $bd);
        if (mysqli_connect_errno())
            echo "Error: ".  mysqli_connect_errno();
//    header('location: registrar.php');


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
            Email: <input type="text" name="correo" value="" /><br>            
            <input type="submit" name="alta" value="Alta" />
            <input type="submit" name="cancelar" value="Cancelar" />
        </form>             
        <?php
        // put your code here
        ?>
    </body>
</html>