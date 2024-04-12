<?php
	
	for ($r=scale(10); $r<=scale($x_clothln); $r=$r+scale(10)) {
		echo '<line   x1='.($r-scale(5)).'   y1=0   x2='.($r-scale(5)).'   y2='.scale($y_pana).					' stroke=darkgrey stroke-width=1 opacity=0.4 />';
		echo "<line   x1=$r					 y1=0   x2=$r				   y2=".scale($y_pana).					' stroke=darkgrey stroke-width=1 opacity=0.8 />';
	}
	for ($r=scale(10); $r<=scale($y_pana); $r=$r+scale(10)) {
		echo '<line   x1=0   y1='.($r-scale(5)).'   x2='.scale($x_clothln).'   y2='.($r-scale(5)).				' stroke=darkgrey stroke-width=1 opacity=0.4 />';
		echo '<line   x1=0   y1='.$r.			'   x2='.scale($x_clothln).'   y2='.$r.							' stroke=darkgrey stroke-width=1 opacity=0.8 />';
	}
	echo '<line   x1=0   y1='.(scale($y_pana)/2).'   x2='.(scale($x_clothln)).'   y2='.(scale($y_pana)/2).		' stroke=lightgreen stroke-width=1.5 opacity=0.8 />';
	
	echo '<path d = " M 0,'.(scale($y_pana)+2).
		'v 15   h'.(scale($x_clothln)+30).'   v -15'.
		'z"   fill=yellow   opacity=0.3   stroke=black />';
	echo '<line   x1=0   y1='.(scale($y_pana)+2).'   x2='.(scale($x_clothln)+2).  ' y2='.(scale($y_pana)+2).	' stroke=black stroke-width=1 opacity=0.4 />';
	for ($r=0; $r<=scale($x_clothln)+2; $r=$r+10*2) {
		echo "<line   x1=$r   y1=".(scale($y_pana)+2)."   x2=$r   y2=".(scale($y_pana)+15).						' stroke=black stroke-width=1 opacity=0.4 />';
	}
	for ($r=0; $r<=scale($x_clothln)+2; $r=$r+50*2) {
		echo "<line   x1=$r   y1=".(scale($y_pana)+2)."   x2=$r   y2=".(scale($y_pana)+15).						' stroke=black stroke-width=1 opacity=0.8 />';
	}
	
?>