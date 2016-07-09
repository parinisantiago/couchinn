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
			if (isset($_GET["f_incripcion"])){
					$listadoGananciasQuery="SELECT id_usuario,DATE_FORMAT(f_incripcion, '%d-%m-%y') AS f_incripcion FROM premium WHERE
						(f_incripcion BETWEEN '" . $_GET["f_incripcion"]. "' AND '" . $_GET["ffin"]. "')"; 

	    		$resultadoGananciasQuery= mysqli_query($conexion, $listadoGananciasQuery);

			}
				echo("<div class=\"container\">
				<h2>Listado de Ganancias:</h2>
			</div>");
			?>
			<div class="container">
			
                    <form class="form-inline" role="form" name="listadoAceptFinal" method="get" onsubmit="return valFechasListadoGanancias()">
                        <div class="form-group">    
                              <label class="control-label" for="f_incripcion">Desde: <span style="color:red;"> *</span></label>
                              <input type="date" name="f_incripcion" class="form-control" id="f_incripcion" value=<?php if (isset($_GET['f_incripcion']) && ($_GET["f_incripcion"] != null)){echo($_GET["f_incripcion"]);}?> placeholder="Desde" aria-describedby="helpBlock-f_incripcion"  required>
                           
						</div>
						<div class="form-group">
                              <label class="control-label" for="ffin">Hasta<span style="color:red;"> *</span></label>
                              <input type="date" name="ffin" class="form-control" id="ffin" value=<?php if (isset($_GET['ffin']) && ($_GET["ffin"] != null)){echo($_GET["ffin"]);}?> placeholder="Hasta" aria-describedby="helpBlock-ffin" required>

                              
                        </div>
                        <div class="form-group">
                              <button type="submit" class="btn btn-primary"><i class = "glyphicon glyphicon-list-alt"></i> Generar Listado</span></button>
                        </div>
                        <span id="helpBlock-ffin" class="help-block" style="color:red;"></span>

                    </form>
            </div>
        <?php
       		if (isset($_GET["f_incripcion"])){
       			$cant = mysqli_num_rows($resultadoGananciasQuery);
	       		if($cant == 0){
	       			echo("<div class=\"container\"><h4>No se encontraron ganancias para las fechas solicitadas</h4></div>");
	       		}
	       		else
	       		{
	       			$total = $cant*90;
	       			echo("<div class=\"container\"><h4>Sus ganancias totales para el periodo son: ".$total."</h4></div>");
	       		}	
			while ($row = mysqli_fetch_array($resultadoGananciasQuery)){
		?>
				<div class="container">
		  		 	
  					
		  			<div class="well well-sm">
		  			
		  			<?php 
		  				$datosUsuario="SELECT nombre, apellido FROM usuario WHERE id_usuario='".$row["id_usuario"]."'";
    								$ejecucionDatosUsuario= mysqli_query($conexion, $datosUsuario);
    								$resultadoDatosUsuario= mysqli_fetch_array($ejecucionDatosUsuario);
		  				echo("<strong>Usuario: </strong>".$resultadoDatosUsuario["nombre"]." ".$resultadoDatosUsuario["apellido"]."<br><strong>ID:</strong> ".$row["id_usuario"]); 
		  			?>
		  			<br>
		  			<?php echo("<strong>Fecha de inscripcion:</strong> ".$row["f_incripcion"]);

		  			?> 
		  		</div>
				</div>
			<?php
			}
		}
			?>
		

	</body>

</html>
