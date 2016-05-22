<?php
	$conexion = mysqli_connect( "localhost", "root", "root", "couchinn");

	if ($conexion->connect_error) {
		die("Connection failed: ".$conexion->connect_error);
	}
