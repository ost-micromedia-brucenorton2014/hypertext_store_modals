<?php
	include  '_includes/connect.php';
	//echo("<br>insert.php");
		$tbl = "customers";
	//get posted info (if any)
		if(!empty($_REQUEST["name"])){
			$name = $_REQUEST["name"];
		}
		if(!empty($_REQUEST["email"])){
			$email = $_REQUEST["email"];
		}

		//echo("requests: $name, $email");
	//write query
		$query = "INSERT INTO $tbl (name, email) VALUES (?, ?)";
	//prepare statement
		if($insertStmt = $mysqli -> prepare($query)){
			//bind parameters, execute, get affected_rows
			$insertStmt->bind_param("ss", $name, $email);
			$insertStmt->execute();
			$insertRows = $insertStmt->affected_rows;
			
		}else{
			echo("<br>Oops there was an error: $insertStmt->error");
			echo("<br>$mysqli->error");
		}
		//if the info got inserted
		if($insertRows > 0){
			echo("<br>Thanks $name we have saved your email: $email");
		}else{
			echo("<br>Sorry, there was a problem saving your info.");
		}


		$insertStmt->close();
		$mysqli->close();
?>