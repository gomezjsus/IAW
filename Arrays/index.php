<?php
    $familia['Simpson']=array(
        "Padre"=>'Homer', 
        "Madre"=>'Marge', 
        "Hijo1"=>'Bart', 
        "Hijo2"=>'Lisa', 
        "Hijo3"=>'Maggie'
        );
    $familia['Griffin']=array(
        "Padre"=>'Peter', 
        "Madre"=>'Lois', 
        "Hijo1"=>'Steve', 
        "Hijo2"=>'Meg', 
        "Hijo3"=>'Stewie'
        );
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
        ?>
        <ul>
            <?php
//            echo "<ul>";
//            echo "<li><b>SIMPSON</b></li>";
//            foreach ($familia['Simpson'] as $n=>$x){
//                echo "<li>$n: $x</li>";
//            }
//            echo "</ul>";
//            echo "<br/><br/><br/>";
//            echo "<ul>";
//            echo "<li><b>GRIFFIN</b></li>";
//            foreach ($familia['Griffin'] as $n=>$x){
//                echo "<li>$n: $x</li>";
//            }
//            echo "</ul>";
            ?>
            <?php
            
            foreach ($familia as $fam=>$valor){
                echo "<b>Familia $fam</b>";
                echo "<br/>";
                echo "<ul>";
                foreach ($valor as $relacion=>$nombre){
                    echo "<li>$relacion: $nombre</li>";
                }                
                echo "</ul>";
                echo "<br/><br/>";
            }
                        
            ?>

            
        </ul>
        
    </body>
</html>
