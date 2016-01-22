<?php
    session_start();
    include 'funciones.php';   
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
        <form method="POST" action="datos.php" >
            Nombre: <?=$_SESSION['nombre'] ?></br>
            Apellidos: <?=$_SESSION['ape'] ?>
            </br>
            Confirmar:
            Si<input type="radio" name="validar" value="si" />
            No<input type="radio" name="validar" value="no" /></br>
            <input type="submit" name="enviar" value="Enviar" />                                    
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
