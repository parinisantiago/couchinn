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
		<?php $aDondeVolver = "index.php"; if (isset($_GET['msg'])) { ?>
					<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
						<?php echo($_GET['msg']); ?>
					</div>
				<?php } 
				if (isset($_GET["desde"]))
				{
					$aDondeVolver = "verPerfil.php";
				}
				?>
		<?php 
			include("navbar.php");
			include_once("conectarBD.php");
			$misReservasQuery="SELECT DATE_FORMAT(reserva.finicio, '%d-%m-%y') AS finicio, DATE_FORMAT(ffin, '%d-%m-%y') AS ffin, reserva.estado, reserva.id_reserva, couch.titulo, couch.id_couch, couch.eliminado_couch, couch.despublicado, couch.id_usuario FROM reserva INNER JOIN couch ON (reserva.id_couch=couch.id_couch) WHERE reserva.id_usuario='".$_SESSION["id_usuario"]."'";
    		$resultadomisReservas= mysqli_query($conexion, $misReservasQuery);
			if (mysqli_num_rows($resultadomisReservas) == 0){
				echo("<div class=\"container\"><h2>No ha realizado ninguna reserva.</h2></div>");
			} else{
				echo("<div class=\"container\"><h2>Mis reservas realizadas:</h2></div>");
			}		
			while ($row = mysqli_fetch_array($resultadomisReservas)){
		?>
				<div class="container">
			  		<form class="form-inline" action="consultas/cancelar_reserva.php" method="POST">
	  					
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
			  				if ($row["estado"] != 'Aceptada'){
			  					$datosDuenoQuery="SELECT nombre, apellido FROM usuario INNER JOIN couch ON (usuario.id_usuario='".$row["id_usuario"]."')";
    								$ejecucionDatosDueno= mysqli_query($conexion, $datosDuenoQuery);
    								$resultadoDatosDueno= mysqli_fetch_array($ejecucionDatosDueno);
    								echo("<strong>Dueño:</strong> ".$resultadoDatosDueno["nombre"]." ".$resultadoDatosDueno["apellido"]."<br>");
			  				}
			  				echo("<strong>Fecha de reserva:</strong> ".$row["finicio"]." al ". $row["ffin"]. "<br> <strong>Estado:</strong> ". $row["estado"]); 
			  					if ($row["estado"] == 'En espera'){ 
			  				?>
			  						 
					  				<button type="submit" class="btn btn-link" style="color:blue;" name = "cancelar" id = "cancelar.<?php  echo($row["id_reserva"]); ?>" onclick="return confirm('¿Esta seguro de que desea cancelar la reserva?')" value="<?php  echo($row["id_reserva"]); ?>" > - Cancelar reserva -
					  				</button>
							<?php	
								}

								//Si la reserva está aceptada muestro información del dueño del couch. 
								if ($row["estado"] == 'Aceptada'){ 
									$datosDuenoQuery="SELECT nombre, apellido, email, telefono FROM usuario INNER JOIN couch ON (usuario.id_usuario='".$row["id_usuario"]."')";
    								$ejecucionDatosDueno= mysqli_query($conexion, $datosDuenoQuery);
    								$resultadoDatosDueno= mysqli_fetch_array($ejecucionDatosDueno);

    								echo("<br><strong>Datos del dueño:</strong><br> <strong> * Nombre: </strong>".$resultadoDatosDueno["nombre"]." ".$resultadoDatosDueno["apellido"].
    									"<br><strong> * Email: </strong>".$resultadoDatosDueno["email"].
    									"<br><strong> * Teléfono: </strong>".$resultadoDatosDueno["telefono"]
    									);
								}

							?>	
						</div>
					</form>
			</div>
					<?php
						}
					?>
		<div class="container">
			<a class="btn btn-primary" href=<?php echo($aDondeVolver);?>>Volver</a>				
		</div>
	</body>

</html>
