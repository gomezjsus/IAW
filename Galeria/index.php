<!DOCTYPE html>
<?php    
    include 'variables.php';
    include 'funciones.php';    
?>
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
        <a href="crear.php">Crear nuevo album</a><br/><br/><br/>
        <a href="subir.php">Subir imagenes</a><br/><br/><br/>
        <a href="galeria_jquery.php">Galeria JQuery</a><br/><br/><br/>
        <hr>
        <form action="" method="POST" >
        <p>Albums:&nbsp; 
            <select name="carpeta">
                <?php
                // Listo los directorios de la carpeta galeria
                $albums=scandir($dir);
                foreach ($albums as $carpeta)
                    if ( ($carpeta!=".") && ($carpeta!="..") )
                        if ($_POST['carpeta'] == $carpeta)
                            echo '<option value="'.$carpeta.'" selected="selected">'.$carpeta."</option>";
                        else
                            echo '<option value="'.$carpeta.'">'.$carpeta."</option>";
                ?>
            </select>
        </p>
        <input type="submit" name="enviar" value="Ver album" />
        </form>
        <br/>              
        <hr>
        <?php
        if (isset($_POST['carpeta'])){
                $folder=$_POST['carpeta'];
                $rutaimgs=$dir.$folder;
                $rutaimgsmini=$dir.$folder."/mini";
                $imgsmini=scandir($rutaimgs);
                $imgs=scandir($rutaimgsmini);
                //print_r($imgs);
                foreach ($imgsmini as $imagenes){                                    
                    if ( ($imagenes!=".") && ($imagenes!="..") ){
                        $info=pathinfo ($imagenes);
                        //print_r($info);
                        echo "<a href=".$rutaimgs."/".$imagenes."><img src=".$rutaimgsmini."/".$imagenes." ></a>&nbsp;";
                    }
                }
        }
       
        ?>        
    </body>
</html>
