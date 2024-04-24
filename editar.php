<?php
session_start(); 

if (!isset($_SESSION['nombre'])) {
  header('Location: login.php');
  exit(); 
}

include_once 'conexion.php'; 

if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit(); 
}

$id = $_GET['id'];

$sql = $conexion->prepare("SELECT * FROM contacto WHERE id_contacto = ?");
$sql->execute([$id]);
$persona = $sql->fetch(PDO::FETCH_OBJ);

if (!$persona) {
  header('Location: index.php');
  exit(); 
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar contacto</title>
  <meta charset="utf-8">
</head>
<body>
  <center>
    <h1>Editar contacto:</h1>
    <form method="post" action="editarProceso.php">
      <table>
        <tr>
          <td>Nombre:</td>
          <td><input type="text" name="txt2nombre" value="<?php echo $persona->nombre; ?>"></td>
        </tr>
        <tr>
          <td>Edad:</td>
          <td><input type="text" name="txt2edad" value="<?php echo $persona->edad; ?>"></td>
        </tr>
        <tr>
          <td>Teléfono:</td>
          <td><input type="text" name="txt2telefono" value="<?php echo $persona->telefono; ?>"></td>
        </tr>
        <tr>
          <td>Correo:</td>
          <td><input type="email" name="txt2correo" value="<?php echo $persona->correo; ?>"></td>
        </tr>
        <input type="hidden" name="id2" value="<?php echo $persona->id_contacto; ?>">
        <tr>
          <td colspan="2"><input type="submit" value="Editar contacto"></td>
        </tr>
      </table>
    </form>
  </center>
</body>
</html>
