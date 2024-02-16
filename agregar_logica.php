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
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

// Preparar y ejecutar la consulta para insertar datos en la tabla
$sql = "INSERT INTO inventario (nombre, descripcion, cantidad, precio) VALUES ('$nombre', '$descripcion', '$cantidad', '$precio')";

if ($conn->query($sql) === TRUE) {
  echo "Producto guardado exitosamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();

// Redireccionar al index.php después de guardar el producto
header("Location: index.php");
exit();
?>
