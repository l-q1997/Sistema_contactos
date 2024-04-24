<?php
# conexion a base de datos 
include_once ("conexion.php");

session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: login.php');
    exit(); 
}

$sql = "SELECT * FROM contacto";
$stmt = $conexion->query($sql);
$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lista de contactos</title>
    <meta charset="UTF-8">
</head>

<body>
    <center>
        <h1>Bienvenido: <?php echo $_SESSION['nombre']?></h1>
        <a href="cerrar.php">Cerrar sesión</a>
        <h3>Lista de contactos</h3>
        <table>
            <tr>
                <th>Nombre</th>
                <th>edad</th>
                <th>telefono</th>
                <th>Correo</th>
                <th>Editar</th>
                <th>Eliminar</th>

    
            </tr>

            <?php 
            foreach ($contactos as $contacto): 
                ?>
                
                <tr>    
                    <th><?php echo $contacto["nombre"]; ?></th>
                    <th><?php echo $contacto["edad"]; ?></th>
                    <th><?php echo $contacto["telefono"]; ?></th>
                    <th><?php echo $contacto["correo"];?></th>
                    <td><a href="editar.php?id=<?php echo $contacto['id_contacto'];?>">Editar</a></td>
                    <td><a href="eliminar.php?id=<?php echo $contacto['id_contacto'];?>">Eliminar</a></td>



            </tr>
            <?php endforeach; ?>
        </table>

        <!--inicio insert-->
        
        <hr>
        <h3> Ingresar contactos: </h3>
        <form method="post" action= "insertar.php">
            
        <table>
           
           <tr>
            <td>nombre:</td>
            <td><input type="text" 
            name="txtnombre" 
            placeholder="digite su nombre">
            </td>
           </tr>

           <tr>
            <td>edad:</td>
            <td><input type="int" 
            name="txtedad" 
            placeholder="digite su edad">
            </td>
           </tr>

           <tr>
            <td>telefono:</td>
            <td><input type="text" 
            name="txttelefono" 
            placeholder="digite su telefono">
            </td>
           </tr>

           <tr>
            <td>correo:</td>
            <td><input type="email" 
            name="txtcorreo" 
            placeholder="digite su correo">
            </td>
           </tr>
            
           <input type="hidden" name="oculto" value="1">
           
           <tr>
            <td> <input type="reset" name=""></td>
            <td> <input type="submit" value="ingresar datos del contacto"></td>
           </tr>

        </table>

        </form>

        <!--fin insert-->

    </center>
</body>
</html>