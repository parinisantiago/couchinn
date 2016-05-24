<?php
	$conexion = mysqli_connect( "localhost", "root", "", "couchinn");

	if ($conexion->connect_error) {
		die("Connection failed: ".$conexion->connect_error);
	}
