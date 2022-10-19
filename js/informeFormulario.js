// Cunado haga click en elemento con los id entonces se ejecuta la función correspondiente
// document
//   .querySelector("#btnProductos")
//   .addEventListener("click", informe);
// document
//   .querySelector("#btnVentas")
//   .addEventListener("click", informe("ventas"));
// document
//   .querySelector("#btnCompras")
//   .addEventListener("click", informe("compras"));

// Se obtiene la informacion de cada campo
var listaVentas = [],
  mes = document.querySelector("#mes");

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

function informe() {
  var mesReporte = "";
  var item = "productos"
  
  if (item != "productos") {
    //mesReporte = mes.te;
  }
  var parametros = {
    buscar: item,
    mes: mesReporte,
  };
  $.ajax({
    data: parametros,
    dataType: "json",
    async: false,
    url: "../modelos/obtenerInforme.php",
    type: "post",
    complete: function () {
      var thead = document.querySelector("#tablaInforme thead"),
    tbody = document.querySelector("#tablaInforme tbody");
    // total = document.querySelector("#total"),
    // totalAmount = 0;
  // deja el total vacio
  thead.innerHTML = "";
  tbody.innerHTML = "";
      var head = thead.insertRow(0),
      nameCell = head.insertCell(0),
      stockCell = head.insertCell(1);
      nameCell.innerHTML = "Producto";
      stockCell.innerHTML = "Inventario";
      var valores = '.$informe.';
      for (var i = 0; i < valores.length; i++) {
        alert(valores.length)
        var row = tbody.insertRow(i),
          nombreCell = row.insertCell(0),
          stockCell = row.insertCell(1);
        alert(valores[existe]);
        // A las columnas definidas se les asigna el valor correspondiente
        nombreCell.innerHTML = valores[i][nombre];
        stockCell.innerHTML = valores[i][stock];
    
        tbody.appendChild(row);
        // Trae el valkor de tosdos los subtotal
        //total.value = totalAmount;
    
        // Llama la función limpiar para que todos los campos queden en blanco
        //limpiar();
      }
    }
  });
  

  // Retorna a la lista
 // return listaVentas;
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

    cancelar();
  }
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
}
