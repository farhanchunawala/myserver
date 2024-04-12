<a onclick="printit()">
<div class="container-fluid">
	<?php
	$form_ht = 1430;
	$form_wd = 960;
	$header_ht = $form_ht-$form_wd;	//470
	/* $footer_ht = 55;
	$col_sr_wd = 100;
	$col_total_wd = 150;
	$col_desc_wd = $form_wd - $col_sr_wd - $col_total_wd; */
	
	if ($_GET['bh']=='zm')	{ $z='Z';  $n='&';  $m='M';  $fpr="₹$fp/m"; }
	else							{ $z='K';  $n='';   $m='K';  $fpr=''; }
	
	/* <circle cx='.($form_wd/2-286.8).' cy="31.5" r="16" stroke="black" stroke-width="1" fill="none" />
	<circle cx='.($form_wd/2+286.8).' cy="31.5" r="16" stroke="black" stroke-width="1" fill="none" /> */
	
	echo '<svg id="svg" height='.($form_ht).' width='.($form_wd).' style="border: 0px solid black">
		
		<text x='.($form_wd/2-1).' y='.($header_ht*0.4).' font-size="120px" text-anchor="end" alignment-baseline="middle" >'.$z.'</text>
		<text x='.($form_wd/2+1).' y='.($header_ht*0.4).' font-size="120px" text-anchor="start" alignment-baseline="middle" >'.$m.'</text>
		<text x='.($form_wd/2).' y='.($header_ht*0.4-4).' font-size="72px" fill="darkgrey" text-anchor="middle" alignment-baseline="middle" >'.$n.'</text>
		
		<path d=" m '.($form_wd/2).' 100
		h -20
		v 20
		h 20
		v -20
		h -20
		" fill=none stroke-width=1 />
		
		<text x='.($form_wd*0.25).' y='.($header_ht*0.8).' font-size="60px" text-anchor="middle" alignment-baseline="middle" >'."$brand".'</text>
		<text x='.($form_wd*0.25).' y='.($header_ht*0.9).' font-size="36px" text-anchor="middle" alignment-baseline="middle" >'."$name".'</text>
		
		<text x='.($form_wd*0.75).' y='.($header_ht*0.8).' font-size="60px" text-anchor="middle" alignment-baseline="middle" >'.$fpr.'</text>
		
		<line x1='.($form_wd*0.15).' y1='.($header_ht+$form_wd*0.15).' x2='.($form_wd*0.85).' y2='.($header_ht+$form_wd*0.15).' stroke=darkgrey stroke-width="2"/>
		
		<text x='.($form_wd*0.5).' y='.($header_ht+$form_wd/2).' fill="grey" font-size="36px" text-anchor="middle" alignment-baseline="middle" >'."$fabric_id".'</text>
		
	</svg>';
	
	?>
</div>
</a>