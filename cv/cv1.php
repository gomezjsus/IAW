<?php
    function subir_foto($foto){
        if($foto['type'] == "image/gif" || $foto['type'] == "image/jpeg" || $foto['type'] == "image/jpg" || $foto['type'] == "image/png" || $foto['type'] == "image/bmp"){
           move_uploaded_file($foto['tmp_name'], $dir.$foto['name']);
        }else
            echo "Error al subir el fichero";
    }
    
    subir_foto($_FILES['foto']);
    // subir_pdf($_FILES['cv']);
     
    
    $dir="files/";
    $valida=0;
    if (isset($_POST['enviar'])){
        if (is_uploaded_file($_FILES['foto']['tmp_name'])){
            move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$_FILES['foto']['name']);
            $valida=1;
        }
        else{
            $errfoto="Error al subir la foto.";
            $valida=0;
        }
        if (is_uploaded_file($_FILES['cv']['tmp_name'])){
            move_uploaded_file($_FILES['cv']['tmp_name'], $dir.$_FILES['cv']['name']);
            $valida=1;
        }
        else{
            $errcv="Error al subir el cv.";
            $valida=0;
        }
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
        <?php
        if ($valida==0 || !isset($_POST['enviar'])){
        ?>
        <form method="POST" enctype="multipart/form-data" >
            Nombre: <input type="text" name="nombre" value="" /><br>
            Apellidos:<input type="text" name="apellidos" value="" /><br>
            Foto:<input type="file" name="foto" value="" /><?=isset($errfoto) ? $errfoto : "" ?><br>
            CV [PDF]:<input type="file" name="cv" value="" /><?=isset($errcv) ? $errcv : "" ?><br>
            <input type="submit" name="enviar" value="Enviar" />
            <input type="reset" name="borrar" value="Borrar" />
        </form>
        <?php
        }
        else {
            echo "Nombre: ".$_POST['nombre'];
            echo "Apellidos: ".$_POST['apellidos'];
            echo "Foto: ".$_FILES['foto']['name'];
            echo "CV: ".$_FILES['cv']['name'];
        
        }
?>
        
    </body>
</html>


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

