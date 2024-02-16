<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id_producto = $_POST['id'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nueva_descripcion = $_POST['nueva_descripcion'];
    $nueva_cantidad = $_POST['nueva_cantidad'];
    $nuevo_precio = $_POST['nuevo_precio'];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "pruebita");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Consulta para actualizar el producto
    $sql = "UPDATE inventario SET nombre = '$nuevo_nombre', descripcion = '$nueva_descripcion', cantidad = $nueva_cantidad, precio = $nuevo_precio WHERE id = $id_producto";
    if ($conexion->query($sql) === TRUE) {
        echo "Producto modificado correctamente.";
    } else {
        echo "Error al modificar el producto: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "No se recibieron datos válidos para modificar el producto.";
}

// Redireccionar al index.php después de guardar el producto
header("Location: index.php");
?>
