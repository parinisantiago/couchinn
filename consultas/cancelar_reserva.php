<?php 
	
    include_once("../conectarBD.php");
    
	if (isset($_POST["cancelar"])){

        $queryDecisionReserva="UPDATE reserva SET estado='Cancelada' WHERE id_reserva='".$_POST["cancelar"]."'";
        mysqli_query($conexion, $queryDecisionReserva);
    }
    
    header("Location: ../mis_reservas_realizadas.php?msg=Su reserva ha sido cancelada satifactoriamente&&class=alert-success");
?>
