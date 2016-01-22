<?php
    include 'variables.php';
    if (isset($_POST['enviar'])){
        if (isset($_POST['newalbum'])){
            $newalbum=$dir.trim($_POST['newalbum']);
            if (! is_dir($newalbum)){
                mkdir($newalbum);
                mkdir($newalbum."/mini");
            }
            else
                $errdir="Ese album ya existe.";
        }
    }    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear nuevo album</title>
    </head>
    <body>
        Listado de albums
        <ul>
            <?php
                $albums=scandir($dir);
                foreach ($albums as $carpeta)
                    if ( ($carpeta!=".") && ($carpeta!="..") )
                        echo "<li>$carpeta</li>";
            ?>
        </ul>
        <form action="" method="POST" >
            Nombre: <input type="text" name="newalbum" value="" /><?=isset($errdir) ? $errdir : "" ?><br>
            <input type="submit" name="enviar" value="Crear" />
        </form>
        <a href="index.php">Volver a inicio</a>
    </body>
</html>