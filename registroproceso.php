<?php
session_start();

include_once 'conexion.php';

$usuario = $_POST['txtusu'];
$password = $_POST['txtpass'];


$sql = $conexion->prepare('INSERT INTO usuario (username, password) VALUES (?, ?)');
$sql->execute([$usuario, $password]);


$_SESSION['nombre'] = $usuario;

header('Location: index.php');

