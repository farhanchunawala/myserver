<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.min.css">
	<script src="libraries/jquery.min.js"></script>
	<script src="libraries/popper.min.js"></script>
	<script src="libraries/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php
	
	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	$query = "SELECT * FROM `measurement` WHERE sr=$sr AND garb_type=\"$garb_type\" ";
		
	$result = mysqli_query($dbc, $query)
		or die('Error querying database.');
	
	while ($rowqm = mysqli_fetch_array($result)) {
		
	}
	
	
	mysqli_close($dbc);
	
?>

</body>
</html>