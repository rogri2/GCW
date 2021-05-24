<?php
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

    Winner();