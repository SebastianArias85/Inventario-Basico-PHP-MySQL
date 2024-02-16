<?php
// Verificar si se ha proporcionado un ID válido para el producto
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "pruebita");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Consulta para eliminar el producto
    $sql = "DELETE FROM inventario WHERE id = $id_producto";
    if ($conexion->query($sql) === TRUE) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "ID de producto no válido.";
}



// Redireccionar al index.php después de guardar el producto
header("Location: index.php");
exit();
?>
