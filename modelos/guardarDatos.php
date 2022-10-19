<?php
// Incluirn la conexion de base de datos
require "../config/conection.php";

// En cada if se compara el parametro guardar resivido
if ($_POST['guardar'] == "proveedores") {
  // Se crean las variables y se asignan el valor resivido en cada umo de los parametros
  $nit = ($_POST['nit']);
  $nombre = ($_POST['nombre']);
  $telefono = ($_POST['telefono']);
  $tlContacto = ($_POST['telefonoContacto']);
  $correo = ($_POST['correo']);
  $cotacto = ($_POST['contacto']);

  // Se arma la sentencia que sera ejecutar en base de datos
  $sql = "INSERT INTO proveedores (nombre, nit, telefono, contacto, telefonoContacto, correoContacto) VALUES ('$nombre', $nit, $telefono, '$cotacto', $tlContacto, '$correo')";
  // Se ejecuta la sentecia en la base de datos
  $resultados = mysqli_query($conn, $sql);

  
  // Si no fue posible insertar el proveedor entonces se procede hacer la actualización
  if (empty($resultados)) {
    $sql = "UPDATE proveedores SET nombre= '$nombre', telefono= $telefono, contacto= '$cotacto', telefonoContacto = $tlContacto, correoContacto ='$correo' WHERE nit = $nit";
    $resultados = mysqli_query($conn, $sql);
  }
} 

if ($_POST['guardar'] == "Compras") {
  // Se crean las variables y se asignan el valor recibido en cada uno de los parametros
  $codigo = ($_POST['codigo']);
  $cantidad = ($_POST['cantidad']);
  $costo = ($_POST['costo']);
  $precio = ($_POST['precio']);

  
   // Se arma la sentencia que sera ejecutar en base de datos
  $sql = "INSERT INTO `compras`(`codigoProducto`, `cantidad`, `costoUnitario`, `precioUnitario`) VALUES ($codigo, $cantidad, $costo, $precio)";
  $resultados = mysqli_query($conn, $sql);
}

if ($_POST['guardar'] == "ventas") {
  // Se crean las variables y se asignan el valor recibido en cada uno de los parametros
  $codigo = ($_POST['idcell']);
  $precio = ($_POST['pricecell']);
  $cantidad = ($_POST['amouncell']);

   // Se arma la sentencia que sera ejecutar en base de datos
  $sql = "INSERT INTO `ventas`(`codigoProducto`, `cantidad`, `precioUnitario`) VALUES  ($codigo, $cantidad, $precio)";
  $resultados = mysqli_query($conn, $sql);
}

if ($_POST['guardar'] == "productos") {
   // Se crean las variables y se asignan el valor recibido en cada uno de los parametros
  $codigo = ($_POST['codigo']);
  $nombre = ($_POST['nombre']);
  $descripcion = ($_POST['descripcion']);
  $costo = ($_POST['costo']);
  $precio = ($_POST['precio']);
  $stock = ($_POST['stock']);
  $proveedor = ($_POST['proveedor']);

  // Se arma la consulta para ytener el id de provedor
  $idProveedor = "SELECT id  FROM PROVEEDORES WHERE nit = $proveedor";

  // se obtiene el id de proveedor al ejecutar la consulta
  $resultId = mysqli_query($conn, $idProveedor);
  while ($consulta = mysqli_fetch_array($resultId)) {
    // Se asigna a la variable id el resiltado de la ejecucion de la consulta en la columna id
    $id = $consulta['id'];
  }

  // Se arma la consulta para insertar el producto con stock de 0
  $sql = "INSERT INTO productos (codigo, nombre, descripcion, stock, proveedor) VALUES ($codigo, '$nombre', '$descripcion', 0,  $id)";
  $resultados = mysqli_query($conn, $sql);

  // Si no fue posible insertar el producto entonces se procede a realizar la actualizacion del producto
  if (empty($resultados)) {
    $updateProductos = "UPDATE `productos` SET `nombre`='$nombre',`descripcion`='$descripcion',`stock`=$stock,`proveedor`=$id WHERE `codigo`=$codigo";
    $resultados = mysqli_query($conn, $updateProductos);
    
    // Se arma la sentecia para actualzar la ultima compra realizada del producto en cuanto a precio y costo
    $updateCompras = "UPDATE `compras` SET `costoUnitario`=$costo,`precioUnitario`=$precio WHERE `codigoProducto`=$codigo ORDER BY id DESC LIMIT 1";
    $resultUpdateCompras = mysqli_query($conn, $updateCompras);
   
  }else {
    // Si fue poisible insertar el producto entonces se procede a incertar la cantidad con la que se inicia el producto
    $insertCompras = "INSERT INTO `compras`(`codigoProducto`, `cantidad`, `costoUnitario`, `precioUnitario`) VALUES ($codigo, $stock, $costo, $precio)";
    $resultCompras = mysqli_query($conn, $insertCompras);
  }
} 
