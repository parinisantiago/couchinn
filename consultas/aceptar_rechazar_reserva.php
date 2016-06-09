<?php 
	
    include_once("../conectarBD.php");
    
	if (isset($_POST["aceptar"])){

        $queryAceptarReserva="UPDATE reserva SET estado='Aceptada' WHERE id_reserva='".$_POST["aceptar"]."'";
    } 
    else{

        $queryAceptarReserva="UPDATE reserva SET estado='Rechazada' WHERE id_reserva='".$_POST["rechazar"]."'";
    }  
    mysqli_query($conexion, $queryAceptarReserva);
    header("Location: ../detalle_couch.php?id=".$_POST['idCouch']);
?>
