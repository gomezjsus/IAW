<?php
function listar_alumnos($alumnos,$id=0){
    if ($id==0) {
        foreach ($alumnos as $exp=>$alu) {
           echo "<b>Expediente:</b> ".$exp."<br/>";
           echo "<b>DNI:</b> ".$alu['dni']."<br/>";
           echo "<b>Nombre:</b> ".$alu['nombre']."<br/>";
           echo "<b>Edad:</b> ".$alu['edad']."<br/>";
           echo "<b>Nota Media:</b> ".$alu['notamedia']."<br/>";
           echo "<br/>";
        }
    }
    else{
       echo "<b>Expediente:</b> ".$id."<br/>";
       echo "<b>DNI:</b> ".$alumnos["$id"]['dni']."<br/>";
       echo "<b>Nombre:</b> ".$alumnos["$id"]['nombre']."<br/>";
       echo "<b>Edad:</b> ".$alumnos["$id"]['edad']."<br/>";
       echo "<b>Nota Media:</b> ".$alumnos["$id"]['notamedia']."<br/>";
       echo "<br/>";
    }
}

function desplegar_alumnos($alumnos,$select=0){
    echo "<select name='alu'>";
    foreach ($alumnos as $exp=>$alu) {           
           echo "<option value=".$exp.">".$alu['nombre']."</option>";           
    }
    echo "</select>";
}

function notamedia($alumnos){
    $total=0;
    $cont=0;
    foreach ($alumnos as $exp=>$alu) {           
           $total=$total+$alu['notamedia'];
           $cont++;
    }
    $result=$total/$cont;
    echo "La nota media de la clase es: ".$result;
}

function edadmayor($alumnos){
    include 'variables.php';  
    $mayor=0;
    foreach ($alumnos as $exp=>$alu) {           
           if ($alu['edad']>= $mayor) {
                $mayor=$alu['edad'];
           }
    }
    echo "El alumno con mayor edad tiene: ".$mayor;
}


?>