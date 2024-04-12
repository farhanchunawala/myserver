<div class="container-fluid p-3 my-3 border">
<b><?php echo $dir; ?></b><br/>
<?php
	unset($a_dir);		 $a_dir = array();
	unset($directories); $directories = array();
	
	$sa_dir = array_diff(scandir($dir), array('.', '..'));
	foreach($sa_dir as $var) if(strpos($var,'.php')) $a_dir[]=$var;
	foreach($sa_dir as $var) if(is_dir( $dir.$var )) $a_dir[]=$var;
	
	foreach($a_dir as $var) {
		if (!is_dir($dir.$var)) {
			$myfile = fopen($dir.$var,'r') or die("Unable to open file $dir$var!");
			$fl_srh = fread($myfile,filesize($dir.$var));
			fclose($myfile);
			$s = substr_count($fl_srh,$str);
			if ($s>0) echo "<b>$s</b> - $var : <br/>notepad++ C:/xampp/htdocs/myserver/sub/$dir$var<br/><br/>";
		} else $directories[] = "$dir$var/";
	}
	foreach ($directories as $dir) include $sub_codefinder_php;
?>
</div>