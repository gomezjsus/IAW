<?php
$error=0;
include 'funciones.php';
if ( isset($_POST['newalumnos']) ) {
    $alumnos=  unserialize(urldecode($_POST['newalumnos']));
}else {
    include 'variables.php';
}


if (isset($_POST["alta"])) {
    if (isset($alumnos[$_POST['expediente']]) || empty($_POST['expediente']) || empty($_POST['nombre']) || empty($_POST['edad']) || empty($_POST['dni']) || empty($_POST['notamedia']) ) {                          
        $error=1;
    } //SI NO HAY ERRRORES; AUMENTO EL ARRAY.
    else{
        $alumnos[$_POST['expediente']]=array(
            "nombre"=>$_POST['nombre'],
            "edad"=>$_POST['edad'],
            "dni"=>$_POST['dni'],
            "notamedia"=>$_POST['notamedia']
        );                
    }
}
$newalumnos=urlencode(serialize($alumnos));
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?= $error==1 ? "<span style='color:red'> Expediente ya existe, o valores vacios</span>" : ""?>
        <form action="" method="POST">              
            <table>
                <tr><td>Expediente:</td><td><input type="text" name="expediente" value="<?= isset($_POST['expediente']) ? $_POST['expediente'] : "" ?>" /></td></tr>
                <tr><td>Nombre:</td><td><input type="text" name="nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : "" ?>" /></td></tr>
                <tr><td>Edad:</td><td><input type="text" name="edad" value="<?= isset($_POST['edad']) ? $_POST['edad'] : "" ?>" /></td></tr>
                <tr><td>DNI:</td><td><input type="text" name="dni" value="<?= isset($_POST['dni']) ? $_POST['dni'] : "" ?>" /></td></tr>
                <tr><td>Nota Media:</td><td><input type="text" name="notamedia" value="<?= isset($_POST['notamedia']) ? $_POST['notamedia'] : "" ?>" /></td></tr>
            </table>
            <input type="hidden" name="newalumnos" value="<?= $newalumnos ?>" />
            <input type="submit" name="alta" value="Alta" />          
        </form>
        <form action="index.php" method="POST">
            <input type="hidden" name="newalumnos" value="<?= $newalumnos ?>" />
            <input type="submit" name="volver"  value="Volver" />
        </form>
        <?php        
         listar_alumnos($alumnos);
        ?>
        
        
    </body>
</html>