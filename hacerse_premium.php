<?php $today= date('Y-m-d');?>
<?php
session_start();
if( isset($_SESSION['sesion_usuario']) ){
?>
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
		<title>Couchinn</title>
	</head>

	<body>

		<?php include("navbar.php"); ?>
		<div class="container">
			<?php if (isset($_GET['msg'])) { ?>
				<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
					<?php echo($_GET['msg']); ?>
				</div>
			<?php } ?>
			<form class="form-horizontal" name="hacersePremium" method="post" onsubmit="return valNumTarjeta()" action="consultas/alta_premium.php">
				<h3>Tipo de Tarjeta</h3>
				<input type='radio' name='tipoTarjeta' value="Visa" checked> Visa
				<input type='radio' name='tipoTarjeta' value="Mastercard"> Mastercard 
				<input type='radio' name='tipoTarjeta' value="American Express"> American Express  
              <div class="form-group">
                 <label class="control-label" for="nroTarjeta">Numero Tarjeta</label>
                  <input type="text" name="nroTarjeta" class="form-control" id="nroTarjeta" placeholder="Numero tarjeta" aria-describedby="helpBlock-num" required>
                  <span id="glyphicon-num" aria-hidden="true"></span>
                  <span id="helpBlock-num" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="fechaCaducidad">Fecha de Caducidad</label>
                  <input type="date" name="fechaCaducidad" class="form-control" id="fechaCaducidad" placeholder="Fecha de Caducidad" min="<?php echo $today ?>" max="2030-01-01"  aria-describedby="helpBlock-fNac" required>
                  <span id="glyphicon-fNac" aria-hidden="true"></span>
                  <span id="helpBlock-fNac" class="help-block"></span>
              </div>
              <div class="form-group">
                 <label class="control-label" for="codSeguridad">Codigo de seguridad</label>
                  <input type="text" name="codSeguridad" class="form-control" id="codSeguridad" placeholder="Codigo de seguridad" aria-describedby="helpBlock-codSeguridad" required>
                  <span id="glyphicon-codSeguridad" aria-hidden="true"></span>
                  <span id="helpBlock-codSeguridad" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="titular">Tituar</label>
                  <input type="text" name="titular" class="form-control" id="titular" placeholder="Nombre" aria-describedby="helpBlock-titular" required>
                  <span id="glyphicon-titular" aria-hidden="true"></span>
                  <span id="helpBlock-titular" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="direccion">Direccion</label>
                  <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion" aria-describedby="helpBlock-direccion" required>
                  <span id="glyphicon-direccion" aria-hidden="true"></span>
                  <span id="helpBlock-direccion" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="ciudad">Ciudad</label>
                  <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ciudad" aria-describedby="helpBlock-ciudad" required>
                  <span id="glyphicon-ciudad" aria-hidden="true"></span>
                  <span id="helpBlock-ciudad" class="help-block"></span>
              </div>
              <div class="form-group">
                  <label class="control-label" for="provincia">Provincia</label>
                  <input type="text" name="provincia" class="form-control" id="provincia" placeholder="Provincia" aria-describedby="helpBlock-provincia" required>
                  <span id="glyphicon-provincia" aria-hidden="true"></span>
                  <span id="helpBlock-provincia" class="help-block"></span>
              </div>
              <div class="form-group">
                 <label class="control-label" for="codPostal">Codigo Postal</label>
                  <input type="text" name="codPostal" class="form-control" id="codPostal" placeholder="Codigo Postal" aria-describedby="helpBlock-codPostal" required>
                  <span id="glyphicon-codPostal" aria-hidden="true"></span>
                  <span id="helpBlock-codPostal" class="help-block"></span>
              </div>
              <div class="form-group">
                 <label class="control-label" for="importe">Importe en pesos: </label>
                  <input type="text" name="importe" class="form-control" id="importe" placeholder="90" aria-describedby="helpBlock-importe" disabled>
                  <span id="glyphicon-importe" aria-hidden="true"></span>
                  <span id="helpBlock-importe" class="help-block"></span>
              </div>

              <div class="form-group">
                  <button type="submit" name = "hacersePremium" class="btn btn-default">Registrarse</button>
                  <button type="button" class="btn btn-default" href="index.php">Cancelar</button>
              </div>
          </form>
		</div>
	</body>

</html>
	<?php
	//si no esta loggueado redirige al usuario al index y le manda por get el mensaje correspondiente y setea al error como un warning
} else {
	header("Location: index.php?msg=Debe estar logueado para ver esta pagina&&class=alert-warning");
}?>