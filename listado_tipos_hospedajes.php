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
		<?php
			include_once("conectarBD.php");
			//despues cambiar from usuario por from admin
			$query="SELECT * FROM usuario WHERE id_usuario='".$_SESSION['id_usuario']."'";
        	$result=mysqli_query($conexion,$query);
        	if (mysqli_num_rows($result) == 1){
        		$query="SELECT nombre FROM tipo";
        		$result=mysqli_query($conexion,$query);
        		while($row = mysqli_fetch_array($result)){
					//Guardo los datos de la BD en las variables de php
					$nombre = $row["nombre"];
					echo " · ";
					echo($nombre);
					echo("<br>");
					  	
				}
        	}
        	else{
        		echo("Necesita ser administrador para acceder al listado");
        	}
			
			?>
		</div>
	</body>

</html>



<?php
	//si no esta loggueado redirige al usuario al index y le manda por get el mensaje correspondiente y setea al error como un warning
	} else {
		header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
}?>