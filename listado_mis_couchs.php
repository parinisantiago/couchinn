<?php session_start();
if( isset($_SESSION['sesion_usuario']) ){?>
		<!DOCTYPE html>
		<html>

		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<link href="default.css" rel="stylesheet"><link rel="icon" href="img/logo.png">
			<script src="js/jquery.min.js"></script>
			<script src="bootstrap/js/bootstrap.min.js"></script>

			<title> Couchinn </title>
		</head>

		<body>
		<body onload="deshabilitarOnLoad();">	
		<?php include("navbar.php"); ?>
		<div class="container">
			<div class="panel panel-primary">
			<div class="panel-heading">
				Seleccione un couch y luego decida que hacer con el
			</div>
			<?php if (isset($_GET['msg'])) { ?>
				<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
					<?php echo($_GET['msg']); ?>
				</div>
			<?php } ?>
				<div class="panel-body">
			<form name ="form1" method ="post" action ="radioButton_listado_couch.php">
			<?php
			include_once("conectarBD.php");
				//selecciona solo los que no estan eliminados lógicamente.
				$query = "SELECT titulo,id_couch,despublicado FROM couch WHERE eliminado_couch=0 AND id_usuario = ".$_SESSION["id_usuario"]."";
				$result = mysqli_query($conexion, $query);
				$temp = 1;
				$noEntro = true;
				while ($row = mysqli_fetch_array($result)) {
					$noEntro = false;
					//Guardo los datos de la BD en las variables de php
					$nombre = $row["titulo"];
					$des = 0;
					if ($row["despublicado"] == 0){
						$nombre = $nombre." <font color='green'>(PUBLICADO)</font>";
					}
					else
					{
						$nombre = $nombre." <font color='red'>(DESPUBLICADO)</font>";
						$des = 1;
					}
					//Alto hack para listar los tipos para poder seleccionarlos y que se autocomplete el campo de modificacion
					if ($temp == 1){?>
             			<input type='radio' id = "<?php echo($des); ?>" onclick = "deshabilitar(this)" checked name="couch" value= "<?php echo($row["id_couch"]);?>"> <?php echo($nombre); ?> <br>
             			<?php $temp = 0; ?>
             		<?php	} else {?>
             			<input type='radio' id = "<?php echo($des); ?>" onclick = "deshabilitar(this)" name="couch" value= "<?php echo($row["id_couch"]);?>"> <?php echo($nombre); ?> <br>
             		<?php	} ?>
				<?php	}
					if ($noEntro) //AFUERA DEL WHILE SI NO ENTRO AL WHILE QUIERE DECIR QUE NO HABIA COUCHS PUBLICADOS
					{?>
						<p>USTED NO TIENE COUCHS PUBLICADOS EN ESTE MOMENTO</p>
					<?php }
				 ?>
			</div>
			<div class="panel-footer">
			<div class="form-group " id="buttons-tipo-couch">
				<button type="submit" name = "Eliminar" onclick="return confirm('¿Esta seguro de que desea Eliminar el couch?')" class="btn btn-default">Eliminar</button>
                <button type="submit" name = "Despublicar" id = "Despublicar" onclick="return confirm('¿Esta seguro de que desea Despublicar el couch?')" class="btn btn-default">Despublicar</button>
                <button type="submit" name = "Publicar" id = "Publicar" onclick="return confirm('¿Esta seguro de que desea Publicar el couch?')" class="btn btn-default">Publicar</button>
                <button type="submit" name = "Modificar" onclick="return confirm('¿Esta seguro de que desea Modificar el couch?')" class="btn btn-default">Modificar</button>
                <a class="btn btn-default" href="index.php">Cancelar</a>
            </div>
            <script>
            	function deshabilitar(obj)
            	{
            		if (obj.id == "1")
            		{
						document.getElementById("Despublicar").disabled = true;
            		}
            		else
            		{
            			document.getElementById("Despublicar").disabled = false;
            		}
            		
            	}
            	function deshabilitarOnLoad() //Checkea onLoad (llamado desde el principio del <body>) si todos los couch estan despublicados
            	{							  //si lo estan deshabilita de una el boton
            		var vrows = document.getElementsByName("couch"); //Obtengo todos los radio buttion
            		var todosDespublicados = true;
            		if (vrows[0].id == 1)
            		{
            			document.getElementById("Despublicar").disabled = true; //Si el primero esta despublicado ya pone en disabled el Despublicar

            		}
            		for (i = 0; i < vrows.length; i++)
            		{ 
					    if (vrows[i].id == 0)
					    {
					    	todosDespublicados = false;
					    	break;
					    }
					}
            		if (todosDespublicados)
            		{
            			document.getElementById("Despublicar").disabled = true;
            		}
            	}
            </script>
			</div>
            </form>

			</div>
		</div>
		</body>

		</html>


		<?php
	//si no esta loggueado redirige al usuario al index y le manda por get el mensaje correspondiente y setea al error como un warning
	} else {
		header("Location: index.php?msg=Debe estar logueado para ver esta pagina&&class=alert-warning");
}?>