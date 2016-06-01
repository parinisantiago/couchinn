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
          <form class="form-horizontal" name="nomTipo" method="post" onsubmit="return valTipoHospedaje()" action="consultas/alta_tipo_hospedaje.php">
              <div class="form-group">
                 <label class="control-label" for="nomTipo">Nuevo tipo de hospedaje</label>
                  <input type="text" name="nomTipo" class="form-control" id="nomTipo" maxlength="30" placeholder="Nombre" aria-describedby="helpBlock-nom" required>
                  <span id="glyphicon-nom" aria-hidden="true"></span>
                  <span id="helpBlock-nom" class="help-block"></span>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-default">Agregar</button>
                  <a class="btn btn-default" href="index.php">Cancelar</a>
              </div>
          </form>
      </div>

    </body>

</html>