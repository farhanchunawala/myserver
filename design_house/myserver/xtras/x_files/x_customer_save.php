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
	$sr = $_POST['sr'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$mobile_no1 = $_POST['mobile_no1'];
	$mobile_no2 = $_POST['mobile_no2'];
	$mobile_no3 = $_POST['mobile_no3'];
	
	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
		
	$query = "UPDATE `customer` SET `sr`=$sr,`name`=\"$name\",`surname`=\"$surname\",
		`mobile_no1`=$mobile_no1,`mobile_no2`=$mobile_no2,`mobile_no3`=$mobile_no3 WHERE sr=$sr";
	
	$result = mysqli_query($dbc, $query)
		or die('Error querying database.');
	
	mysqli_close($dbc);
?>

</body>
</html>