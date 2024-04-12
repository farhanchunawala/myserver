<!DOCTYPE html>
<html lang="en">
<head>
	<title>Customer Info</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php

	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	for($i=7;$i<=100;$i++){
	$query = "SELECT * FROM `customer` WHERE sr=$i";
		
	$result = mysqli_query($dbc, $query)
		or die('Error querying database.');
	}
	mysqli_close($dbc);
	
?>

</body>
</html>