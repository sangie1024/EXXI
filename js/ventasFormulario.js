// Cunado haga click en elemento con los id entonces se ejecuta la función correspondiente
document.querySelector("#btnAgregar").addEventListener("click", listado);
document.querySelector("#btnGuardar").addEventListener("click", guardar);
document.querySelector("#btnCancelar").addEventListener("click", cancelar);
document.querySelector("#btnLimpiar").addEventListener("click", limpiar);

// Se obtiene la informacion de cada campo
var listaVentas = [],
  nombre = document.querySelector("#nombre"),
  codigo = document.querySelector("#codigo"),
  precio = document.querySelector("#precio"),
  cantidad = document.querySelector("#cantidad"),
  stock = document.querySelector("#stock");


function listado() {
  var lNombre = nombre.value,
    lCodigo = codigo.value,
    lPrecio = precio.value,
    lCantidad = cantidad.value,
    lStock = stock.value;

  // Valida que los campo no esten vacios, si no hay ningún campo vacío llama a la función guardar
  if (lCantidad === "" || lCodigo === "" || lPrecio === "") {
    alert("Diligencie todos los campos");
  } else if(lCantidad > lStock) {
    alert("De este producto existen " + lStock + " unidades")
  } else {
    addVenta(lNombre, lCodigo, lCantidad, lPrecio);
  }
}

function addVenta(nombre, codigo, cantidad, precio) {
  var lista = {
    name: nombre,
    cod: codigo,
    amount: cantidad,
    price: precio,
  };
  // Agrega  a la lista de ventas un nuevo registro 
  listaVentas.push(lista);
  // Llama a la funcion obtener listado
  obtenerLista();
}

function llamarLista() {
 // Retorna a la lista  
  return listaVentas;
}

function obtenerLista() {
  // Llama la función llamarLista para tener la lista de ventas actuales 
  var listaVenta = llamarLista(),
  // Llama el id tablaVentas y id total
    tbody = document.querySelector("#tablaVentas tbody"),
    total = document.querySelector("#total"),
    totalAmount = 0;
  // deja el total vacio
  tbody.innerHTML = "";

  // Agrega producto por producto a la tabla
  for (var i = 0; i < listaVenta.length; i++) {
    var row = tbody.insertRow(i),
      idCell = row.insertCell(0),
      nameCell = row.insertCell(1),
      priceCell = row.insertCell(2),
      amountCell = row.insertCell(3),
      subtotalCell = row.insertCell(4);

      // Convierte los valores de precio y cantidad
    var price = parseFloat(listaVenta[i].price),
      amount = parseFloat(listaVenta[i].amount),
      subtotal = price * amount;

      // Suma el total + subtotal
    totalAmount += subtotal;

    // A las columnas definidas se les asigna el valor correspondiente 
    idCell.innerHTML = listaVenta[i].cod;
    (nameCell.innerHTML = listaVenta[i].name),
      (priceCell.innerHTML = listaVenta[i].price),
      (amountCell.innerHTML = listaVenta[i].amount),
      (subtotalCell.innerHTML = subtotal);

    tbody.appendChild(row);
    // Trae el valkor de tosdos los subtotal
    total.value = totalAmount;

    // Llama la función limpiar para que todos los campos queden en blanco
    limpiar();
  }
}

function guardar() {
  var tbody = document.querySelector("#tablaVentas tbody");
  
  //Por cada producto agregado  a la venta guarda codigo precio y cantidad
  for (let i = 0; i < tbody.rows.length; i++) {
    var row = tbody.rows[i],
      idCell = row.cells[0].innerText,
      priceCell = row.cells[2].innerText,
      amountCell = row.cells[3].innerText;

    var parametros = {
      guardar: "ventas",
      idcell: idCell,
      pricecell: priceCell,
      amouncell: amountCell,
    };
    $.ajax({
      data: parametros,
      dataType: "json",
      url: "../modelos/guardarDatos.php",
      type: "post",
      success: function (valores) {},
    });
  }
  cancelar();
}

function cancelar() {
  var tbody = document.querySelector("#tablaVentas tbody");

  // Elimina la lista de ventas y todos los rejistros
  listaVentas.splice(0, listaVentas.length);
  tbody.innerHTML = "";
  document.querySelector("#total").value = "";
}

function limpiar() {
  nombre.value = "";
  codigo.value = "";
  precio.value = "";
  cantidad.value = "";
  stock.value = "";
}
