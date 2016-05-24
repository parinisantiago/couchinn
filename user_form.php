<?php $today= date('Y-m-d');?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="default.css" rel="stylesheet">
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
          <form class="form-horizontal" name="altaUsuario" method="post" onsubmit="return valUsuario()" action="consultas/alta_usuario.php">
              <div class="form-group">
                 <label class="control-label" for="nomUser">Nombre</label>
                  <input type="text" name="nomUser" class="form-control" id="nomUser" placeholder="Nombre" aria-describedby="helpBlock-nom" required>
                  <span id="glyphicon-nom" aria-hidden="true"></span>
                  <span id="helpBlock-nom" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="apUser">Apellido</label>
                  <input type="text" name="apUser" class="form-control" id="apUser" placeholder="Apellido" aria-describedby="helpBlock-ap" required>
                  <span id="glyphicon-ap" aria-hidden="true"></span>
                  <span id="helpBlock-ap" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="passUser">Contraseña</label>
                  <input type="password" name="passUser" class="form-control" id="passUser" placeholder="Contraseña" aria-describedby="helpBlock-pass" required>
                  <span id="glyphicon-pass" aria-hidden="true"></span>
                  <span id="helpBlock-pass" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="rePassUser">Confirmar Contraseña</label>
                  <input type="password" name="rePassUser" class="form-control" id="rePassUser" placeholder="Confirmar Contraseña" aria-describedby="helpBlock-rePass" required>
                  <span id="glyphicon-rePass" aria-hidden="true"></span>
                  <span id="helpBlock-rePass" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="emailUser">Email</label>
                  <input type="email" name="emailUser" class="form-control" id="emailUser" placeholder="Email" aria-describedby="helpBlock-email" required>
                  <span id="glyphicon-email" aria-hidden="true"></span>
                  <span id="helpBlock-email" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="reEmailUser">Confirmar Email</label>
                  <input type="email" name="reEmailUser" class="form-control" id="reEmailUser" placeholder="Confirmar Email" aria-describedby="helpBlock-reEmail" required>
                  <span id="glyphicon-reEmail" aria-hidden="true"></span>
                  <span id="helpBlock-reEmail" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="fNacUser">Fecha de Nacimiento</label>
                  <input type="date" name="fNacUser" class="form-control" id="fNacUser" placeholder="Fecha de Nacimiento" max="<?php echo $today ?>" min="1900-01-01" aria-describedby="helpBlock-fNac" required>
                  <span id="glyphicon-fNac" aria-hidden="true"></span>
                  <span id="helpBlock-fNac" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="numUser">Telefono</label>
                  <input type="text" name="numUser" class="form-control" id="numUser" placeholder="Telefono" aria-describedby="helpBlock-num" required>
                  <span id="glyphicon-num" aria-hidden="true"></span>
                  <span id="helpBlock-num" class="help-block"></span>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-default">Registrarse</button>
                  <button type="button" class="btn btn-default" href="index.php">Cancelar</button>
              </div>
          </form>
      </div>

    </body>

</html>