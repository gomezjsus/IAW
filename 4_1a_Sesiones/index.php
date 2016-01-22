<?php
    session_start();
    include 'funciones.php';
      
    if (isset($_POST['continuar'])){
        if (!empty($_POST['nombre']) && soloLetras($_POST['nombre'])){        
            $_SESSION['datos'][]=$_POST['nombre'];            
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
        <h1>INTRODUCCIÓN DE NOMBRE</h1>
        <form method="POST" action="" >
            Escriba algún nombre</br>
            <input type="text" name="nombre" /><?=isset($error) ? $error : ''?>
            </br>
            <input type="submit" name="continuar" value="Continuar" />
            <input type="reset" name="borrar" value="Borrar" />           
        </form>
        </br></br>
        <?php
        // put your code here
        if (isset($_SESSION['datos'])){
            foreach ($_SESSION['datos'] as $clave){
                echo "- ".$clave."</br>";
            }        
        }
        ?>
        </br>
        <a href="logout.php">Cerrar sesión</a>
    </body>
</html>
