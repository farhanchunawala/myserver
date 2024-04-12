<a onclick="printit()">
<div class="container-fluid">
	<h1>ZOLL & METÉR</h1>
	<h2 class="mt-2 mb-3">8291943537 &nbsp &nbsp 9769735377 &nbsp &nbsp 9820978696</h2>
	<h2>10, ABBA APT-II, NR ZAMZAM, OPP RITE MEDICAL,<br/>SAHAKAR ROAD, JOGESHWARI(W)</h2>
	<?php
	$form_ht = 1000;
	$form_wd = 960;
	$header_ht = 50;
	$footer_ht = 55;
	$col_sr_wd = 100;
	$col_total_wd = 150;
	$col_desc_wd = $form_wd - $col_sr_wd - $col_total_wd;
	
	echo '<svg id="svg" height='.(150).' width='.($form_wd).' >
		
		<line x1=0 y1=0 x2='.($form_wd).' y2=0 stroke=black stroke-width="1"/>
		
		<text x='.(0).' y='.(50+1).' font-size="24px" alignment-baseline="middle" >Aziz Momin (137)</text>
		<text x='.($form_wd-250).' y='.(50+1).' font-size="24px" alignment-baseline="middle" >Date: 17-11-21</text>
		<text x='.($form_wd-500).' y='.(100+1).' font-size="24px" alignment-baseline="middle" >Trial: 20-11-21</text>
		<text x='.($form_wd-250).' y='.(100+1).' font-size="24px" alignment-baseline="middle" >Delivery: 22-11-22</text>
		
	</svg>';
	
	echo '<svg id="svg" height='.($form_ht).' width='.($form_wd).' style="border: 2px solid black" >
		
		<line x1=0 y1='.($header_ht).' x2='.($form_wd).' y2='.($header_ht).' stroke=black stroke-width="2"/>
		<line x1=0 y1='.($form_ht-$footer_ht).' x2='.($form_wd).' y2='.($form_ht-$footer_ht).' stroke=black stroke-width="2"/>
		
		<line x1='.($col_sr_wd).' y1=0 x2='.($col_sr_wd).' y2='.($form_ht).' stroke=black stroke-width="2"/>
		<line x1='.($form_wd-$col_total_wd).' y1=0 x2='.($form_wd-$col_total_wd).' y2='.($form_ht).' stroke=black stroke-width="2"/>
		
		<text x='.($col_sr_wd/2-2).' y='.($header_ht/2+2).' font-size="24px" text-anchor="middle" alignment-baseline="middle" >QTY</text>
		<text x='.($col_sr_wd+$col_desc_wd/2-1).' y='.($header_ht/2+2).' font-size="24px" text-anchor="middle" alignment-baseline="middle" >DESCRIPTION</text>
		<text x='.($form_wd-$col_total_wd/2-1).' y='.($header_ht/2+2).' font-size="24px" text-anchor="middle" alignment-baseline="middle" >TOTAL</text>
		<text x='.($col_sr_wd+12.5-1).' y='.($form_ht-$footer_ht/2+2).' font-size="24px" alignment-baseline="middle" ></text>
		
		
		<text x='.(14-2).' y='.($header_ht+50+2).' font-size="24px" alignment-baseline="middle" >2 pair</text>
		
		<text class="futura_heavy" x='.($col_sr_wd+$col_desc_wd/4-2).' y='.($header_ht+50+2).'    font-size="24px" text-anchor="end" alignment-baseline="middle" >Kurta:</text>
		<text x='.($col_sr_wd+$col_desc_wd/4-2).' y='.($header_ht+50+30+2).' font-size="24px" text-anchor="end" alignment-baseline="middle" >cloth:</text>
		<text x='.($col_sr_wd+$col_desc_wd/4-2).' y='.($header_ht+50+60+2).' font-size="24px" text-anchor="end" alignment-baseline="middle" >pattern:</text>
		<text x='.($col_sr_wd+$col_desc_wd/4-2).' y='.($header_ht+50+90+2).' font-size="24px" text-anchor="end" alignment-baseline="middle" >emb:</text>
		
		<text x='.($col_sr_wd+$col_desc_wd/4-2).' y='.($header_ht+50+2).'    font-size="24px" text-anchor="start" alignment-baseline="middle" >&nbsp₹550</text>
		<text x='.($col_sr_wd+$col_desc_wd/4-2).' y='.($header_ht+50+30+2).' font-size="24px" text-anchor="start" alignment-baseline="middle" >&nbsp₹300</text>
		<text x='.($col_sr_wd+$col_desc_wd/4-2).' y='.($header_ht+50+60+2).' font-size="24px" text-anchor="start" alignment-baseline="middle" >&nbsp₹300</text>
		<text x='.($col_sr_wd+$col_desc_wd/4-2).' y='.($header_ht+50+90+2).' font-size="24px" text-anchor="start" alignment-baseline="middle" >&nbsp₹300</text>
		
		<text class="futura_heavy" x='.($col_sr_wd+$col_desc_wd*3/4-2).' y='.($header_ht+50+2).'    font-size="24px" text-anchor="end" alignment-baseline="middle" >Bpyjama:</text>
		<text x='.($col_sr_wd+$col_desc_wd*3/4-2).' y='.($header_ht+50+30+2).' font-size="24px" text-decoration"line-through"  text-anchor="end" alignment-baseline="middle" >cloth:</text>
		
		<text x='.($col_sr_wd+$col_desc_wd*3/4-2).' y='.($header_ht+50+2).'    font-size="24px" text-anchor="start" alignment-baseline="middle" >&nbsp₹450</text>
		<text x='.($col_sr_wd+$col_desc_wd*3/4-2).' y='.($header_ht+50+30+2).' font-size="24px" text-anchor="start" alignment-baseline="middle" >&nbsp₹300</text>
		
	</svg>';
	
	?>
</div>
</a>
