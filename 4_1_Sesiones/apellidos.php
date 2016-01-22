<?php
    session_start();
    include 'funciones.php';
    if (isset($_POST['aceptar'])) {
        if (!empty($_POST['ape']) && soloLetras($_POST['ape'])){
            $_SESSION['ape']=$_POST['ape'];
            header("Location: confirmar.php");
        }
        else
            $error="Apellido vacío o no contiene solo letras";        
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
        <form method="POST" action="" >
            Escriba tu apellido</br>
            <input type="text" name="ape" /><?=isset($error) ? $error : ''?>
            </br>
            <input type="submit" name="aceptar" value="Aceptar" />
            <input type="reset" name="borrar" value="Borrar" />                        
        </form>

    </body>
</html>
