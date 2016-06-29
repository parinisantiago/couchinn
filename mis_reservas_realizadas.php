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
			$misReservasQuery="SELECT DATE_FORMAT(reserva.finicio, '%d-%m-%y') AS finicio, DATE_FORMAT(ffin, '%d-%m-%y') AS ffin, reserva.estado, reserva.id_reserva, couch.titulo FROM reserva INNER JOIN couch ON (reserva.id_couch=couch.id_couch) WHERE reserva.id_usuario='".$_SESSION["id_usuario"]."'";
    		$resultadomisReservas= mysqli_query($conexion, $misReservasQuery);
			echo("<div class=\"container\">
				<h2>Mis reservas realizadas:</h2>
			</div>");
			while ($row = mysqli_fetch_array($resultadomisReservas)){
		?>
				<div class="container">
		  		 <form class="form-inline" action="consultas/cancelar_reserva.php" method="POST">
  					
		  			<div class="well"><h4><?php echo("Couch: ".$row["titulo"]); ?></h4><br><?php echo("Fecha de reserva: ".$row["finicio"]." al ". $row["ffin"]. "<br> Estado: ". $row["estado"]); 
		  					if ($row["estado"] == 'En espera'){ ?>
		  						 
		  							<button type="submit" class="btn btn-link" style="color:blue;" name = "cancelar" id = "cancelar.<?php  echo($row["id_reserva"]); ?>" onclick="return confirm('¿Esta seguro de que desea cancelar la reserva?')" value="<?php  echo($row["id_reserva"]); ?>" > - Cancelar reserva -</button>
		  						</form>
		  					<?php	
		  					}	

		  				?>

		  		
		  		</div>
				</div>
			<?php
			}
			?>
		

	</body>

</html>
