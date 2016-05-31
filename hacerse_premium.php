<?php session_start();
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
			<div class="container">
				<h1>Alta como usuario Premium</h1>
				<form class="form-horizontal" name="hacersePremium" method="post" onsubmit="return valNumTarjeta()" action="consultas/alta_premium.php">
	              	<div class="form-group form-inline">
	                 <label class="control-label" for="nroTarjeta">Número de tarjeta: </label>
	                  <input type="text" name="nroTarjeta" class="form-control" id="nroTarjeta" placeholder="Número de su tarjeta" aria-describedby="helpBlock-num" required>
	                  <span id="glyphicon-num" aria-hidden="true"></span>
	                  <span id="helpBlock-num" class="help-block"></span>
	              	</div>

	              	<div class="form-group">
	                  <label class="control-label" for="fechaCaducidad">Fecha Caducidad:</label>
	                  <input type="date" name="fechaCaducidad" class="form-control" id="fechaCaducidad" placeholder="Fecha de caducidad" aria-describedby="helpBlock-fNac" required>
	                  <span id="glyphicon-fNac" aria-hidden="true"></span>
	                  <span id="helpBlock-fNac" class="help-block"></span>
	              	</div>

	              	<div class="form-group form-inline">
	                 <label class="control-label" for="codSeguridad">Codigo de seguridad: </label>
	                  <input type="text" name="codSeguridad" class="form-control" id="codSeguridad" placeholder="Codigo de seguridad" aria-describedby="helpBlock-num" required>
	                  <span id="glyphicon-num" aria-hidden="true"></span>
	                  <span id="helpBlock-num" class="help-block"></span>
	              	</div>

	              	<div class="form-group form-inline">
	                 <label class="control-label" for="titular">Titular: </label>
	                  <input type="text" name="titular" class="form-control" id="titular" placeholder="Nombre del titular" aria-describedby="helpBlock-nom" required>
	                  <span id="glyphicon-nom" aria-hidden="true"></span>
	                  <span id="helpBlock-nom" class="help-block"></span>
	              	</div>

	              	<div class="form-group form-inline">
	                 <label class="control-label" for="direccion">Direccion: </label>
	                  <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion del titular" aria-describedby="helpBlock-nom" required>
	                  <span id="glyphicon-nom" aria-hidden="true"></span>
	                  <span id="helpBlock-nom" class="help-block"></span>
	              	</div>

	              	<div class="form-group form-inline">
	                 <label class="control-label" for="ciudad">Ciudad: </label>
	                  <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ciudad del titular" aria-describedby="helpBlock-nom" required>
	                  <span id="glyphicon-nom" aria-hidden="true"></span>
	                  <span id="helpBlock-nom" class="help-block"></span>
	              	</div>

	              	<div class="form-group form-inline">
	                 <label class="control-label" for="provincia">Provincia: </label>
	                  <input type="text" name="provincia" class="form-control" id="provincia" placeholder="Provincia del titular" aria-describedby="helpBlock-nom" required>
	                  <span id="glyphicon-nom" aria-hidden="true"></span>
	                  <span id="helpBlock-nom" class="help-block"></span>
	              	</div>

	              	<div class="form-group form-inline">
	                 <label class="control-label" for="codPostal">Codigo postal: </label>
	                  <input type="text" name="codPostal" class="form-control" id="codPostal" placeholder="Codigo postal" aria-describedby="helpBlock-num" required>
	                  <span id="glyphicon-num" aria-hidden="true"></span>
	                  <span id="helpBlock-num" class="help-block"></span>
	              	</div>

	              	<div class="form-group form-inline">
	                 <label class="control-label" for="importe">Importe en pesos: </label>
	                  <input type="text" name="importe" class="form-control" id="importe" placeholder="90" aria-describedby="helpBlock-num" disabled>
	                  <span id="glyphicon-num" aria-hidden="true"></span>
	                  <span id="helpBlock-num" class="help-block"></span>
	              	</div>
             
	              	<div class="form-group">
	                  	<button type="submit" class="btn btn-default">Hacerme Premium</button>
	                  	<button type="button" class="btn btn-default" href="index.php">Cancelar</button>
	              	</div>
          		</form>

			</div>
		</div>
	</body>

</html>
	<?php
	//si no esta loggueado redirige al usuario al index y le manda por get el mensaje correspondiente y setea al error como un warning
} else {
	header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
}?>