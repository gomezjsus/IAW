<!DOCTYPE html>
<?php
if (!isset($_COOKIE['contador']))
    setcookie('contador','1',time()+3600);
else
    setcookie('contador',$_COOKIE['contador']+1,time()+3600);

if (isset($_POST['aceptar']))
    setcookie('color',$_POST['opt'],time()+3600);


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body bgcolor="<?=isset($_POST['opt']) ? $_POST['opt'] : $_COOKIE['color'] ?>">
        <?php
        if (isset($_COOKIE['contador']))
            echo "<p>CONTADOR: ".$_COOKIE['contador']."</p>"
        ?>
        <form action="" method="POST">
<!--            <select name="opt">
                <option value="red">Rojo</option>
                <option value="blue">Azul</option>
                <option value="yellow">Amarillo</option>
            </select>-->
            COLOR DE FONDO:
            <input type="text" name="opt" />
            <input type="submit" name="aceptar" value="Cambiar" />
        </form>
    </body>
</html>
