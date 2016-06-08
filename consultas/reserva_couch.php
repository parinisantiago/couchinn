<?php 
	session_start();
	include_once("../conectarBD.php");
	$fDesde = $_POST['fIng'];
	$fHasta = $_POST['fEgre'];
	echo($_POST['fIng'].$_POST['fEgre'].$_POST['id_couch']);
	$queryReservar="SELECT * FROM reserva WHERE (('".$fDesde."' BETWEEN finicio AND fFin) OR ('".$fHasta."' BETWEEN finicio AND fFin) OR (finicio BETWEEN '".$fDesde."' AND '".$fHasta."') OR (ffin BETWEEN '".$fDesde."' AND '".$fHasta."')) AND (id_couch='".$_POST["id_couch"]."')";
    $resultadoReservar= mysqli_query($conexion, $queryReservar);
    
    //Si no hay reservas para las fechas solicitadas, carga la solicitud
    if((mysqli_num_rows($resultadoReservar) == 0)){
    	$queryHacerReserva="INSERT INTO reserva (id_usuario,id_couch,finicio,ffin,estado) VALUES ('".$_SESSION["id_usuario"]."', '".$_POST["id_couch"]."', '".$fDesde."','".$fHasta."', 'En espera')";
    	mysqli_query($conexion, $queryHacerReserva);
    	$msg="Se ha enviado su solicitud de reserva correctamente";
    	$class="alert-success";
    }
    else{
    	$class="alert-danger";
    	$msg="No hay disponibilidad para las fechas seleccionadas. Su solicitud no pudo ser enviada";	
    }

    header("Location: ../detalle_couch.php?id=".$_POST['id_couch']."&&class=".$class."&&msg=".$msg);
?>