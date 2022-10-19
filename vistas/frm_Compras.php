<!DOCTYPE html>
<html lang="en">
<head>
<?php
      require "comunes/head.php";
      ?>
  <title>Compras</title>
</head>
<body>
  <header>
  <?php
      require "comunes/headed.php";
      ?>
  </header>
  <div class="vista">
    <div class="botones">Compras</div>
    <form class="formulario">
      <div class="row">
        <label id="cod">Código</label>
        <input type="number" id="codigo" onblur="buscar();">
        <label id="name">Nombre</label>
        <input type="text" id ="nombre" disabled>
        </label>Cantidad</label>
        <input type="number" name="" id="cantidad">
      </div>
      <div class="row">
        <label id="description">Costo</label>
        <input type="number" id="costo">
        <label for="">Precio</label>
        <input type="number" id ="precio">
        <button type="button" id="btnAgregar">Agregar</button>
        <button type="button" id="btnLimpiar">Limpiar</button>
        
      </div>     

      <script src="../js/agregarCompras.js"></script>

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
              $("#costo"). val(valores.costo);
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