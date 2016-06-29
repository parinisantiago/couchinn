<?php
    session_start();
    include_once("conectarBD.php");
    $queryTieneReserva = "SELECT * FROM reserva WHERE id_couch='".$_POST['couch']."'"; //ME FIJO SI TIENE RESERVA
    $resultado = mysqli_query($conexion, $queryTieneReserva);
    if (mysqli_num_rows($resultado) > 0) //SI HAY RESERVAS
    {
    	//CHEQUEAR QUE TENGA SOLO FINALIZADAS (Eliminar)
    	//CHEQUEAR QUE TENGA AL MENOS UNA ACEPTADA PERO NO FINALIZADA (Despublicar)
    	//CHEQUEAR QUE NO TENGA FINALIZADA NI ACEPTADA Y QUE TENGA EN ESPERA O VENCIDAS (Eliminar)
    	$updateHayFinalizadas="SELECT * FROM reserva WHERE id_couch='".$_POST['couch']."' AND estado = 'Finalizada'";
		$cantFinalizadas = mysqli_num_rows(mysqli_query($conexion, $updateHayFinalizadas));

   		$updateHayEnEspera="SELECT * FROM reserva WHERE id_couch='".$_POST['couch']."' AND estado = 'En espera'";
		$cantHayEnEspera = mysqli_num_rows(mysqli_query($conexion, $updateHayEnEspera));

   		$updateHayAceptadas="SELECT * FROM reserva WHERE id_couch='".$_POST['couch']."' AND estado = 'Aceptada'";
   		$cantHayAceptadas = mysqli_num_rows(mysqli_query($conexion, $updateHayAceptadas));
   		
   		if($cantFinalizadas > 0 && $cantHayAceptadas == 0 && $cantHayEnEspera == 0)
   		{
   			$update="UPDATE couch SET eliminado_couch=1 WHERE id_couch='".$_POST['couch']."'";
	    	mysqli_query($conexion,$update);
	    	header("Location: ../index.php?msg=Su couch se ha Eliminado correctamente&&class=alert-success");
   		}
   		else if ($cantHayAceptadas > 0)
   		{
   			$update="UPDATE couch SET despublicado=1 WHERE id_couch='".$_POST['couch']."'";
	    	mysqli_query($conexion,$update);
	    	header("Location: ../index?msg=No se ha podido eliminar su couch porque tiene reservas Aceptadas que todavia no han Finalizado. Su couch ha sido Despublicado&&class=alert-warning");
   		}
   		else if ($cantHayEnEspera > 0)
   		{
   			$update="UPDATE couch SET eliminado_couch=1 WHERE id_couch='".$_POST['couch']."'";
	    	mysqli_query($conexion,$update);
	    	$update="UPDATE reserva SET estado='Rechazada' WHERE id_couch='".$_POST['couch']."' and estado = 'En espera'";
	    	mysqli_query($conexion,$update);
	    	header("Location: ../index?msg=Su couch se ha Eliminado correctamente, y todas las sus Reservas pendientes de aceptacion fueron Rechazadas&&class=alert-warning");
   		}
   		else //SI SOLO HAY RECHAZADAS O VENCIDAS
   		{
   			$update="UPDATE couch SET eliminado_couch=1 WHERE id_couch='".$_POST['couch']."'";
	    	mysqli_query($conexion,$update);
	    	header("Location: ../index?msg=Su couch se ha Eliminado correctamente&&class=alert-success");
   		}
    	
    }
    else
    {
	    $update="UPDATE couch SET eliminado_couch=1 WHERE id_couch='".$_POST['couch']."'";
	    mysqli_query($conexion,$update);
	    header("Location: ../index?msg=Su couch se ha eliminado correctamente&&class=alert-success");
	}

    