<?php
    session_start();
    include 'funciones.php';
    if (!isset($_POST['enviar']))
        header("Location: index.php");      
    if (isset($_POST['validar']) && $_POST['validar']=="no"){
        unset($_SESSION);
        header("Location: index.php");
    }
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
        <h1>FORMULARIO</h1>
        <form method="POST" action="index.php" >
            <li>Datos confirmados</li></br>
            Nombre: <?=$_SESSION['nombre'] ?></br>
            Apellidos: <?=$_SESSION['ape'] ?>
            </br></br>
            <input type="submit" name="salir" value="Salir" />                                    
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
