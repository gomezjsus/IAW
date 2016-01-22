<!DOCTYPE html>
<?php

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Color:
        <?php
        if (isset($_COOKIE['color']))
            echo $_COOKIE['color'];
        else
            echo "No se ha establecido ningún color";
        // put your code here
        ?>
        <a href="index.php">Volver a inicio</a>
    </body>
</html>
