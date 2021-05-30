<?php
	$action = $_POST['action'];

	if ($action == "Winner") 
		Winner();
	else if ($action == "getWinners")
		getWinners();

    function connect() {
		$databasehost = "localhost";
		$databaseuser = "root";
		$databasepass = "Bmgbcfup123";
		$databasename = "STABCDMA";

		$mysqli = new mysqli($databasehost, $databaseuser, $databasepass, $databasename);
		if ($mysqli->connect_errno) {
			echo "Problema con la conexion a la base de datos";
		}
		return $mysqli;
	}

    function Winner() {
		$user = $_POST["user"];
        
		$mysqli = connect();

        $result = $mysqli->query("CALL sp_Win('".$user."');");
		
		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			echo "Todo salio bien";		
		}
		mysqli_close($mysqli);
	}

	function getWinners() {
		$mysqli = connect();

		$result = $mysqli->query("SELECT * FROM Winners");	
		
		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			// Recorremos los resultados devueltos
			$rows = array();
			while( $r = $result->fetch_assoc()) {
				$rows[] = $r;
			}			
			// Codificamos los resultados a formato JSON y lo enviamos al HTML (Client-Side)
			echo json_encode($rows);
		}
		mysqli_close($mysqli);
	}