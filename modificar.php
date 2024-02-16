<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
</head>
<body>
    <h1>Modificar Producto</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id_producto = $_GET['id'];

        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "pruebita");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        // Consulta para obtener los datos del producto
        $sql = "SELECT nombre, descripcion, cantidad, precio FROM inventario WHERE id = $id_producto";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $cantidad = $row['cantidad'];
            $precio = $row['precio'];

            // Mostrar formulario para modificar el producto
            ?>
            <form action="modificar_logica.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id_producto; ?>">
                <label for="nuevo_nombre">Nuevo Nombre:</label><br>
                <input type="text" id="nuevo_nombre" name="nuevo_nombre" value="<?php echo $nombre; ?>"><br>
                <label for="nueva_descripcion">Nueva Descripción:</label><br>
                <textarea id="nueva_descripcion" name="nueva_descripcion"><?php echo $descripcion; ?></textarea><br>
                <label for="nueva_cantidad">Nueva Cantidad:</label><br>
                <input type="number" id="nueva_cantidad" name="nueva_cantidad" value="<?php echo $cantidad; ?>"><br>
                <label for="nuevo_precio">Nuevo Precio:</label><br>
                <input type="number" step="0.01" id="nuevo_precio" name="nuevo_precio" value="<?php echo $precio; ?>"><br>
                <input type="submit" value="Guardar Cambios">
            </form>
            <?php
        } else {
            echo "Producto no encontrado.";
        }

        // Cerrar la conexión
        $conexion->close();
    } else {
        echo "ID de producto no válido.";
    }
    ?>
    <br>
    <a href="index.php">Volver a la lista de productos</a>
</body>
</html>
