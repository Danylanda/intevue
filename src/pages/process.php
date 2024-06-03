<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
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

// Obtener datos del formulario
$data = json_decode(file_get_contents("php://input"), true);
$nombre = $data['nombre'];
$apellido = $data['apellido'];
$lugarNacimiento = $data['lugarNacimiento'];
$departamento = $data['departamento'];

// Insertar datos en la base de datos
$sql = "INSERT INTO prueba (nombres, estadocivil, nacimiento, departamento) VALUES ('$nombre', '$apellido', '$lugarNacimiento', '$departamento')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Registro exitoso"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al registrar: " . $conn->error]);
}

// Cerrar conexión
$conn->close();
?>
