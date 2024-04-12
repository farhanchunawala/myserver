<!DOCTYPE html>
<html>
<body>
<?php
	$start_time = microtime(true);
?>
<?php
	$end_time = microtime(true);
	$execution_time = ($end_time - $start_time);
	echo " Execution time of script = " . number_format("$execution_time",3) . " sec";
?>

SELECT * FROM customer WHERE sr=116 ORDER BY sr DESC LIMIT 1

<?php



?>



</body>
</html>