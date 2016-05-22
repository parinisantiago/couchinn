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
				 <form class="form-horizontal" name="" method="post" onsubmit="" action="consultas/alta_premium.php">
              <div class="form-group form-inline">
                 <label class="control-label" for="nroTarjeta">Número de tarjeta: </label>
                  <input type="text" name="nroTarjeta" class="form-control" id="nroTarjeta" placeholder="Número de su tarjeta" aria-describedby="helpBlock-nom" required>
                  <span id="glyphicon-nom" aria-hidden="true"></span>
                  <span id="helpBlock-nom" class="help-block"></span>
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
