<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Carga de Productos</title>
</head>
<body>
    <h2>Formulario de Carga de Productos</h2>
    <form action="agregar_logica.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion"></textarea><br>
        <label for="cantidad">Cantidad:</label><br>
        <input type="number" id="cantidad" name="cantidad" required><br>
        <label for="precio">Precio:</label><br>
        <input type="number" step="0.01" id="precio" name="precio" required><br>
        <input type="submit" value="Guardar Producto">
    </form>
</body>
</html>
