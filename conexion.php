<?php
# Conexion la base de datos utilizando PDO
$nombredb = 'mysql:host=localhost;dbname=bd_contactos';
$usuario = 'root';
$password = '';

try {
    $conexion = new PDO($nombredb, $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
} catch (PDOException $e) {
    echo 'Error de conexion: ' . $e->getMessage();
    die();
}