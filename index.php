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
			<div class="col-md-12">
				<!-- Busqueda simple --> 
					<form class="form-inline" role="form" method="GET" action="index.php">
	                          <input type="text" class="form-control" name="titulo" id="titulo" method="GET" action="index.php" placeholder="¿Qué estás buscando?" />
	                          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
	                        </form>
	            <!-- Fin de Busqueda simple -->     
	        </div>    
		</div>	
		<div class="row"><hr></div>
		<div class="container">
			<?php if (isset($_GET['msg'])) { ?>
					<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
						<?php echo($_GET['msg']); ?>
					</div>
				<?php } ?>
			<div class="col-md-3">
				

				<?php include("busqueda_personalizada.php");?>
			</div>

			<div class="col-md-9">
				
 				<!-- Se muestra un listado de todos los couchs publicados --> 
+				<span style="color:#95ac3b;">
+					<?php 
+					//Muestra los criterios de búsqueda elegidos en los resultados.
+					if (($_GET["titulo"] != "") OR ($_GET["Descripcion"] != "") OR ($_GET["tipo"] != "Cualquiera" AND $_GET["tipo"] != "") OR ($_GET["tipo"] != "") OR ($_GET["ubicacion"] != "") OR ($_GET["caṕacidad"] != "")){ echo("Resultados de su búsqueda: ");}
+					if ($_GET["titulo"] != ""){ echo("Titulo-> ".$_GET["titulo"]." , "); } 
+					if ($_GET["descripcion"] != ""){ echo("Descripcion -> ".$_GET["descripcion"]." , "); } 
+					if ($_GET["tipo"] != "Cualquiera" AND $_GET["tipo"] != ""){ echo("Tipo-> ".$_GET["tipo"]." , "); } 
+					if ($_GET["ubicacion"] != ""){ echo("Ubicacion -> ".$_GET["ubicacion"]." , "); } 
+					if ($_GET["capacidad"] != ""){ echo("Capacidad-> ".$_GET["capacidad"]." personas , "); } ?>
+				</span>
				<!-- Se muestra un listado de todos los couchs publicados --> 
				<?php include("listado_hospedajes.php");?>
		        <!-- Fin de se muestra un listado de todos los couchs publicados --> 
		        </div>
			</div>	
		</div>

	</body>

</html>
