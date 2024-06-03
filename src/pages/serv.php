<?php
// Datos de conexión a MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}
echo "Conexión exitosa";

$conn->close();
?>
