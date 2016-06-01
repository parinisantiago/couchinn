<?php session_start();
if( isset($_SESSION['sesion_usuario']) ){
	if( isset($_SESSION['admin'])) {
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

			<title> Couchinn </title>
		</head>

		<body>

		<?php include("navbar.php"); ?>
		<div class="container">
			<div class="panel panel-primary">
			<div class="panel-heading">
				Seleccione un tipo y luego decida que hacer con el
			</div>
			<?php if (isset($_GET['msg'])) { ?>
				<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
					<?php echo($_GET['msg']); ?>
				</div>
			<?php } ?>
				<div class="panel-body">
			<form name ="form1" method ="post" action ="radioButton.php">
			<?php
			include_once("conectarBD.php");
			//despues cambiar from usuario por from admin
			//$query = "SELECT * FROM admin WHERE id_admin='" . $_SESSION['id_usuario'] . "'"; esto no es necesario, ya se sabe que es un administrador
			//$result = mysqli_query($conexion, $query);
			//if (mysqli_num_rows($result) == 1) {
				//selecciona solo los que no estan eliminados lógicamente.
				$query = "SELECT nombre_tipo FROM tipo WHERE eliminado=0";
				$result = mysqli_query($conexion, $query);
				$temp = 1;
				while ($row = mysqli_fetch_array($result)) {
					//Guardo los datos de la BD en las variables de php
					$nombre = $row["nombre_tipo"];
					//Alto hack para listar los tipos para poder seleccionarlos y que se autocomplete el campo de modificacion
					if ($temp == 1){?>
             			<input type='radio' checked name='nomTipoAModificar' value= <?php echo($nombre);?>> <?php echo($nombre); ?> <br>
             			<?php $temp = 0; ?>
             		<?php	} else {?>
             			<input type='radio'  name='nomTipoAModificar' value= <?php echo($nombre);?>> <?php echo($nombre); ?> <br>
             		<?php	} ?>
				<?php	} ?>
			</div>
			<div class="panel-footer">
			<div class="form-group " id="buttons-tipo-couch">
                <button type="submit" name = "Eliminar" class="btn btn-default">Eliminar</button>
                <button type="submit" name = "Modificar" class="btn btn-default">Modificar</button>
                <a class="btn btn-default" href="index.php">Cancelar</a>
            </div>
			</div>
            </form>

			</div>
		</div>
		</body>

		</html>


		<?php
		//si esta loggueado y no es administrador devuelve este error
	}else{
		header("Location: index.php?msg=solo los administradores pueden acceder a esta página&&class=alert-danger");
	}
	//si no esta loggueado redirige al usuario al index y le manda por get el mensaje correspondiente y setea al error como un warning
	} else {
		header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
}?>