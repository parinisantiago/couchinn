<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
   		<meta http-equiv="X-UA-Compatible" content="IE=edge">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="default.css" rel="stylesheet"><link rel="icon" href="img/logo.png">
        <link rel="icon" href="img/logo.png">
		<script src="js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="js/altaValidaciones.js"></script>

		<title> Couchinn </title>
	</head>

	<body>

		<?php 
			include("navbar.php");?>
		<div class="container">
			<?php if (isset($_GET['msg'])) { ?>
					<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
						<?php echo($_GET['msg']); ?>
					</div>
				<?php } ?>
			<div class="col-md-3">
				

				<?php include("busqueda_personalizada_usuarios.php");?>
			</div>

			<div class="col-md-9">
				<!-- Se muestra un listado de todos los couchs publicados --> 
				<span style="color:#95ac3b;">
					<?php 
					if ($_GET["nombre"] != ""){ echo("Nombre-> ".$_GET["nombre"]." |||| "); } 
					if ($_GET["apellido"] != ""){ echo("Apellido -> ".$_GET["apellido"]." |||| "); } 
					if ($_GET["email"] != ""){ echo("Email -> ".$_GET["email"]." |||| "); } 
					if ($_GET["telefono"] != ""){ echo("Telefono-> ".$_GET["telefono"]." personas |||| "); } ?>
				</span>
				<?php include("listado_usuarios.php");?>
		        <!-- Fin de se muestra un listado de todos los couchs publicados --> 
		        </div>
			</div>	
		</div>

	</body>

</html>
