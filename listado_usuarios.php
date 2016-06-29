<?php	            	
	include_once("conectarBD.php");
	$query= "SELECT * FROM usuario WHERE (nombre LIKE '%".$_GET["nombre"]."%' AND apellido LIKE '%".$_GET["apellido"]."%' AND email LIKE '%".$_GET["email"]."%' AND telefono LIKE '%".$_GET["telefono"]."%')";
	$resultado= mysqli_query($conexion, $query);
	//Si no se arrojan resultados, se informa sobre lo ocurrido.
	if (mysqli_num_rows($resultado) == 0) { ?>
		<h4>No se encontraron usuarios que coincidan con los criterios de búsqueda establecidos.</h4>	
	<?php } ?>


<div class="list-group">
	
    <?php while ($row = mysqli_fetch_array($resultado))
    {?>
	
		<?php
			$nombre=$row["nombre"];
			$apellido=$row["apellido"];
			$email=$row["email"];
			$telefono=$row["telefono"];
			$id_usuario=$row["id_usuario"];
		//?>

		<a href="" class="list-group-item">	
			<div class="col-md-6">
				<h4 class="list-group-item-heading"><?php echo($nombre) ?></h4>
				<p class="list-group-item-text"><?php echo ("<strong>Descripción: </strong>".$apellido."<br> <strong>Ubicación: </strong>".$email."<br> <strong>Dirección: </strong>".$direccion."<br> <strong>telefono: </strong> para ".$telefono." personas. <br> <strong>Tipo: </strong>".$tipo); ?></p>
			</div>
	  	</a>		           
	<?php } ?>
</div>

	