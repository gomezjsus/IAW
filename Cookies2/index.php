<!DOCTYPE html>
<?php
if (isset($_POST['cambiar']))
    setcookie('color',$_POST['opt'],time()+3600);


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>SELECCIÓN DE COLORES</h1>
        <p>Selecciona un color de texto: </p>
        <form action="" method="POST">
            <input type="radio" name="opt" value="red" />Rojo
            <input type="radio" name="opt" value="blue" />Azul
            <input type="radio" name="opt" value="green" />Verde
            <input type="radio" name="opt" value="" />Ninguno
            <input type="submit" name="cambiar" value="Cambiar" />
        </form>
        <a href="comprobacion.php">Ir a otra página para comprobar cookie</a>
        <?php
        // put your code here
        ?>
    </body>
</html>
