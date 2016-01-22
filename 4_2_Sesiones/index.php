<?php
session_start();
$usuarios=array('jesus'=> 'passjesus', 'francis'=>'passfrancis');
if (isset($_POST['entrar'])) $_SESSION['login']=$_COOKIE['login'];
if (isset($_POST['salir'])){
    borrarCookies();
    header('Location: index.php');
}

function borrarCookies(){
    setcookie('login','',time()-1);
    setcookie('pass','', time()-1);
    setcookie('fecha','', time()-1);  
}

if (isset($_POST['acceder'])){
    if ( isset($usuarios[$_POST['login']]) && $usuarios[$_POST['login']]==$_POST['passw'] ){
        $_SESSION['login']=$_POST['login'];
        if (isset($_POST['recordar'])){
            setcookie('login', $_POST['login'], time()+60);
            setcookie('pass', hash('md5', $_POST['passw']), time()+60);
            setcookie('fecha', date('d')." de ".date('F')." de ".date('Y')." a las ".date('H:i'), time()+60);        
        }
    }
    else $_SESSION['error']='Usuario o contraseña incorrecto';    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>       
        <?php
        if ( isset($_SESSION['login']) ){
            echo "<a href='logout.php'>Cerrar Sesión</a><br><br>";
            echo "Hola, ".$_SESSION['login']."<br>";
            echo "Estás dentro de tu espacio personal.";          
        }
        else{ 
            if ( isset($_COOKIE['login']) ){
                if ( isset($usuarios[$_COOKIE['login']]) && hash('md5',$usuarios[$_COOKIE['login']])==$_COOKIE['pass'] ){                                       
                    echo "Hola, ".$_COOKIE['login']."<br>";                              
                    if (isset($_COOKIE['fecha'])) echo "Tu última sesión fue el ".$_COOKIE['fecha']."<br>";                    
                    ?>
                    <form method="POST" action="" >
                        <input type="submit" name="entrar" value="Acceder" />
                        <input type="submit" name="salir" value="Salir" />
                    </form>
                    <?php
                }
                else include 'login.php';
            }
            else include 'login.php';              
            
        }
        ?>
    </body>
</html>
