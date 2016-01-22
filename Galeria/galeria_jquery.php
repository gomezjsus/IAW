<!DOCTYPE html>
<?php    
    include 'variables.php';
    include 'funciones.php';    
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="lightbox2-master/dist/css/lightbox.css" rel="stylesheet">
    </head>
    <body>
        <a href="crear.php">Crear nuevo album</a><br/><br/><br/>
        <a href="subir.php">Subir imagenes</a><br/><br/><br/>
        <a href="galeria_jquery.php">Galeria JQuery</a><br/><br/><br/>
        <hr>
        <form action="" method="POST" >
        <p>Albums:&nbsp; 
            <select name="carpeta">
                <?php
                // Listo los directorios de la carpeta galeria
                $albums=scandir($dir);
                foreach ($albums as $carpeta)
                    if ( ($carpeta!=".") && ($carpeta!="..") )
                        if ($_POST['carpeta'] == $carpeta)
                            echo '<option value="'.$carpeta.'" selected="selected">'.$carpeta."</option>";
                        else
                            echo '<option value="'.$carpeta.'">'.$carpeta."</option>";
                ?>
            </select>
        </p>
        <input type="submit" name="enviar" value="Ver album" />
        </form>
        <br/>              
        <hr>
        <?php
        if (isset($_POST['carpeta'])){
                $folder=$_POST['carpeta'];
                $rutaimgs=$dir.$folder;
                $rutaimgsmini=$dir.$folder."/mini";
                $imgsmini=scandir($rutaimgs);
                $imgs=scandir($rutaimgsmini);
                //print_r($imgs);
                foreach ($imgsmini as $imagenes){                                    
                    if ( ($imagenes!=".") && ($imagenes!="..") ){
                        $info=pathinfo ($imagenes);
                        //print_r($info);
                        echo "<a href='".$rutaimgs."/".$imagenes."' data-lightbox='".$folder."'><img src=".$rutaimgsmini."/".$imagenes." ></a>";                        
                    }
                }
                
                /*
                echo "<div id='contenido_galeria'>";
                
                # Bucle antiguo
                 * foreach ($imgsmini as $imagenes){                                    
                    if ( ($imagenes!=".") && ($imagenes!="..") ){
                        $info=pathinfo ($imagenes);
                        //print_r($info);
                        echo "<div id='.$imagenes.'>";
                        echo "<img src=".$rutaimgs."/".$imagenes." >";
                        echo "</div>";
                    }
                }
                
                
                echo "</div>";
                echo "<hr>";
                echo "<div class='jMyCarousel'>";
                echo "<ul>";
                foreach ($imgsmini as $imagenes){                                    
                    if ( ($imagenes!=".") && ($imagenes!="..") ){
                        $info=pathinfo ($imagenes);
                        //print_r($info);
                        echo "<li><a href='#".$imagenes."'><img src=".$rutaimgsmini."/".$imagenes." ></a></li>";                        
                    }
                }
                echo "</ul>";
                echo "</div>"; 
                 * 
                 */
        }
       
        ?>
        <hr>
        <script type='text/javascript' src="lightbox2-master/dist/js/lightbox-plus-jquery.js">
        
        </script>       
        
        <!--
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js?ver=1.4.4'></script>
        <script type="text/javascript" src="js/jMyCarousel.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
            $(".jMyCarousel").jMyCarousel({ // Script de los Thumbnails
                visible: '100%',
                eltByElt: true
            });
            $(".jMyCarousel img").fadeTo(100, 0.6);
            $(".jMyCarousel a img").hover(
            function(){ //mouse over
                $(this).fadeTo(400, 1);
            },
            function(){ //mouse out
                $(this).fadeTo(400, 0.6);
            });
            });
        </script>
        -->
<hr>

<!-- 
###OTRO JQUERY###
<script type="text/javascript">
  $(document).ready(function(){ // Script de la Galeria
    $('#contenido_galeria div').css('position', 'absolute').not(':first').hide();
    $('#contenido_galeria div:first').addClass('aqui');
    $('.jMyCarousel a').click(function(){
        $('#contenido_galeria div.aqui').fadeOut(400);
        $('#contenido_galeria div').removeClass('aqui').filter(this.hash).fadeIn(400).addClass('aqui');
        return false;
    });
});
</script> 
-->
    </body>
</html>

