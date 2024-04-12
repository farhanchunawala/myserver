<?php
	$servername="localhost";  $username="root";  $password="";
	try {
		$conn = new PDO("mysql:host=$servername;dbname=kkmenswear", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM meas WHERE sr=$sr";
		$statement = $conn->query($sql);
		
		$myObj = $statement->fetchAll(PDO::FETCH_OBJ);
		
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>