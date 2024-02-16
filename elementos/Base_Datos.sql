CREATE TABLE inventario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    cantidad INT,
    precio DECIMAL(10,2),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);