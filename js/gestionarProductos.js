// Cunado haga click en elemento con los id entonces se ejecuta la función correspondiente
document.querySelector("#btnGuardar").addEventListener("click", validar);

// Se obtiene la informacion de cada campo
var nit = document.querySelector("#codigo"),
  nombre = document.querySelector("#nombre"),
  descripcion = document.querySelector("#descripcion"),
  costo = document.querySelector("#costo"),
  precio = document.querySelector("#precio"),
  stock = document.querySelector("#stock"),
  proveedor = document.querySelector("#proveedor");

function validar() {
  var vcodigo = codigo.value,
    vnombre = nombre.value,
    vdescripcion = descripcion.value,
    vcosto = costo.value,
    vprecio = precio.value,
    vstock = stock.value,
    vproveedor = proveedor.value;
    
  // Valida que los campo no esten vacios, si no hay ningún campo vacío llama a la función guardar
  if (vcodigo === "" ||
    vnombre === "" ||
    vdescripcion === "" ||
    vcosto === "" ||
    vprecio === "" ||
    vstock === "" ||
    vproveedor === ""
  ) {
    alert("Diligencie todos los campos");
  } else {
    guardar(
      vcodigo,
      vnombre,
      vdescripcion,
      vcosto,
      vprecio,
      vstock,
      vproveedor
    );
  }
}

function guardar( vcodigo,
  vnombre,
  vdescripcion,
  vcosto,
  vprecio,
  vstock,
  vproveedor
) {
  // Se asignan los parametros que se van a enviar al archivo guardarDatos.php para guardarlos en base datos 
  var parametros = {
    guardar: "productos",
    codigo: vcodigo,
    nombre: vnombre,
    descripcion: vdescripcion,
    costo: vcosto,
    precio: vprecio,
    stock: vstock,
    proveedor: vproveedor,
  };
  $.ajax({
    data: parametros,
    dataType: "json",
    url: "../modelos/guardarDatos.php",
    type: "post",
  });
  // Llama a la funcion limpiar
  Limpiar();
  alert("Producto registrado");
}

// limpiar campos de formilario de productos
function Limpiar() {
  document.querySelector("#codigo").value = "";
  document.querySelector("#nombre").value = "";
  document.querySelector("#descripcion").value = "";
  document.querySelector("#costo").value = "";
  document.querySelector("#precio").value = "";
  document.querySelector("#stock").value = "";
  document.querySelector("#proveedor").value = "";
}
