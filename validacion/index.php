<?php
    function filtradoVAR($x){
            $x=filter_var($x, FILTER_SANITIZE_SPECIAL_CHARS);
            return $x;
    }
    function filtradoVACIO($x){
        if (trim($x) == ''){
            return false;
        }else{
            return true;
        }

    }
    if ( isset($_POST['validar']) ){
        $nom=filtradoVAR($_POST['nom']);
        $ape=filtradoVAR($_POST['ape']);
        $cur=filtradoVAR($_POST['curso']);
        $tit=filtradoVAR($_POST['titulacion']);
        if (!filtradoVACIO($nom)){
            $errnom="Nombre vacío";
        }
        if (trim($ape=="")){
            $errape="Apellido vacío";
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
        if (isset($errnom) || isset($errape) || !isset($_POST['validar'])){
        ?>    
            <form action="" method="post">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nom" value="<?=isset($nom) ? $nom : "" ?>" /><?=isset($errnom) ? $errnom : "" ?></td>
                </tr>
                <tr>
                    <td>Apellidos:</td>
                    <td><input type="text" name="ape" value="<?=isset($ape) ? $ape : "" ?>" /><?=isset($errape) ? $errape : "" ?></td>
                </tr>
                <tr>
                    <td>Curso:</td>
                    <td>
                        <input type="radio" name="curso" value="primero" <?=(isset($cur) && $cur=="primero") ? 'checked="checked"' : 'checked="checked"' ?> />Primero
                        <input type="radio" name="curso" value="segundo" <?=(isset($cur) && $cur=="segundo") ? 'checked="checked"' : '' ?> />Segundo
                    </td>
                </tr>
                <tr>
                    <td>Titulación:</td>
                    <td>
                        <select name="titulacion">
                            <option value="asir" <?=(isset($tit) && $tit=="asir") ? 'selected="selected"' : 'selected="selected"' ?> >Técnico Superior en ASIR</option>
                            <option value="dam" <?=(isset($tit) && $tit=="dam") ? 'selected="selected"' : '' ?> >Técnico Superiror en DAM</option>
                        </select>
                        <?=isset($errtit) ? $errtit : "" ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="validar" value="Enviar" />
                        <input type="reset" name="borrar" value="Borrar Datos" />
                    </td>
                </tr>

            </table>
            </form>
        <?php
        }else {
        ?>
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><?=$nom?></td>
                </tr>
                <tr>
                    <td>Apellidos:</td>
                    <td><?=$ape?></td>
                </tr>
                <tr>
                    <td>Curso:</td>
                    <td><?=$cur?></td>
                </tr>
                <tr>
                    <td>Titulación:</td>
                    <td><?=$tit?></td>
                </tr>
            </table>
        <?php    
        }       
        ?>
    </body>
</html>
