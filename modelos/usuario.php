<?php
//incluir la conexion de base de datos
require "../config/conection.php";
class Usuario{
  //funcion que verifica el acceso al sistema
  public function login($user, $pass)  {
    $sql = "SELECT * FROM usuarios WHERE usuario='$user' AND contraseña='$pass'";
    return ejecutarConsulta($sql);
  }
}
