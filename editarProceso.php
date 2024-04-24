<?php
if (!isset($_POST['id2'])) {
  header('Location: index.php');
  exit(); 
}

include_once 'conexion.php';

$id2 = $_POST['id2'];
$nombre2 = $_POST['txt2nombre'];
$edad2 = $_POST['txt2edad'];
$telefono2 = $_POST['txt2telefono'];
$correo2 = $_POST['txt2correo'];

$sql = $conexion->prepare("UPDATE contacto 
                          SET nombre = ?, edad = ?, telefono = ?, correo = ? 
                          WHERE id_contacto = ?");

$resultado = $sql->execute([$nombre2, $edad2, $telefono2, $correo2, $id2]);

if ($resultado) {
  
  echo "Su contacto ha sido editado con éxito.";
  
  header('refresh:3;url=index.php');
  exit(); 
} else {
  echo "Error al editar el contacto";
}

