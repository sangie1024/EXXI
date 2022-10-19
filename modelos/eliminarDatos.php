<?php
//incluirn la conexion de base de datos
require "../config/conection.php";


if ($_POST['eliminar'] == "proveedores") {
    $success = "Eliminado";
  $nit = ($_POST['nit']);

  $sql = "DELETE FROM `proveedores` WHERE nit = $nit";

  $resultados = mysqli_query($conn, $sql);
}