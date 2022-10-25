// Cunado haga click en elemento con los id entonces se ejecuta la función correspondiente
document.querySelector("#btnGuardar").addEventListener("click", validar);
document.querySelector("#btnLimpiar").addEventListener("click", Limpiar);

// Se obtiene la informacion de cada campo
var nit = document.querySelector("#nit"),
  nombre = document.querySelector("#nombre"),
  telefono = document.querySelector("#telefono"),
  telContacto = document.querySelector("#telefonoContacto"),
  correo = document.querySelector("#correo"),
  contacto = document.querySelector("#contacto");


function validar() {
  var vNit = nit,
    vNombre = nombre.value,
    vTelefono = telefono.value,
    vTelContacto = telContacto.value,
    vCorreo = correo. value,
    vContacto = contacto. value;
      // Valida que los campo no esten vacios, si no hay ningún campo vacío llama a la función guardar
  if ( vNit === "" || vNombre === "" || vTelefono === "" || vTelContacto === "" || vCorreo ==="" || vContacto ==="" ) {
    alert("Diligencie todos los campos");
  } else if(vCorreo.match(/^.*@.*$/)){
    guardar(vNit, vNombre, vTelefono, vTelContacto, vCorreo,  vContacto);
  }
  else {
    alert("El campo correo no es válido");
  }
}
 // Se asignan los parametros que se van a enviar al archivo guardarDatos.php para guardarlos en base datos 
function guardar(Nit, Nombre, Telefono, TelContacto, Correo,  Contacto) {
  var parametros = {
    guardar: "proveedores",
    nit: Nit,
    nombre: Nombre,
    telefono: Telefono,
    telefonoContacto: TelContacto,
    correo:Correo,
    contacto:Contacto
  };
  $.ajax({
    data: parametros,
    dataType: "json",
    url: "../modelos/guardarDatos.php",
    type: "post",
  });

  Limpiar()

  alert("Proveedor registrado");
}

function Limpiar() {
  document.querySelector("#nit").value = "";
  document.querySelector("#nombre").value = "";
  document.querySelector("#telefono").value = "";
  document.querySelector("#telefonoContacto").value = "";
  document.querySelector("#contacto").value = "";
  document.querySelector("#correo").value = "";
}


