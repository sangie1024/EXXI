<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require "comunes/head.php";
  ?>
  <title>Ventas</title>
</head>

<body>
  <header>
    <?php
    require "comunes/headed.php";
    ?>
  </header>
  <div class="vista">
    <div class="botones">Ventas</div>
    <form class="formulario">
      <div class="row">
        <label id="cod" name="cod">Código</label>
        <input type="number" id="codigo" onblur="buscar();">
        <label id="description">Cantidad</label>
        <input type="number" id="cantidad" required>
        <input type="number" id="stock" style="display:none">
      </div>
      <div class="row">
        <label id="name">Nombre</label>
        <input type="text" id="nombre" disabled>
        <label for="">Precio</label>
        <input type="number" id="precio">
        <button type="button" id="btnAgregar">Agregar</button>
        <button type="button" id="btnLimpiar">Limpiar</button>

      </div>
      <table id="tablaVentas">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Sub-total</th>
          </tr>
        </thead>
        <tbody>


        </tbody>
      </table>
      <label>TOTAL</label>
      <input id="total" type="number" disabled>
      <button type="button" id ="btnGuardar">Guardar</button>
      <button type="button" id ="btnCancelar">Cancelar</button>
      <script src="../js/ventasFormulario.js"></script>
      <script type="text/javascript">
        $(document).keypress(function(event) {
          if (event.which === 13) {
            $("#btnAgregar").click();
          }
        });

        function buscar() {
          cod = $("#codigo").val();

          var parametros = {
            "buscar": "1",
            "cod": cod
          };
          $.ajax({
            data: parametros,
            dataType: 'json',
            url: '../modelos/obtenerDatos.php',
            type: 'post',
            success: function(valores) {
              $("#nombre").val(valores.nombre);
              $("#precio").val(valores.precio);
              $("#stock").val(valores.stock);
            }
          })
        }
      </script>
    </form>
  </div>
</body>
<footer>
  <?php
  require "comunes/footer.php";
  ?>
</footer>

</html>