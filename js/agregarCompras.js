// Cunado haga click en elemento con los id entonces se ejecuta la función correspondiente
document.querySelector("#btnAgregar").addEventListener("click", validar);
document.querySelector("#btnLimpiar").addEventListener("click", limpiar);

// Se obtiene la informacion de cada campo
var codigo = document.querySelector("#codigo"),
  costo = document.querySelector("#costo"),
  precio = document.querySelector("#precio"),
  cantidad = document.querySelector("#cantidad");

function validar() {
  var vCosto = costo.value,
    vCodigo = codigo.value,
    vPrecio = precio.value,
    vCantidad = cantidad.value;

  // Valida que los campo no esten vacios, si no hay ningún campo vacío llama a la función guardar
  if (vCantidad === "" || vCodigo === "" || vPrecio === "" || vCosto === "") {
    alert("Diligencie todos los campos");
  } else {
    guardar(vCodigo, vCantidad, vCosto, vPrecio);
  }
}

function guardar(Codigo, Cantidad, costo, precio) {
  // Se asignan los parametros que se van a enviar al archivo guardarDatos.php para guardarlos en base datos 
  var parametros = {
    guardar: "Compras",
    codigo: Codigo,
    cantidad: Cantidad,
    costo: costo,
    precio: precio,
  };
  $.ajax({
    data: parametros,
    dataType: "json",
    url: "../modelos/guardarDatos.php",
    type: "post",
    success: function () {},
  });

  // Llama a la funcion limpiar
  limpiar();
  alert("Compra registrada");
}

function limpiar() {
  // A todos los campos le asigna el valor vacio 
  document.querySelector("#codigo").value = "";
  document.querySelector("#nombre").value = "";
  document.querySelector("#costo").value = "";
  document.querySelector("#precio").value = "";
  document.querySelector("#cantidad").value = "";
}
