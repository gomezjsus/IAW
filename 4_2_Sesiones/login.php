
<form method="POST" action="">
    <table>
        <tr>
            <td>Usuario:</td> 
            <td><input type="text" name="login" /></td>
            <td><?=isset($_SESSION['error']) ? $_SESSION['error'] : ''?></td>
        </tr>
        <tr>
            <td>Password:</td> 
            <td><input type="password" name="passw" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="checkbox" checked="checked" name="recordar" />Recordarme</td>
        </tr>
        <tr><td></td>
            <td><input type="submit" name="acceder" value="Acceder" /></td>
        </tr>
    </table>
</form>

