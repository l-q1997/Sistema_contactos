<?php
// print_r($_POST);

if (!isset($_POST['oculto'])) {
    exit();
  // No hay nada que hacer aquí?
}

include_once("conexion.php");

$nombre = $_POST['txtnombre'];
$edad = $_POST['txtedad'];
$telefono = $_POST['txttelefono'];
$correo = $_POST['txtcorreo'];

$sql = "INSERT INTO contacto (nombre, edad, telefono, correo) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$resultado = $stmt->execute([$nombre, $edad, $telefono, $correo]);

if ($resultado == true) {
  // echo "insertado correctamente";
  header('Location: index.php');
} else {
  echo "sucedió un error";
}