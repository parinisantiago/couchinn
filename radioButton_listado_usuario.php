<?PHP
	if (isset($_POST["eliminarUsuario"])) {
		include "consultas/eliminar_usuario.php";
	}
	else if (isset($_POST["verCouchs"])){
		include "listado_mis_couchs_admin.php";
	}
?>