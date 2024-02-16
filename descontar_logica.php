<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto por tu nombre de usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$dbname = "pruebita";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$id_producto = $_POST['producto'];
$cantidad_descontar = $_POST['cantidad'];

// Verificar si la cantidad a descontar es válida
if ($cantidad_descontar <= 0) {
    echo "La cantidad a descontar debe ser mayor que cero.";
    exit();
}

// Verificar si hay suficiente cantidad en inventario
$sql = "SELECT cantidad FROM inventario WHERE id = $id_producto";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cantidad_actual = $row['cantidad'];

    if ($cantidad_actual < $cantidad_descontar) {
        echo "No hay suficiente cantidad en inventario.";
        exit();
    } else {
        // Actualizar la cantidad en inventario
        $nueva_cantidad = $cantidad_actual - $cantidad_descontar;
        $sql = "UPDATE inventario SET cantidad = $nueva_cantidad WHERE id = $id_producto";

        if ($conn->query($sql) === TRUE) {
            echo "Cantidad descontada exitosamente";
        } else {
            echo "Error al actualizar la cantidad: " . $conn->error;
        }
    }
} else {
    echo "Producto no encontrado.";
}

// Cerrar la conexión
$conn->close();

// Redireccionar al index.php después de descontar la cantidad
header("Location: index.php");
exit();
?>
