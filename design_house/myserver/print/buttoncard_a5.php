<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 3 -->
<head>
	<title>Button Card Template</title>
	<?php $svr_mode='local_kkms';  $fdir='../';  include $fdir.'svr_mode.php'; ?>
	<style>
		#svg {
			margin-left:0px;
			margin-right:0px;
			margin-bottom:0px;
			display:block;
		}
		
		@font-face { font-family:"futur"; src:url("../../zm_fonts/futur.ttf") }
		@font-face { font-family:"futura_black_unicode"; src:url("../../zm_fonts/futura_black_unicode.ttf") }
		@font-face { font-family:"futura_bold"; src:url("../../zm_fonts/futura_bold.ttf") }
		@font-face { font-family:"futura_bold_italic"; src:url("../../zm_fonts/futura_bold_italic.ttf") }
		@font-face { font-family:"futura_bold_unicode"; src:url("../../zm_fonts/futura_bold_unicode.ttf") }
		@font-face { font-family:"futura_book"; src:url("../../zm_fonts/futura_book.ttf") }
		@font-face { font-family:"futura_book_italic"; src:url("../../zm_fonts/futura_book_italic.ttf") }
		@font-face { font-family:"futura_extra_black"; src:url("../../zm_fonts/futura_extra_black.ttf") }
		@font-face { font-family:"futura_extra_black_bt"; src:url("../../zm_fonts/futura_extra_black.ttf") }
		@font-face { font-family:"futura_heavy"; src:url("../../zm_fonts/futura_heavy.ttf") }
		@font-face { font-family:"futura_heavy_italic"; src:url("../../zm_fonts/futura_heavy_italic.ttf") }
		@font-face { font-family:"futura_light"; src:url("../../zm_fonts/futura_light.ttf") }
		@font-face { font-family:"futura_light_bt"; src:url("../../zm_fonts/futura_light_bt.ttf") }
		@font-face { font-family:"futura_light_condensed"; src:url("../../zm_fonts/futura_light_condensed.ttf") }
		@font-face { font-family:"futura_light_italic"; src:url("../../zm_fonts/futura_light_italic.ttf") }
		@font-face { font-family:"futura_medium_bt"; src:url("../zm_fonts/futura_medium_bt.ttf") }
		@font-face { font-family:"futura_medium_condensed_bt"; src:url("../../zm_fonts/futura_medium_condensed_bt.ttf") }
		@font-face { font-family:"futura_medium_italic"; src:url("../../zm_fonts/futura_medium_italic.ttf") }
		@font-face { font-family:"futura_tt205"; src:url("../../zm_fonts/futura_tt205.ttf") }
		@font-face { font-family:"intrepid_bold"; src:url("../../zm_fonts/intrepid_bold.ttf") }
		@font-face { font-family:"intrepid_italic"; src:url("../../zm_fonts/intrepid_italic.ttf") }
		@font-face { font-family:"intrepid_regular"; src:url("../../zm_fonts/intrepid_regular.ttf") }
		
		* 			  { font-family:"futura_medium_bt"; }
		.strike_through  { text-decoration:line-through; }
		.futur  { font-family:"futur"; }
		.futura_black_unicode  { font-family:"futura_black_unicode"; }
		.futura_bold  { font-family:"futura_bold"; }
		.futura_bold_italic  { font-family:"futura_bold_italic"; }
		.futura_bold_unicode  { font-family:"futura_bold_unicode"; }
		.futura_book  { font-family:"futura_book"; }
		.futura_book_italic  { font-family:"futura_book_italic"; }
		.futura_extra_black  { font-family:"futura_extra_black"; }
		.futura_extra_black  { font-family:"futura_extra_black"; }
		.futura_heavy  { font-family:"futura_heavy"; }
		.futura_heavy_italic  { font-family:"futura_heavy_italic"; }
		.futura_light  { font-family:"futura_light"; }
		.futura_light_bt  { font-family:"futura_light_bt"; }
		.futura_light_condensed  { font-family:"futura_light_condensed"; }
		.futura_light_italic  { font-family:"futura_light_italic"; }
		.futura_medium_bt  { font-family:"futura_medium_bt"; }
		.futura_medium_condensed_bt  { font-family:"futura_medium_condensed_bt"; }
		.futura_medium_italic  { font-family:"futura_medium_italic"; }
		.futura_tt205  { font-family:"futura_tt205"; }
		.intrepid_bold  { font-family:"intrepid_bold"; }
		.intrepid_italic  { font-family:"intrepid_italic"; }
		.intrepid_regular  { font-family:"intrepid_regular"; }
		
	</style>
	<style>
		h1 {text-align:center; font-size:120px;}
		h2 {text-align:center; font-size:20px; letter-spacing:2px; line-height: 1.4;}
	</style>
</head>
<body>

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
		
		$box_name='R';
		$col1='1-5';  $col2='6-10';  $col3='11-15';  $col4='16-20';  $col5='21-25';  $col6='26-30';  $col7='31-35';  
		
		/* <circle cx='.($form_wd/2-286.8).' cy="31.5" r="16" stroke="black" stroke-width="1" fill="none" />
		<circle cx='.($form_wd/2+286.8).' cy="31.5" r="16" stroke="black" stroke-width="1" fill="none" /> */
		
		echo '<svg id="svg" height='.($form_ht).' width='.($form_wd).' style="border: 0px solid black">
			
			<text x='.($form_wd/2).' y='.($header_ht*0.5).' font-size="120px" text-anchor="middle" alignment-baseline="middle" >'.$box_name.'</text>
			
			<text x='.($form_wd*0.5/7).' y='.($header_ht*0.94).' font-size="26px" text-anchor="middle" alignment-baseline="middle" >'.$col1.'</text>
			<text x='.($form_wd*1.5/7).' y='.($header_ht*0.94).' font-size="26px" text-anchor="middle" alignment-baseline="middle" >'.$col2.'</text>
			<text x='.($form_wd*2.5/7).' y='.($header_ht*0.94).' font-size="26px" text-anchor="middle" alignment-baseline="middle" >'.$col3.'</text>
			<text x='.($form_wd*3.5/7).' y='.($header_ht*0.94).' font-size="26px" text-anchor="middle" alignment-baseline="middle" >'.$col4.'</text>
			<text x='.($form_wd*4.5/7).' y='.($header_ht*0.94).' font-size="26px" text-anchor="middle" alignment-baseline="middle" >'.$col5.'</text>
			<text x='.($form_wd*5.5/7).' y='.($header_ht*0.94).' font-size="26px" text-anchor="middle" alignment-baseline="middle" >'.$col6.'</text>
			<text x='.($form_wd*6.5/7).' y='.($header_ht*0.94).' font-size="26px" text-anchor="middle" alignment-baseline="middle" >'.$col7.'</text>
			
			<line x1='.($form_wd*0).' y1='.($header_ht+$form_wd*0.0).' x2='.($form_wd*1).' y2='.($header_ht+$form_wd*0.0).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*0).' y1='.($header_ht+$form_wd*1/5).' x2='.($form_wd*1).' y2='.($header_ht+$form_wd*1/5).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*0).' y1='.($header_ht+$form_wd*2/5).' x2='.($form_wd*1).' y2='.($header_ht+$form_wd*2/5).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*0).' y1='.($header_ht+$form_wd*3/5).' x2='.($form_wd*1).' y2='.($header_ht+$form_wd*3/5).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*0).' y1='.($header_ht+$form_wd*4/5).' x2='.($form_wd*1).' y2='.($header_ht+$form_wd*4/5).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*0).' y1='.($header_ht+$form_wd*5/5).' x2='.($form_wd*1).' y2='.($header_ht+$form_wd*5/5).' stroke=darkgrey stroke-width="2"/>
			
			<line x1='.($form_wd*0.0).' y1='.($header_ht).' x2='.($form_wd*0.0).' y2='.($header_ht+$form_wd).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*1/7).' y1='.($header_ht).' x2='.($form_wd*1/7).' y2='.($header_ht+$form_wd).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*2/7).' y1='.($header_ht).' x2='.($form_wd*2/7).' y2='.($header_ht+$form_wd).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*3/7).' y1='.($header_ht).' x2='.($form_wd*3/7).' y2='.($header_ht+$form_wd).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*4/7).' y1='.($header_ht).' x2='.($form_wd*4/7).' y2='.($header_ht+$form_wd).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*5/7).' y1='.($header_ht).' x2='.($form_wd*5/7).' y2='.($header_ht+$form_wd).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*6/7).' y1='.($header_ht).' x2='.($form_wd*6/7).' y2='.($header_ht+$form_wd).' stroke=darkgrey stroke-width="2"/>
			<line x1='.($form_wd*7/7).' y1='.($header_ht).' x2='.($form_wd*7/7).' y2='.($header_ht+$form_wd).' stroke=darkgrey stroke-width="2"/>
			
		</svg>';
		
		?>
	</div>
</a>
	
<?php mysqli_close($dbc); ?>
<script>
function printit() {
  window.print();
}
</script>

</body>
</html>