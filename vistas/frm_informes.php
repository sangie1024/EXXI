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
    <form class="inventario">
      </div>
      <table id="tablaInforme">
        <thead>
          <?php
            require "../config/conection.php";
            $sql = "SELECT nombre, stock FROM productos ORDER BY stock";
            $resultados = mysqli_query($conn, $sql);
            $row_count = $resultados->num_rows;
            
            $informe['existe'] = "1";
            ?>
            <tr class = "encabezados">
              <td>Nombre</td>
              <td>Cantidad</td>
            </tr>
            <?php
            while ($consulta = mysqli_fetch_array($resultados)) {
              ?>
            
            </thead>
            <tbody>
            <tr>
            <td> <?php echo $consulta['nombre']?> </td>
            <td> <?php echo $consulta['stock']?> </td>
            </tr>
            <?php  
            }
            ?>
              </tbody>
              </table>
    </form>
</body>
<footer>
  <?php
  require "comunes/footer.php";
  ?>
</footer>

</html>