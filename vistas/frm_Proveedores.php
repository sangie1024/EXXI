<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require "comunes/head.php";
  ?>
  <title>Proveedores</title>
</head>

<body>
  <header>
    <?php
    require "comunes/headed.php";
    ?>
  </header>
  <div class="vista">
    <div class="botones">Proveedores</div>
    <form class="formulario">
      <div class="row">
        <label id="cod">Nit</label>
        <input type="number" id="nit" onblur="buscar();">
        <label id="name">Nombre</label>
        <input type="text" id="nombre">
      </div>
      <div class="row">
        <label id="description">Teléfono</label>
        <input type="number" id="telefono">
        <label for="">Contacto</label>
        <input type="text" id="contacto">
      </div>
      <div class="row">
        <label>Teléfono de contacto</label>
        <input type="number" id="telefonoContacto">
        <label>Correo</label>
        <input type="text" id="correo">

      </div>
      <div>
        <button type="button" id="btnGuardar">Guardar</button>
        <button type="button" id="btnLimpiar">Limpiar</button>

      </div>
      <script src="../js/gestionProveedor.js"></script>
      <script type="text/javascript">
        $(document).keypress(function(event) {
          if (event.which === 13) {
            $("#btnGuardar").click();
          }
        });
        function buscar() {
          nit = $("#nit").val();

          var parametros = {
            "buscar": "proveedores",
            "NIT": nit
          };
          $.ajax({
            data: parametros,
            dataType: 'json',
            url: '../modelos/obtenerDatos.php',
            type: 'post',
            success: function(valores) {
              $("#nombre").val(valores.Nombre);
              $("#telefono").val(valores.Telefono);
              $("#contacto").val(valores.Contacto);
              $("#telefonoContacto").val(valores.TelefonoContacto);
              $("#correo").val(valores.Correo);
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