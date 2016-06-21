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
          <form class="form-horizontal" name="altaUsuario" method="post" onsubmit="return valUsuario()" action="consultas/alta_usuario.php">
              <div class="form-group">
                <span class="text-muted"><em><span style="color:red;">*</span> Estos campos son requeridos</em></span>
              </div>   
              <div class="form-group">
                 <label class="control-label" for="nomUser">Nombre<span style="color:red;">*</span></label>
                  <input type="text" name="nomUser" class="form-control" id="nomUser" placeholder="Juan" onkeypress="return isLetterKey(event)" maxlength="35" aria-describedby="helpBlock-nom" required>
                  <span id="glyphicon-nom" aria-hidden="true"></span>
                  <span id="helpBlock-nom" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="apUser">Apellido<span style="color:red;">*</span></label>
                  <input type="text" name="apUser" class="form-control" id="apUser" placeholder="Perez"  onkeypress="return isLetterKey(event)" maxlength="35" aria-describedby="helpBlock-ap" required>
                  <span id="glyphicon-ap" aria-hidden="true"></span>
                  <span id="helpBlock-ap" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="passUser">Contraseña<span style="color:red;">*</span></label>
                  <input type="password" name="passUser" class="form-control" id="passUser" placeholder="Contraseña" maxlength="15" aria-describedby="helpBlock-pass" required>
                  <span id="glyphicon-pass" aria-hidden="true"></span>
                  <span id="helpBlock-pass" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="rePassUser">Confirmar Contraseña<span style="color:red;">*</span></label>
                  <input type="password" name="rePassUser" class="form-control" id="rePassUser" maxlength="15" placeholder="Vuelva a escribir su contraseña" aria-describedby="helpBlock-rePass" required>
                  <span id="glyphicon-rePass" aria-hidden="true"></span>
                  <span id="helpBlock-rePass" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="emailUser">Email<span style="color:red;">*</span></label>
                  <input type="email" name="emailUser" class="form-control" id="emailUser" maxlength="30" placeholder="nombre_de_su_email@dominio.com" aria-describedby="helpBlock-email" required>
                  <span id="glyphicon-email" aria-hidden="true"></span>
                  <span id="helpBlock-email" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="reEmailUser">Confirmar Email<span style="color:red;">*</span></label>
                  <input type="email" name="reEmailUser" class="form-control" id="reEmailUser" maxlength="30" placeholder="Vuelva a escribir su Email" aria-describedby="helpBlock-reEmail" required>
                  <span id="glyphicon-reEmail" aria-hidden="true"></span>
                  <span id="helpBlock-reEmail" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="fNacUser">Fecha de Nacimiento<span style="color:red;">*</span></label>
                  <input type="date" name="fNacUser" class="form-control" id="fNacUser" placeholder="Fecha de Nacimiento" max="<?php echo $today ?>" min="1900-01-01" aria-describedby="helpBlock-fNac" required>
                  <span id="glyphicon-fNac" aria-hidden="true"></span>
                  <span id="helpBlock-fNac" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="numUser">Telefono<span style="color:red;">*</span></label>
                  <input type="text" name="numUser" class="form-control" id="numUser" onkeypress="return isNumberKey(event)" maxlength="25" placeholder="Ej: 542214800000 (No es necesario usar + ni - ni () ni espacios)" aria-describedby="helpBlock-num" required>
                  <span id="glyphicon-num" aria-hidden="true"></span>
                  <span id="helpBlock-num" class="help-block"></span>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Registrarse</button>
                  <a class="btn btn-primary" href="index.php">Cancelar</a>
              </div>
          </form>
      </div>

    </body>

</html>