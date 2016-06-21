<?php $today= date('Y-m-d');?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="default.css" rel="stylesheet"><link rel="icon" href="img/logo.png">
        <script src="js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/altaValidaciones.js"></script>
        <title> Couchinn </title>

    </head>

    <body>

    <?php include("navbar.php") ?>
  <!-- hay un bardo con el formulario de iniciar sesion en la navbar, valida el html cuando no debería. -->
      <div class="container">
          <?php if (isset($_GET['msg'])) { ?>
              <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
                  <?php echo($_GET['msg'])?>
              </div>
          <?php } ?>
          <form class="form-horizontal" name="recuperarContrasena" method="post" onsubmit="return valRecuperarContraseña()" action="consultas/recuperar_contrasena.php">
              <div class="form-group">
                  <label class="control-label" for="emailUser">Ingrese su e-mail de registro en el que recibira el link para recuperar contraseña</label>
                  <input type="email" name="emailUser" class="form-control" id="emailUser" maxlength="30" placeholder="nombre_de_su_email@dominio.com" aria-describedby="helpBlock-email" required>
                  <span id="glyphicon-email" aria-hidden="true"></span>
                  <span id="helpBlock-email" class="help-block"></span>
              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
                  <a class="btn btn-primary" href="index.php">Cancelar</a>
              </div>
          </form>
      </div>

    </body>

</html>