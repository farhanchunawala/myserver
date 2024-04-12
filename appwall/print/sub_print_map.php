<div class="d-flex flex-wrap">
<?php for($i = 1; $i <= $garbcount; $i++) {
	include $dim_cloth_php;
echo '<div id="marp">'.
"<u><b>$sr-$garb_pairing[$i]:</b></u> $garb_description[$i] ($pana[$i]p $clothln[$i]cm)<br/>".
'<svg width='.(scale($x_clothln)+2).' height='.(scale($y_pana)+17).' style="border: 1px solid black">';
	
	if     (((2 * $y_sf_bottom) + (2 * $y_sb_bottom) + 0.5) < $y_pana) include $map1_php;
	elseif ((($y_sf_bottom * 2) + ($y_ss_hala * 2) + 0.5) < $y_pana) include $map2_php;
	elseif ((0.5 + $x_sf_length + 0.5 + $x_sb_length + 0.5 + $x_ss_length + 0.5 + $x_ss_length + 0.5) < $x_clothln) include $map3_php;
	else   $map = "";
	
echo '</svg></div>';

} ?>
</div>

<hr/>