<!DOCTYPE html>
<html lang="es">
<head>
<?php
      require "comunes/head.php";
      ?>
    <title>Productos</title>
</head>
<body>
<header>
    <?php
      require "comunes/headed.php";
      ?>
  </header>
  <div class="vista">
    <div class="botones">Productos</div>
    <form class="formulario">
      <div class="row">
        <label id="cod">Código</label>
        <input type="number" id="codigo" onblur="buscar();">      
        <label id="name">Nombre</label>
        <input type="text" id="nombre">      
      </div>
      <div  class="row">
        <label id="description" >Descripción</label>
        <textarea  cols="50" rows="5" placeholder="Ingrese la descripción" id="descripcion"></textarea>
      </div>
     <div  class="row">
       <label >Costo</label>
       <input type="number"  id= "costo">
       <label >Precio</label>
       <input type ="number" id= "precio">
      </div>
      <div class="row">
        <label >Stock</label>
        <input type ="number" id= "stock">
        <label >Proveedor</label>
        <input type="text" id="proveedor" >
      </div>
      <div class="botones">
        <button type="button" id="btnGuardar">Guardar</button>
      </div>
      <script src="../js/gestionarProductos.js"></script>

      <script type="text/javascript">
        $(document).keypress(function(event) {
          if (event.which === 13) {
            $("#btnGuardar").click();
          }
        });

        function buscar() {
          cod = $("#codigo").val();

          var parametros = {
            "buscar": "productos",
            "codigo": cod
          };
          $.ajax({
            data: parametros,
            dataType: 'json',
            url: '../modelos/obtenerDatos.php',
            type: 'post',
            success: function(valores) {
              $("#nombre").val(valores.Nombre);
              $("#descripcion").val(valores.Descripcion);
              $("#stock"). val(valores.stock);
              $("#proveedor"). val(valores.proveedor);
              $("#costo"). val(valores.costo);
              $("#precio"). val(valores.precio);
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