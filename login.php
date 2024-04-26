<?php
session_start();
if (isset($_SESSION['nombre'])) {
    header('Location: index.php');
    exit(); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesion</title>
    <meta charset="utf-8">
</head>
<body>
    <center>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']); 
        }
        ?>
        <form method="post" action="loginproceso.php">
            <label>Usuario:</label>
            <input type="text" name="txtusu">
            <br>
            <label>Contraseña:</label>
            <input type="password" name="txtpass">
            <br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <br>
        <p>¿No tienes una cuenta? <a href="registro.php">Registrate aquí</a></p>
    </center>
</body>
</html>