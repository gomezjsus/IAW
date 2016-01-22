<?php
    include 'variables.php';
    include 'funciones.php';    
    if (isset($_POST['enviar'])){
        if (isset($_FILES['newimagen']))
            $newimagen=$_FILES['newimagen'];
        if (isset($_POST['carpeta']))
            $carpeta=$_POST['carpeta']."/";
      
        if (is_uploaded_file($newimagen['tmp_name'])){
            if ( ($newimagen['type'] == "image/jpeg") || ($newimagen['type'] == "image/jpg") ){
                if ( is_file($dir.$carpeta.$newimagen['name']) )
                    $errimg="La imagen ya existe.";
                else{
                    move_uploaded_file($newimagen['tmp_name'], $dir.$carpeta.$newimagen['name']);
                    crear_mini($dir.$carpeta.$newimagen['name'], $dir.$carpeta."mini/", 100);
                }
            } 
            else
                $errimg="Solo se aceptan imagenes jpeg o jpg.";
        }
        else
            $errimg="Error al subir la foto.";                            
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subir fotos</title>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data" >
            <select name="carpeta">
                <?php
                $albums=scandir($dir);
                foreach ($albums as $carpeta)
                    if ( ($carpeta!=".") && ($carpeta!="..") )
                        echo "<option value=".$carpeta.">".$carpeta."</option>";
                ?>
            </select>
            Imagen:<input type="file" name="newimagen" value="" /><?=isset($errimg) ? $errimg : "" ?><br>
            <input type="submit" name="enviar" value="Subir" />
        </form>
        <a href="index.php">Volver a inicio</a>
    </body>
</html>
