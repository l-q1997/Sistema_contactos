<?php
// print_r($_POST);

session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: login.php');
    exit(); 
}

include_once 'conexion.php';

if (isset($_POST['oculto'])) {
    $nombre = $_POST['txtnombre'];
    $edad = $_POST['txtedad'];
    $telefono = $_POST['txttelefono'];
    $correo = $_POST['txtcorreo'];
    $usuario_id = $_SESSION['id_usuario']; 

    $sql = "INSERT INTO contacto (nombre, edad, telefono, correo, usuario_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $resultado = $stmt->execute([$nombre, $edad, $telefono, $correo, $usuario_id]);

    if ($resultado == true) {
        // echo "insertado correctamente";
        header('Location: index.php');
    } else {
        echo "sucediÃ³ un error";
    }
}