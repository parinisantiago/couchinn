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
		<?php if (isset($_GET['msg'])) { ?>
					<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
						<?php echo($_GET['msg']); ?>
					</div>
				<?php } ?>
		<?php 
			include("navbar.php");
			include_once("conectarBD.php");
			if (isset($_GET["finicio"])){
				$listadoAceptadasFinalizadasQuery="SELECT titulo,DATE_FORMAT(reserva.finicio, '%d-%m-%y') AS finicio,  DATE_FORMAT(reserva.ffin, '%d-%m-%y') AS ffin, reserva.id_couch, reserva.estado, usuario.nombre AS huespedNombre, usuario.apellido AS huespedApellido, couch.eliminado_couch, couch.despublicado, couch.id_usuario FROM  couch INNER JOIN reserva INNER JOIN usuario ON (reserva.id_usuario=usuario.id_usuario AND couch.id_couch=reserva.id_couch) WHERE (estado='Finalizada' OR estado='Aceptada') AND ((finicio BETWEEN '" . $_GET["finicio"]. "' AND '" . $_GET["ffin"]. "') OR (ffin BETWEEN '" . $_GET["finicio"]. "' AND '" . $_GET["ffin"]. "') OR ('" . $_GET["finicio"]. "' BETWEEN finicio AND ffin) OR ('" . $_GET["ffin"]. "' BETWEEN finicio AND ffin))"; 

	    		$resultadoAceptadasFinalizadas= mysqli_query($conexion, $listadoAceptadasFinalizadasQuery);

			}
				echo("<div class=\"container\">
				<h2>Listado de reservas finalizadas y aceptadas:</h2>
			</div>");
			?>
			<div class="container">
			
                    <form class="form-inline" role="form" name="listadoAceptFinal" method="get" onsubmit="return valFechasListado()">
                        <div class="form-group">    
                              <label class="control-label" for="finicio">Desde: <span style="color:red;"> *</span></label>
                              <input type="date" name="finicio" class="form-control" id="finicio" value="<?php if (isset($_GET['finicio']) && ($_GET["finicio"] != null)){echo($_GET["finicio"]);}?>" placeholder="Desde" aria-describedby="helpBlock-finicio"  required>
                           
						</div>
						<div class="form-group">
                              <label class="control-label" for="ffin">Hasta<span style="color:red;"> *</span></label>
                              <input type="date" name="ffin" class="form-control" id="ffin" value="<?php if (isset($_GET['ffin']) && ($_GET["ffin"] != null)){echo($_GET["ffin"]);}?>" placeholder="Hasta" aria-describedby="helpBlock-ffin" required>

                              
                        </div>
                        <div class="form-group">
                              <button type="submit" class="btn btn-primary"><i class = "glyphicon glyphicon-list-alt"></i> Generar Listado</span></button>
                        </div>
                        <span id="helpBlock-ffin" class="help-block" style="color:red;"></span>

                    </form>
            </div>
        <?php
       		if (isset($_GET["finicio"])){

       		if(mysqli_num_rows($resultadoAceptadasFinalizadas) == 0){
       			echo("<div class=\"container\"><h4>No se encontraron reservas finalizadas ni aceptadas para las fechas solicitadas</h4></div>");
       		}	
			while ($row = mysqli_fetch_array($resultadoAceptadasFinalizadas)){
		?>
				<div class="container">
		  		 	
  					
		  			<div class="well well-sm">
		  			
		  			<h4>
			  			<a href="detalle_couch.php?id=<?php echo($row["id_couch"]); ?>">
			  			<?php 
			  				echo("Couch: ".$row["titulo"]); 
			  				if ($row["eliminado_couch"] == 1){
			  					echo ("<font style=\"color:red;\">(Eliminado)</font>");
			  				} 
			  				if ($row["despublicado"] == 1){
			  					echo ("<font style=\"color:orange;\">(Despublicado)</font>");
			  				}
			  			?>
			  			</a>
			  		</h4>
		  			
		  			<?php 
		  				$datosDuenoQuery="SELECT nombre, apellido FROM usuario INNER JOIN couch ON (usuario.id_usuario='".$row["id_usuario"]."')";
    								$ejecucionDatosDueno= mysqli_query($conexion, $datosDuenoQuery);
    								$resultadoDatosDueno= mysqli_fetch_array($ejecucionDatosDueno);
		  				echo("<strong>Dueño: </strong>".$resultadoDatosDueno["nombre"]." ".$resultadoDatosDueno["apellido"]."<br><strong>Huesped:</strong> ".$row["huespedNombre"]." ".$row["huespedApellido"]); 
		  			?>
		  			<br>
		  			<?php echo("<strong>Fecha de reserva:</strong> ".$row["finicio"]." al ". $row["ffin"]. "
		  			<br><strong>Estado:</strong> ". $row["estado"]);

		  			?> 
		  		</div>
				</div>
			<?php
			}
		}
			?>
		

	</body>

</html>
