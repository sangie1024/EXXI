<?php
// Se configura la conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "123", "exxi");

// Se ejecuta la consulta en la base de datos
if (!function_exists('ejecutarConsulta')) {
  function ejecutarConsulta($sql) {
    global $conn;
    $query = mysqli_query($conn, $sql);
    return $query;
  }
}
