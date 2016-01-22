<?php
    session_start();
    include 'funciones.php';
    if (isset($_POST['salir']))
        unset($_SESSION);
    if (isset($_POST['continuar'])){
        if (!empty($_POST['nombre']) && soloLetras($_POST['nombre'])){        
            $_SESSION['nombre']=$_POST['nombre'];
            header("Location: apellidos.php");
        }
        else
            $error='Nombre vacio o con caractares que no son letras';
            
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
            Escriba su nombre</br>
            <input type="text" name="nombre" /><?=isset($error) ? $error : ''?>
            </br>
            <input type="submit" name="continuar" value="Continuar" />
            <input type="reset" name="borrar" value="Borrar" />
            
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
