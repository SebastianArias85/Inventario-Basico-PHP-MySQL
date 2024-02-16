<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "pruebita");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Consulta para obtener todos los productos y sus cantidades
$sql = "SELECT id, nombre, cantidad, descripcion, precio FROM inventario";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td>
                <a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                <a href="modificar.php?id=<?php echo $row['id']; ?>">Modificar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="agregar.php">Agregar Nuevo Producto</a>
    <a href="descontar.php">Descontar Cantidad de Producto</a>
</body>
</html>


<?php
// Cerrar la conexión
$conexion->close();
?>
