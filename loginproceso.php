<?php
session_start();

include_once 'conexion.php';

$usuario = $_POST['txtusu'];
$password = $_POST['txtpass'];

$consulta = $conexion->prepare('SELECT * FROM usuario WHERE username = ? AND password = ?');
$consulta->execute([$usuario, $password]);
$datos = $consulta->fetch(PDO::FETCH_OBJ);

if ($datos === false) {
    
    $_SESSION['error'] = 'Usuario o contraseña incorrectos';
    header('Location: login.php');
    exit(); 
} elseif ($consulta->rowCount() == 1) {
    $_SESSION['nombre'] = $datos->username;
    $_SESSION['id_usuario'] = $datos->id_usuario; 
    header('Location: index.php');
    exit(); 
}
