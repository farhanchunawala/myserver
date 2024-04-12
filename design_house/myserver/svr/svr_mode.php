<?php
	switch ($svr_mode) {
		case 'svr_kkms':				{ $svr_host='www.kkmenswear.in';	$svr_usr='hqe7tbxf3w3g';	$svr_pwd='Zm@2021';	$svr_db='kkmenswear';	} break;
		case 'svr_myfitness':		{ $svr_host='www.kkmenswear.in';	$svr_usr='hqe7tbxf3w3g';	$svr_pwd='Zm@2021';	$svr_db='myfitness';		} break;
		case 'svr_designhouse':		{ $svr_host='www.kkmenswear.in';	$svr_usr='hqe7tbxf3w3g';	$svr_pwd='Zm@2021';	$svr_db='designhouse';	} break;
		case 'local_kkms':			{ $svr_host='localhost';			$svr_usr='root';				$svr_pwd='';			$svr_db='kkmenswear';	} break;
		case 'local_myfitness':		{ $svr_host='localhost';			$svr_usr='root';				$svr_pwd='';			$svr_db='myfitness';		} break;
		case 'local_designhouse':	{ $svr_host='localhost';			$svr_usr='root';				$svr_pwd='';			$svr_db='designhouse';	} break;
	}
	$dbc = mysqli_connect($svr_host, $svr_usr, $svr_pwd, $svr_db) or die('Error connecting to MySQL server.'.mysqli_error($dbc));
	
	$pdo = new PDO("mysql:host=$svr_host;dbname=$svr_db", $svr_usr, $svr_pwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>