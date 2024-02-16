<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Descontar Producto</title>
</head>
<body>
    <h2>Formulario de Descontar Producto</h2>
    <form action="descontar_logica.php" method="post">
        <label for="producto">Producto:</label><br>
        <select id="producto" name="producto">
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

            // Consulta para obtener todos los productos
            $sql = "SELECT id, nombre FROM inventario";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay productos disponibles</option>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </select><br>
        <label for="cantidad">Cantidad a descontar:</label><br>
        <input type="number" id="cantidad" name="cantidad" required><br>
        <input type="submit" value="Descontar Cantidad">
    </form>
</body>
</html>
