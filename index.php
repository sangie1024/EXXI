<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="../js/ajax_jquery_min.js"></script>
    <title>Login</title>
    <link rel="shortcut icon" href="Img/logo.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="css/estilo.css" />
  </head>
  <body>
  <div class="login-box">
    <div class="login-logo">
      <b>Tienda EXXI</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

      <form method="post" id="frmAcceso" action="ajax/usuario.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" id="user" name="login" class="form-control" placeholder="Usuario" required>
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="pass" name="clave" class="form-control" placeholder="Contraseña" required>
          <span class="fa fa-key form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">

          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" id="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
          </div>
          <!-- /.col -->
          <?php
            session_start();
            if (isset($_SESSION['status'])) {
              echo $_SESSION['status'];
              unset($_SESSION['status']);             
            }
          ?>
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <script src="public/js/jquery.min.js"></script>
  </body>
  <footer>
    <p class="dir">Dirección:</p>
    <p>Cra. 89 Bis A #69-09</p>
    <p>Bogotá - Colombia</p>
  </footer>
</html>

