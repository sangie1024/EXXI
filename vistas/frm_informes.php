<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require "comunes/head.php";
  ?>
  <title>Informe</title>
</head>

<body>
  <header>
    <?php
    require "comunes/headed.php";
    ?>
  </header>
  <div class="vista">
    <div class="botones">Informes</div>
    <form class="formulario">
      <div class="row">
        <label>Mes</label>
        <select id="mes" mes="mes">
          <option value="enero">Enero</option>
          <option value="febrero">Febrero</option>
          <option value="marzo">Marzo</option>
          <option value="abril">Abril</option>
          <option value="mayo">Mayo</option>
          <option value="junio">Junio</option>
          <option value="julio">Julio</option>
          <option value="agosto">Agosto</option>
          <option value="septiembre">Septiembre</option>
          <option value="octubre">Octubre</option>
          <option value="novienbre">Novienbre</option>
          <option value="diciembre">Diciembre</option>
        </select>
        <br>
        <br>
        <button type="button" id="btnProductos">Productos</button>
        <button type="button" id="btnVentas">Ventas</button>
        <button type="button" id="btnCompras">Compras</button>
      </div>
      <table id="tablaInforme">
        <thead>

        </thead>
        <tbody>


        </tbody>
      </table>
      <label>TOTAL</label>
      <input id="total" type="number" disabled>
      <script src="../js/informeFormulario.js"></script>
    </form>
  </div>
</body>
<script type="text/javascript">
  document.querySelector("#btnProductos").addEventListener("click", buscar);
  $(document).keypress(function(event) {
    if (event.which === 13) {
      $("#btnAgregar").click();
    }
  });

  function buscar() {
    var parametros = {
    buscar: "productos"
  };
  $.ajax({
    data: parametros,
    dataType: "json",
    async: false,
    url: "../modelos/obtenerInforme.php",
    type: "post",
    success: function(valores) {
      alert(valores.length)
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
      for (var i = 0; i < valores.length; i++) {
        var row = tbody.insertRow(i),
          nombreCell = row.insertCell(0),
          stockCell = row.insertCell(1);
        // A las columnas definidas se les asigna el valor correspondiente
        nombreCell.innerHTML = valores[i][nombre];
        stockCell.innerHTML = valores[i][stock];
    
        tbody.appendChild(row);
      
      }
    }
    })
  }
</script>
<footer>
  <?php
  require "comunes/footer.php";
  ?>
</footer>

</html>