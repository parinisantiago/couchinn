<?php	            	
	include_once("conectarBD.php");
	$query= "SELECT * FROM usuario WHERE (nombre LIKE '%".$_GET["nombre"]."%' AND apellido LIKE '%".$_GET["apellido"]."%' AND email LIKE '%".$_GET["email"]."%' AND telefono LIKE '%".$_GET["telefono"]."%')";
	$resultado= mysqli_query($conexion, $query);
	//Si no se arrojan resultados, se informa sobre lo ocurrido.
	if (mysqli_num_rows($resultado) == 0) { ?>
		<h4>No se encontraron usuarios que coincidan con los criterios de búsqueda establecidos.</h4>	
	<?php } ?>


<div class="list-group">
	<style>
	th, td {
	    padding: 15px;
	}
	</style>
	<table style="width:100%">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido</th> 
			<th>Email</th>
			<th>Telefono</th>
		</tr>
	    <?php while ($row = mysqli_fetch_array($resultado))
	    {?>
		
			<?php
				$nombre=$row["nombre"];
				$apellido=$row["apellido"];
				$email=$row["email"];
				$telefono=$row["telefono"];
				$id_usuario=$row["id_usuario"];
			//?>
			<form name ="formUsuarios" method ="post" action ="radioButton_listado_usuario.php">
			<tr>
	           	<input type="hidden" name="idUser" id="idUser" value=<?php echo($id_usuario)?>>
				<td><?php echo($row["id_usuario"]);?></td>
				<td><?php echo($row["nombre"]);?></td>
				<td><?php echo($row["apellido"]);?></td>
				<td><?php echo($row["email"]);?></td>
				<td><?php echo($row["telefono"]);?></td>
				<td><button title = "Eliminar Usuario" type="submit" name = "eliminarUsuario" id="eliminarUsuario" onclick="return confirm('¿Esta seguro de que desea Eliminar el Usuario?')" class="btn btn-warning btn-sm "><i class = "glyphicon glyphicon-remove"></i></button><button title = "Ver Couchs" type="submit" name = "verCouchs" id="verCouchs" class="btn btn-primary btn-sm "><i class = "glyphicon glyphicon-th-list"></i></button></td>
			</tr>
			</form>
						           
		<?php } ?>
	</table>
</div>

	