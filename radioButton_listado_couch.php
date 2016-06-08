<?PHP
	
	$selected_radio = $_POST["couch"];
	if (isset($_POST["Eliminar"])) {

		include "consultas/eliminar_couch.php";

	}
	else if (isset($_POST["Modificar"])){
		include "modificar_couch_form.php";
	}
	else if (isset($_POST["Despublicar"])){
		include "consultas/despublicar_couch.php";
	}

?>