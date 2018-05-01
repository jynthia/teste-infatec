<?php

mysqli_report(MYSQLI_REPORT_STRICT);

function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}

function find_all ($table = null, $id = null) {


	$database = open_database();
	$found = null;

	try {
		if ($id) {
			$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
			$result = $database ->query($sql);

			if ($result->num_rows > 0) {

				$found = $result->fetch_assoc();

			}

		} else {

			$sql = "SELECT * FROM " . $table;
			
			$result = $database->query($sql);

			if ($result->num_rows > 0) {

				$found = $result->fetch_all(MYSQLI_ASSOC);
			}
		}
	}	catch (Exception $e) {

		$_SESSION['message'] = $e->GetMessage();
		$_SESSION['type'] = 'danger';
	
	}

	close_database($database);
	return ($found);



}				

//function find_all( $table ) { return find($table); }


function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}