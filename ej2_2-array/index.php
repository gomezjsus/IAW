<?php
include 'funciones.php';
//$newalumnos=urlencode(serialize($alumnos));
if ( isset($_POST['newalumnos']) && !empty($_POST['newalumnos']) ){
    echo "NUEVO ALUMNOS";
    $alumnos=  unserialize(urldecode($_POST['newalumnos']));
    
}
else {
    include 'variables.php';
}
$newalumnos=$alumnos;

//$newalumnos=  urldecode(serialize($tmp_alumnos));


?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!--DESPLIEGUE DEL MENU-->
        <form action="" method="POST">
            <select name="menu">
                <option value="1" <?=( isset($_POST['menu']) && $_POST['menu']==1 ) ? 'selected' : "" ?>>1.- Consulta de expediente</option>
                <option value="2" <?=( isset($_POST['menu']) && $_POST['menu']==2 ) ? 'selected' : "" ?>>2.- Nota media del instituto.</option>
                <option value="3" <?=( isset($_POST['menu']) && $_POST['menu']==3 ) ? 'selected' : "" ?>>3.- Edad del alumno mayor</option>
                <option value="4" <?=( isset($_POST['menu']) && $_POST['menu']==4 ) ? 'selected' : "" ?>>4.- Listado de todos los datos de los alumnos.</option>
                <option value="alta" <?=( isset($_POST['menu']) && $_POST['menu']==5 ) ? 'selected' : "" ?>>5.- Dar de alta un alumno</option>
                <option value="baja" <?=( isset($_POST['menu']) && $_POST['menu']==6 ) ? 'selected' : "" ?>>6.- Dar de baja un alumno</option>
                <option value="modificar" <?=( isset($_POST['menu']) && $_POST['menu']==7 ) ? 'selected' : "" ?>>7.- Modificar los datos de un alumno.</option>
            </select>
            <input type="hidden" name="newalumnos" value="<?= isset($newalumnos) ? $newalumnos : "" ?>" />           
            <input type="submit" name="aceptar" value="Aceptar">
        </form>
        <hr>
          
        <?php
//        Si he seleccionado el menu, cojo una opcion
        if ( isset($_POST['aceptar']) && isset($_POST['menu']) ) {
//            
//            OPCION 1 - Consultar expedientes
            if ($_POST['menu']=='1'){
                ?>                
                <form action="" method="POST">              
                    <?php desplegar_alumnos($alumnos); ?>
                    <input type="hidden" name="newalumnos" value="<?=isset($newalumnos) ? $newalumnos : "" ?>" />
                    <input type="submit" name="consultar" value="Consultar">          
                </form>
                <hr>
                <?php                
            }
//            OPCION 2 - Sacar nota media
            if ($_POST['menu']=='2'){                               
                notamedia($alumnos);                               
            }
//            OPCION 3 - Sacar la edad mayor
            if ($_POST['menu']=='3'){                               
                edadmayor($alumnos);                               
            }
//            OPCION 4 - Listar todos los expedientes
            if ($_POST['menu']=='4'){                               
                listar_alumnos($alumnos);                               
            }
            if ($_POST['menu']=='alta' || $_POST['menu']=='baja' || $_POST['menu']=='modificar') {
                $llamada="Location: ".$_POST['menu'].".php?newalumnos=".$newalumnos;
                header($llamada);
            }

            if ($_POST['menu']=='5'){                               
                ?>                
<!--                <form action="" method="POST">              
                    <table>
                        <tr><td>Expediente:</td><td><input type="text" name="expediente" /></td></tr>
                        <tr><td>Nombre:</td><td><input type="text" name="nombre" /></td></tr>
                        <tr><td>Edad:</td><td><input type="text" name="edad" /></td></tr>
                        <tr><td>DNI:</td><td><input type="text" name="dni" /></td></tr>
                        <tr><td>Nota Media:</td><td><input type="text" name="notamedia" /></td></tr>
                    </table>
                    <input type="hidden" name="newalumnos" value="<?=!empty($newalumnos) ? $newalumnos : "" ?>" />
                    <input type="submit" name="alta" value="Alta" />          
                </form>
                <hr>-->
                <?php
            }
            if ($_POST['menu']=='6'){
                // header("Location: 5.php");
                unset($alumnos[$_POST['Expediente']]);
                ?>                
                <form action="" method="POST">                                  
                    <input type="submit" name="alta" value="Alta">          
                </form>
                <hr>
                <?php 
                $newalumnos=  urlencode(serialize($tmp_alumnos));
                
            }

        }
        
//        SI ELIJO OPCION 1: SACO UN LISTADO DE ALUMNOS Y MUESTRO EL ELEGIDO.
        if (isset($_POST["consultar"])) {
            ?>
            <form action="" method="POST">              
                <?php desplegar_alumnos($alumnos); ?>
                <input type="hidden" name="newalumnos" value="<?=isset($newalumnos) ? $newalumnos : "" ?>" />
                <input type="submit" name="consultar" value="Consultar">          
            </form>
            <hr>
            <?php
            listar_alumnos($alumnos,$_POST['alu']);
        }
        
        
//        SI ELIJO OPCION 5: CREO EL NUEVO ARRAY.
        if (isset($_POST["alta"])) {
            // UTILIZO EMPTY PORQUE EL ISSET SIEMPRE LO COGE
            if ( empty($_POST['expediente']) || empty($_POST['nombre']) || empty($_POST['edad']) || empty($_POST['dni']) || empty($_POST['notamedia']) ) {            
            ?>                                
                <form action="" method="POST">              
                    <table>
                        <tr><td>Expediente:</td><td><input type="text" name="expediente" value="<?= isset($_POST['expediente']) ? $_POST['expediente'] : "" ?>" /></td></tr>
                        <tr><td>Nombre:</td><td><input type="text" name="nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : "" ?>" /></td></tr>
                        <tr><td>Edad:</td><td><input type="text" name="edad" value="<?= isset($_POST['edad']) ? $_POST['edad'] : "" ?>" /></td></tr>
                        <tr><td>DNI:</td><td><input type="text" name="dni" value="<?= isset($_POST['dni']) ? $_POST['dni'] : "" ?>" /></td></tr>
                        <tr><td>Nota Media:</td><td><input type="text" name="notamedia" value="<?= isset($_POST['notamedia']) ? $_POST['notamedia'] : "" ?>" /></td></tr>
                    </table>
                    <input type="hidden" name="newalumnos" value="<?=$newalumnos?>" />
                    <input type="submit" name="alta" value="Alta" />          
                </form>
                <hr>
            <?php            
            } //SI NO HAY ERRRORES; AUMENTO EL ARRAY.
            else{
                echo "Alumno dado de alta.";
                $alumnos["$_POST[expediente]"]=array(
                    "nombre"=>"$_POST[nombre]",
                    "edad"=>"$_POST[edad]",
                    "dni"=>"$_POST[dni]",
                    "notamedia"=>"$_POST[notamedia]"
                );
                $newalumnos=urlencode(serialize($alumnos));
                echo $newalumnos;
            }
                    
        }
        ?>
    </body>
</html>
