<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 3 -->
<head>
	<title>Button Card Template</title>
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
		$padding = 30;
		$form_ht = 677-$padding*2;	//774
		$form_wd = 542-$padding*2;
		
		echo '<svg id="svg" height="'.($form_ht+$padding*2).'" width="'.($form_wd+$padding*2).'" style="border: 0px solid black">
			
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*0/5).'"		x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*0/5).'"		stroke=black stroke-width="1"/>
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*0.5/5).'"	x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*0.5/5).'"	stroke=darkgrey stroke-width="1"/>
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*1/5).'"		x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*1/5).'"		stroke=black stroke-width="1"/>
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*1.5/5).'"	x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*1.5/5).'"	stroke=darkgrey stroke-width="1"/>
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*2/5).'"		x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*2/5).'"		stroke=black stroke-width="1"/>
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*2.5/5).'"	x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*2.5/5).'"	stroke=darkgrey stroke-width="1"/>
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*3/5).'"		x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*3/5).'"		stroke=black stroke-width="1"/>
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*3.5/5).'"	x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*3.5/5).'"	stroke=darkgrey stroke-width="1"/>
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*4/5).'"		x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*4/5).'"		stroke=black stroke-width="1"/>
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*4.5/5).'"	x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*4.5/5).'"	stroke=darkgrey stroke-width="1"/>
			<line x1="'.$padding.'"	y1="'.($padding+$form_ht*5/5).'"		x2="'.($padding+$form_wd).'"	y2="'.($padding+$form_ht*5/5).'"		stroke=black stroke-width="1"/>
			
			<line x1="'.($padding+$form_wd*0/4).'"		y1="'.$padding.'"	x2="'.($padding+$form_wd*0/4).'"		y2="'.($padding+$form_ht).'"	stroke=black stroke-width="1"/>
			<line x1="'.($padding+$form_wd*0.5/4).'"	y1="'.$padding.'"	x2="'.($padding+$form_wd*0.5/4).'"	y2="'.($padding+$form_ht).'"	stroke=darkgrey stroke-width="1"/>
			<line x1="'.($padding+$form_wd*1/4).'"		y1="'.$padding.'"	x2="'.($padding+$form_wd*1/4).'"		y2="'.($padding+$form_ht).'"	stroke=black stroke-width="1"/>
			<line x1="'.($padding+$form_wd*1.5/4).'"	y1="'.$padding.'"	x2="'.($padding+$form_wd*1.5/4).'"	y2="'.($padding+$form_ht).'"	stroke=darkgrey stroke-width="1"/>
			<line x1="'.($padding+$form_wd*2/4).'"		y1="'.$padding.'"	x2="'.($padding+$form_wd*2/4).'"		y2="'.($padding+$form_ht).'"	stroke=black stroke-width="1"/>
			<line x1="'.($padding+$form_wd*2.5/4).'"	y1="'.$padding.'"	x2="'.($padding+$form_wd*2.5/4).'"	y2="'.($padding+$form_ht).'"	stroke=darkgrey stroke-width="1"/>
			<line x1="'.($padding+$form_wd*3/4).'"		y1="'.$padding.'"	x2="'.($padding+$form_wd*3/4).'"		y2="'.($padding+$form_ht).'"	stroke=black stroke-width="1"/>
			<line x1="'.($padding+$form_wd*3.5/4).'"	y1="'.$padding.'"	x2="'.($padding+$form_wd*3.5/4).'"	y2="'.($padding+$form_ht).'"	stroke=darkgrey stroke-width="1"/>
			<line x1="'.($padding+$form_wd*4/4).'"		y1="'.$padding.'"	x2="'.($padding+$form_wd*4/4).'"		y2="'.($padding+$form_ht).'"	stroke=black stroke-width="1"/>
			
		</svg>';
		
		?>
	</div>
</a>
	
<script>
function printit() {
  window.print();
}
</script>

</body>
</html>