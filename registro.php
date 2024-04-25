<?php
session_start();
if (isset($_SESSION['nombre'])) {
    header('Location: index.php');
    exit(); 
}

include_once 'conexion.php';

if (isset($_POST['txtusu']) && isset($_POST['txtpass'])) {
    $usuario = $_POST['txtusu'];
    $password = $_POST['txtpass'];

    // Validar usuario si ya existe en la base de datos
    $consulta = $conexion->prepare('SELECT COUNT(*) AS existe FROM usuario WHERE username = ?');
    $consulta->execute([$usuario]);
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($resultado['existe'] > 0) {
        $_SESSION['error'] = 'El nombre de usuario ya está en uso. Por favor, elige otro.';
        header('Location: registro.php');
        exit(); 
    }

    // Insertar si el usuario es único
    $insertar = $conexion->prepare('INSERT INTO usuario (username, password) VALUES (?, ?)');
    $resultado = $insertar->execute([$usuario, $password]);

    if ($resultado) {
        $_SESSION['nombre'] = $usuario;
        header('Location: index.php');
        exit(); 
    } else {
        $_SESSION['error'] = 'Error al registrar el usuario. Inténtalo de nuevo.';
        header('Location: registro.php');
        exit(); 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de usuario</title>
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
        <form method="post" action="registro.php">
            <label>Usuario:</label>
            <input type="text" name="txtusu">
            <br>
            <label>Contraseña:</label>
            <input type="password" name="txtpass">
            <br>
            <input type="submit" value="Registrar">
        </form>
        <br>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </center>
</body>
</html>