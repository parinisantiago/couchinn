<?php
    session_start();
    include_once("conectarBD.php");

    //ELIMINAR USUARIO
    //'<font color='red'> (ELIMINADO)</font>'
    $update="UPDATE usuario SET eliminado=1, apellido = concat(apellido, '<font color=\'red\'> (ELIMINADO)</font>') WHERE id_usuario='".$_POST['idUser']."'";
    mysqli_query($conexion,$update);
    

    //TOMA TODOS LOS COUCHS, LOS ELIMINA Y ADEMAS SE FIJA QUE HACER CON LAS RESERVAS PARA CADA COUCH DEL USUARIO
    $queryTodosCouchsUsuario = "SELECT * FROM couch WHERE id_usuario ='".$_POST['idUser']."' AND eliminado_couch = 0";
    $resultadoTodosCouchsUsuario = mysqli_query($conexion, $queryTodosCouchsUsuario);

    $totalRechazadas = 0;
    $totalEliminados = 0;
    $totalDespublicados = 0;
    //PARA CADA COUCH VE QUE HACER CON LAS RESERVAS
    while ($couch = mysqli_fetch_array($resultadoTodosCouchsUsuario))
    {
      $queryTieneReserva = "SELECT * FROM reserva WHERE id_couch='".$couch["id_couch"]."'"; //ME FIJO SI TIENE RESERVA
      $resultado = mysqli_query($conexion, $queryTieneReserva);
      if (mysqli_num_rows($resultado) > 0) //SI HAY RESERVAS
      {
        //CHEQUEAR QUE TENGA SOLO FINALIZADAS (Eliminar)
        //CHEQUEAR QUE TENGA AL MENOS UNA ACEPTADA PERO NO FINALIZADA (Despublicar)
        //CHEQUEAR QUE NO TENGA FINALIZADA NI ACEPTADA Y QUE TENGA EN ESPERA O VENCIDAS (Eliminar)
        $updateHayFinalizadas="SELECT * FROM reserva WHERE id_couch='".$couch["id_couch"]."' AND estado = 'Finalizada'";
        $cantFinalizadas = mysqli_num_rows(mysqli_query($conexion, $updateHayFinalizadas));

        $updateHayEnEspera="SELECT * FROM reserva WHERE id_couch='".$couch["id_couch"]."' AND estado = 'En espera'";
        $cantHayEnEspera = mysqli_num_rows(mysqli_query($conexion, $updateHayEnEspera));

        $updateHayAceptadas="SELECT * FROM reserva WHERE id_couch='".$couch["id_couch"]."' AND estado = 'Aceptada'";
        $cantHayAceptadas = mysqli_num_rows(mysqli_query($conexion, $updateHayAceptadas));
        
        if($cantFinalizadas > 0 && $cantHayAceptadas == 0 && $cantHayEnEspera == 0)
        {
          $update="UPDATE couch SET eliminado_couch=1 WHERE id_couch='".$couch["id_couch"]."'";
          $totalEliminados ++;
          mysqli_query($conexion,$update);
        }
        else if ($cantHayAceptadas > 0)
        {
          $update="UPDATE couch SET despublicado=1 WHERE id_couch='".$couch["id_couch"]."'";
          $totalDespublicados ++;
          mysqli_query($conexion,$update);
        }
        else if ($cantHayEnEspera > 0)
        {
          $update="UPDATE couch SET eliminado_couch=1 WHERE id_couch='".$couch["id_couch"]."'";
          mysqli_query($conexion,$update);
          $update="UPDATE reserva SET estado='Rechazada' WHERE id_couch='".$couch["id_couch"]."' and estado = 'En espera'";
          $totalEliminados ++;
          $totalRechazadas ++;
          mysqli_query($conexion,$update);
        }
        else //SI SOLO HAY RECHAZADAS O VENCIDAS
        {
          $update="UPDATE couch SET eliminado_couch=1 WHERE id_couch='".$couch["id_couch"]."'";
          $totalEliminados ++;
          mysqli_query($conexion,$update);
        }
        
      }
      else
      {
        $update="UPDATE couch SET eliminado_couch=1 WHERE id_couch='".$couch["id_couch"]."'";
        $totalEliminados ++;
        mysqli_query($conexion,$update);
      }
    }

    header("Location: manejo_usuarios.php?msg=El Usuario se ha eliminado correctamente. Se han eliminado ".$totalEliminados." couchs. Se han despublicado ".$totalDespublicados." couchs. Se han rechazado ".$totalRechazadas." reservas.&&class=alert-success"); 

    

    