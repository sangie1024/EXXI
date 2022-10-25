	<?php
	// llama al archivo usuarios de la crapeta modelos
	require_once "../modelos/usuario.php";
	//se declara la variable usuario la cual crea una neva instancia de la clace usuarios del archivo inportado de la linea anterior
	$usuario = new Usuario();
	$user = $_POST['login'];
	$pass = $_POST['clave'];
	session_start();
	$_SESSION['usuario'] = $user;

	
	$clavemd5= MD5($pass);	
	//se ejecuta la consulta para verificar si el usuario y la contraceña son validos
	$query = $usuario->login($user, $clavemd5);
	$resultado = mysqli_num_rows($query)
	?>
	<?php
	// si el ingreso es exitoso entonces ingresa a ventas, si nentoces lo envia al indexy muestra el mensaje de datos erroneós
	if ($resultado) {
		header("location:../vistas/frm_Ventas.php");
	} else {
	?>
		<?php
		$_SESSION['status'] = "Datos erroneos";
		header("location:../index.php");
	}
	mysqli_close($conn);
		?>