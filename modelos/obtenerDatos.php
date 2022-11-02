<?php
//incluirn la conexion de base de datos
require "../config/conection.php";
// Se crea variable valortes que va hacer de tipo array
$valores = array();
$proveedor = 0;
$valores['existe'] = "0";

// En cada if se compara el parametro buscar para ejecutar las acciones correspondientes 
if ($_POST['buscar']  == "1") {
  //Se crea la variable y se asigna el valor de acuerdo al parametreo recibido
  $cod = ($_POST['cod']);

  // Armar la centecia para traer los valores nombre, precioUnitario y costoUnitario
  $sql = "SELECT p.nombre, c.precioUnitario, c.costoUnitario, p.stock FROM productos p INNER JOIN compras c WHERE p.codigo = $cod and p.codigo = c.codigoProducto ORDER BY c.id DESC LIMIT 1";
  $resultados = mysqli_query($conn, $sql);

  while ($consulta = mysqli_fetch_array($resultados)) {
    // Dentro del array valores crea los campos que seran devueltos 
    $valores['existe'] = "1";
    $valores['nombre'] = $consulta['nombre'];
    $valores['precio'] = $consulta['precioUnitario'];
    $valores['costo'] = $consulta['costoUnitario'];
    $valores['stock'] = $consulta['stock'];

  }
}

if ($_POST['buscar']  =="proveedores") {
  $nit= ($_POST['NIT']);

  $sql = "SELECT * FROM `proveedores` WHERE nit = $nit";
  $resultado = mysqli_query($conn, $sql);

  while ($consulta = mysqli_fetch_array($resultado)) {
    $valores['existe'] = "1";
    $valores['Nombre'] = $consulta['nombre'];
    $valores['Telefono'] = $consulta['telefono'];
    $valores['Contacto'] = $consulta['contacto'];
    $valores['TelefonoContacto'] = $consulta['telefonoContacto'];
    $valores['Correo'] = $consulta['correoContacto'];
  }
}

if ($_POST['buscar']  =="productos") {
  $cod= ($_POST['codigo']);

  $sql = "SELECT * FROM `productos` WHERE codigo = $cod";
  $resultado = mysqli_query($conn, $sql);

  while ($consulta = mysqli_fetch_array($resultado)) {
    $valores['existe'] = "1";
    $valores['Nombre'] = $consulta['nombre'];
    $valores['Descripcion'] = $consulta['descripcion'];
    $valores['stock'] = $consulta['stock'];
    
    $proveedor = $consulta['proveedor'];   
    
  }
  
  $sql = "SELECT nit FROM `proveedores` WHERE id = $proveedor";
  $resultadoProveedor = mysqli_query($conn, $sql);
  while ($consultasP = mysqli_fetch_array($resultadoProveedor)) {
    $valores['proveedor'] = $consultasP['nit'];
  }
  $sql = "SELECT precioUnitario, costoUnitario FROM compras WHERE codigoProducto = $cod ORDER BY id DESC LIMIT 1";
  $resultados = mysqli_query($conn, $sql);

  while ($consultas = mysqli_fetch_array($resultados)) {
    $valores['precio'] = $consultas['precioUnitario'];
    $valores['costo'] = $consultas['costoUnitario'];
  }
}

$valores = json_encode($valores);
echo $valores;
