<?PHP
	
	$selected_radio = $_POST["nomTipoAModificar"];
	if (isset($_POST["Eliminar"])) {

		include "eliminar_tipos_hospedaje_form.php";

	}
	else if (isset($_POST["Modificar"])){
		include "modificar_tipos_hospedaje_form.php";
	}

?>