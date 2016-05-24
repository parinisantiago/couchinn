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
		<title> el mejor couch </title>
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
				 <form class="form-horizontal" name="" method="post" onsubmit="return valNumTarjeta()" action="consultas/alta_premium.php">
              <div class="form-group form-inline">
                 <label class="control-label" for="nroTarjeta">Número de tarjeta: </label>
                  <input type="text" name="nroTarjeta" class="form-control" id="nroTarjeta" placeholder="Número de su tarjeta" aria-describedby="helpBlock-numTar" required>
                  <span id="glyphicon-numTar" aria-hidden="true"></span>
                  <span id="helpBlock-numTar" class="help-block"></span>
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