<?php
	if ($svr_mode==='kkms_kkms' || $svr_mode==='kkms_cnv')	 { $svr_host='www.kkmenswear.com';  $svr_usr='tajoxz31q3lj';  $svr_pwd='KKms1971'; }
	else 						{ $svr_host='localhost';  $svr_usr='root';  $svr_pwd=''; }
	
	if ($svr_mode==='kkms_kkms' || $svr_mode==='local_kkms') { $custtable='cust'; $entrytable='entry'; $styletable='style'; }
	else													 { $custtable='custkk'; $entrytable='entrykk'; $styletable='stylekk'; }
?>