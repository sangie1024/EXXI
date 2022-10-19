$("#frmAcceso").on('submit', function(e)
{
    e.preventDefault();
	user=$("#user").val();
	pass=$("#pass").val();
	$.post("./ajax/usuario.php?op=login", 
    {"login":user, "clave":pass})
})