quita espacios antes y despues del texto
trim($var);

Filtra las variables.
filter_var($var, FILTER_VARIABLE_INT);

Mejor utilizar variables a $_POST, pero filtradas. Con esto quitamos posible sql injection, .xls
o lo que sea.
$aceptar=filter_input(INPUT_POST,$_POST['aceptar']);

isnumeric
<?=isset($errnombre) ? $errnombre : "" ?>

Si un valor esta definido lo ponemos, asi no se borran datos del formulario.
<input type="text" value='<?=isset($errnombre) ? $errnombre : "" ?>' />

if todo correcto{ //Al principio de la web nos permite redireccionar.

    header('location:pagin2.php');
}


timestamp();
$_FILE['imagen']['name']

is_uploaded_file();
move_uploaded_file(x,y);