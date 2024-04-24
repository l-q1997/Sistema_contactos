<?php
if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit(); 
}

$id_contacto = $_GET['id'];


if (isset($_POST['confirmar'])) {

  if ($_POST['confirmar'] == 'si') {
   
    include 'conexion.php';

    
    $sql = $conexion->prepare("DELETE FROM contacto WHERE id_contacto = ?");
   
    $resultado = $sql->execute([$id_contacto]);

    
    if ($resultado) {
      
      echo "Contacto eliminado con éxito.";
      
      header('refresh:3;url=index.php');
      exit(); 
    } else {
      echo "Error al eliminar el contacto"; 
    }
  } else {
    echo "Se ha cancelado la eliminación del contacto."; 
    header('Location: index.php');
    exit(); 
  }
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Confirmar eliminación</title>
  <meta charset="utf-8">
</head>
<body>
  <center>
    <h1>Confirmar eliminación</h1>
    <p>¿Está seguro de que desea eliminar este contacto?</p>
    <form method="post">
      <input type="hidden" name="confirmar" value="si">
      <button type="submit">Sí</button>
    </form>
    <form method="post" action="index.php"> 
      <input type="hidden" name="confirmar" value="no">
      <button type="submit">No</button>
    </form>
  </center>
</body>
</html>
