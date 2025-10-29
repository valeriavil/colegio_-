<?php
// Conexión con AlwaysData
$servername = "mysql-valeriav.alwaysdata.net";
$username   = "valeriav";
$password   = "vale20+"; // Cambiar por tu contraseña real
$database   = "valeriav_colegio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("<div class='alert alert-danger'>Error de conexión: " . $conn->connect_error . "</div>");
}

// Consulta de registros
$sql = "SELECT * FROM personas LIMIT 100";
$resultado = $conn->query($sql);

// Generar la tabla
echo "<table class='table table-bordered table-hover mt-4'>";
echo "<thead class='table-primary text-center'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Ciudad</th>
            <th>Promedio</th>
            <th>Correo</th>
        </tr>
      </thead>";
echo "<tbody class='text-center'>";

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['nombre']}</td>
                <td>{$fila['apellido']}</td>
                <td>{$fila['ciudad']}</td>
                <td>{$fila['promedio']}</td>
                <td>{$fila['correo']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6' class='text-center text-muted'>No hay registros disponibles</td></tr>";
}

echo "</tbody></table>";

$conn->close();
?>