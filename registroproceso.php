<?php
session_start();

include_once 'conexion.php';

$usuario = $_POST['txtusu'];
$password = $_POST['txtpass'];

// Insertar nuevo usuario en la base de datos
$sql = $conexion->prepare('INSERT INTO usuario (username, password) VALUES (?, ?)');
$resultado = $sql->execute([$usuario, $password]);

if ($resultado) {
    // Obtener el ID del usuario insertado
    $id_usuario = $conexion->lastInsertId();

    // Guardar el ID del usuario en la sesión
    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['nombre'] = $usuario;

    header('Location: index.php');
    exit(); 
} else {
    $_SESSION['error'] = 'Error al registrar el usuario. Inténtalo de nuevo.';
    header('Location: registro.php');
    exit(); 
}