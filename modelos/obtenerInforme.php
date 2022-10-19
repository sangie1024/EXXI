<?php
//incluirn la conexion de base de datos
require "../vistas/comunes/head.php";
require "../config/conection.php";
// Se crea variable valortes que va hacer de tipo array
$informe = array();
$informe['existe'] = "0";

// En cada if se compara el parametro buscar para ejecutar las acciones correspondientes 
if ($_POST['buscar']  == "productos") {

  // Armar la centecia para traer los valores nombre, precioUnitario y costoUnitario
  $sql = "SELECT nombre, stock FROM productos";
  $resultados = mysqli_query($conn, $sql);
  $row_count = $resultados->num_rows;

  $informe['existe'] = "1";
  for ($i=0; $i < $row_count ; $i++) { 
    $consulta = mysqli_fetch_array($resultados);
    $informe[$i]['nombre']= $consulta['nombre'];
    $informe[$i]['stock'] = $consulta['stock'];    
  }
  $informe = json_encode($informe);
global $informe;
echo $informe;
}

// if ($_POST['buscar']  =="proveedores") {
//   $nit= ($_POST['NIT']);

//   $sql = "SELECT * FROM `proveedores` WHERE nit = $nit";
//   $resultado = mysqli_query($conn, $sql);

//   while ($consulta = mysqli_fetch_array($resultado)) {
//     $informe['existe'] = "1";
//     $informe['Nombre'] = $consulta['nombre'];
//     $informe['Telefono'] = $consulta['telefono'];
//     $informe['Contacto'] = $consulta['contacto'];
//     $informe['TelefonoContacto'] = $consulta['telefonoContacto'];
//     $informe['Correo'] = $consulta['correoContacto'];
//   }
// }

// if ($_POST['buscar']  =="producto") {
//   $cod= ($_POST['codigo']);

//   $sql = "SELECT * FROM `productos` WHERE codigo = $cod";
//   $resultado = mysqli_query($conn, $sql);

//   while ($consulta = mysqli_fetch_array($resultado)) {
//     $informe['existe'] = "1";
//     $informe['Nombre'] = $consulta['nombre'];
//     $informe['Descripcion'] = $consulta['descripcion'];
//     $informe['stock'] = $consulta['stock'];
    
//     $proveedor = $consulta['proveedor'];   
    
//   }
  
//   $sql = "SELECT nit FROM `proveedores` WHERE id = $proveedor";
//   $resultadoProveedor = mysqli_query($conn, $sql);
//   while ($consultasP = mysqli_fetch_array($resultadoProveedor)) {
//     $informe['proveedor'] = $consultasP['nit'];
//   }
//   $sql = "SELECT precioUnitario, costoUnitario FROM compras WHERE codigoProducto = $cod ORDER BY id DESC LIMIT 1";
//   $resultados = mysqli_query($conn, $sql);

//   while ($consultas = mysqli_fetch_array($resultados)) {
//     $informe['precio'] = $consultas['precioUnitario'];
//     $informe['costo'] = $consultas['costoUnitario'];
//   }
// }


