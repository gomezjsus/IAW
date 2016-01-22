<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // 1.Escribir un programa en PHP que imprima por pantalla
        // los cuadrados de los 30 primeros números naturales. 
        for ($i=1;$i<31;$i++) {
            echo "Cuadrado de ".$i.": ".($i*$i)."<br/>";
        }
       
        // 2.Modifica el ejercicio anterior para que muestre al lado de cada 
        // cuadrado si es un número par o impar. 
        for ($i=1;$i<31;$i++) {
            if (($i*$i)%2==0){
                echo "Cuadrado de ".$i.": ".($i*$i)." es PAR<br/>";
            }
            else{
                echo "Cuadrado de ".$i.": ".($i*$i)." es IMPAR<br/>";
            }
        }
        
        // 3.Escribir un programa en PHP que multiplique los 20 primeros 
        // números naturales (1*2*3*4*5...).
        $x=1;
        for ($i=1;$i<21;$i++) {
            $x=($x*$i);
            echo $i." x ";
        }
        echo " = ".$x."<br/>";
        // 4. Escribir un programa en PHP que sume los cuadrados de los cien 
        // primeros números naturales, mostrando el resultado en pantalla. 
        $total=0;
        for ($i=1;$i<101;$i++) {
            $cuadrado=($i*$i);
            $total=($total + $cuadrado);
            echo $total." + ";
        }        
        echo "<br/>El total es ".$total."<br/>";
        // 5. ¿Cuántas veces se ejecutaría el cuerpo de los siguientes bucles for? 
        // for ($i=1; $i<10; $i++) ... 
        $contador=1;
        for ($i=1; $i<10; $i++) {
            echo $contador." - ";
            $contador++;
        }
        echo "<br/>";
        // for ($i=30; $i>1; $i-=2) ...
        $contador=1;
        for ($i=30; $i>1; $i-=2) {
            echo $contador." - ";
            $contador++;
        }
        echo "<br/>"; 
        // for ($i=30; $i<1; $i+=2) ...
        // BUCLE INFINITO. Porque si a 30 le vamos sumando siempre dos, nunca será menor que 1.

        // for ($i=0; $i<30; $i+=4) ... 
        $contador=1;
        for ($i=0; $i<30; $i+=4) {
            echo $contador." - ";
            $contador++;
        }
        echo "<br/>"; 
        // Comprueba tus respuestas realizando un programa que lo demuestre.
        
        //--------------------------------------
        // 6. Ejecuta paso a paso el siguiente bucle e indica el valor final de “a” y el de “c”:
        // c = 5;
        // for (a=1; a<5; a++)
        // c = c – 1;
        // Comprueba tu respuesta realizando un programa que lo demuestre.
        $c=5;        
        for ($a=1;$a<5;$a++){
            $c=$c-1;
        }
        echo "<br/> a vale: ".$a;
        echo "<br/> c vale: ".$c;
        
        // 7. Implementa un programa a partir de una variable con un valor
        // decimal (por ejemplo $num=852) lo muestre en pantalla en
        // hexadecimal (base 16). El cambio de base se realiza mediante
        // divisiones sucesivas por 16 en las cuales los restos determinan los
        // dígitos hexadecimales del número según la siguiente
        // correspondencia:
        // AYUDA: Para formar el número hexadecimal deberemos ir concatenando los
        // distintos restos hasta llegar al último y en ese momento concatenar también el
        // cociente
        $num=65029;
        $digito=($num%16);
        switch ($digito){
            case "10":
                $digito="A";
                break;
            case "11":
                $digito="B";
                break;
            case "12":
                $digito="C";
                break;
            case "13":
                $digito="D";
                break;
            case "14":
                $digito="E";
                break;
            case "15":
                $digito="F";
                break;
            default:
                $digito=$resto;
        }

        
        
        
        // CASO 7
        $num=65029;
        $hexadecimal="";
        for (;;){
          
            $resto=$numero%16;
            //integer $cociente=numero/16;
            $c=(int)($numero/16); //Fuerzo a que el numero sea entero. Hacer CASTING.
            if ($cociente<16){ //Hasta que el cociente no sea menor que 16, sigue dividiendo.
                break;
            }
            // Lo pongo en orden inverso. Dejo cada nuevo valor delanta o detras el valor anterior.
            $hexadecimal="".$resto.$hexadecimal; //pongo las comillas para que lo interprete como texto.
            $numero=$cociente;
        }
        function letra($x){
            if($x<10)
                return $x;
        }
        ?>
        
        <?php 
        if (isset($num)) {
            echo "$num";
        }
        else {
            echo "0";
        }
        
        //RESUMIDO - If la variable $num esta creada, por su valor, sino pon 0.
        echo isset($num) ? $num : "0";
        ?>
        // Más resumido. El <?= equivale a php + echo
        <?=isset($num) ? $num : "0"; ?>
        
        <?php //Si le pasamos al formulario la variable calcular(del boton submit) haz algo
            if (isset($_POST['calcular'])){
                // si NO es numerico el valor num del GET.
                if (!is_numeric($_GET['num'])) {     
                    $error=" Dato no numerico.";
                    echo $error;
                }
                else{ //Muestra el valor num y llama a la funcion para calcular el hexadecimal.
                    echo $_GET['num']." = ". hexadecimal($num);
                }
            }
        ?>
    </body>
</html>
