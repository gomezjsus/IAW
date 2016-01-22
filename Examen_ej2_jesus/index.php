<?php
if (isset($_POST['subir'])){   
    
    if (isset($_POST['carpeta']) && isset($_FILES['fichero']) && ($_POST['carpeta'] != "") && (strlen($_POST['carpeta']) < 15) ) { 
        $carpeta=trim(str_replace("/", "", $_POST['carpeta']));
        $carpeta=str_replace("\\", "", $carpeta);
        $fichero=$_FILES['fichero'];
        if ( !is_dir($carpeta)  ) {
            if ( is_uploaded_file($fichero['tmp_name']) ) {        
            mkdir($carpeta);
            $mensaje="Carpeta creada correctamente.</br>";
            //No es necesario controlar la existencia del fichero, porque el Directorio se tiene que crear siempre
            move_uploaded_file($fichero['tmp_name'], $carpeta."/".$fichero['name']);
            $mensaje=$mensaje."Fichero subido correctamente.</br>";
            }
            else 
                $errfile="Fichero no subido";
        }         
        else 
            $errdir="El directorio ya existe.";
    }
    else
        $errdir="Nombre de directorio no valido.";                                     
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            Fichero: <input type="file" name="fichero" value="" /><?=isset($errfile) ? $errfile : "" ?><br>
            Directorio: <input type="text" name="carpeta" value="" /><?=isset($errdir) ? $errdir : "" ?><br>
            <input type="submit" name="subir" value="Subir" />
        </form>
        <?php
        if ( isset($mensaje) )
            echo $mensaje;
        ?>
    </body>
</html>
