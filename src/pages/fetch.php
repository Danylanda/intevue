<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Datos de conexión a MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "La conexión ha fallado: " . $conn->connect_error]));
}

// Obtener datos de la tabla
$sql = "SELECT id, nombres, estadocivil, nacimiento, departamento FROM prueba";
$result = $conn->query($sql);

$personas = [];

//fetch devuelve datos
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $personas[] = $row;
    }
}

echo json_encode(["success" => true, "data" => $personas]);


$conn->close();
?>
