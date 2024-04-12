<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 3 -->
<head>
	<?php $fabric_id=$_GET['fabric_id'];  echo "<title>$fabric_id Card Template</title>";
	$fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
	<style>
		#svg {
			margin-left:auto;
			margin-right:auto;
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
		@font-face { font-family:"futura_medium_bt"; src:url("../../zm_fonts/futura_medium_bt.ttf") }
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
<?php
	include $atb_fabric_php;
	
	$query1 = "SELECT * FROM fabric WHERE fabric_id=$fabric_id";
	$result1 = mysqli_query($dbc, $query1) or die('<b>Error fabric_info.php/query1 : </b><br/>'.mysqli_error($dbc));
	$rowq1 = mysqli_fetch_array($result1);
	foreach ($atb_fabric2 as $var) $$var = $rowq1[$var];
	
	$query5 = "SELECT * FROM fabricpiece WHERE fabric_id=$fabric_id";
	$result5 = mysqli_query($dbc, $query5) or die('<b>Error fabric_info.php/query1 : </b><br/>'.mysqli_error($dbc));
	$piececount=mysqli_num_rows($result5);
	$c=1;
	while ($rowq5 = mysqli_fetch_array($result5)) {
		foreach ($atb_fabricpiece3 as $var) ${$var.$c} = $rowq5[$var];
		$c++;
	}
	
	include $sub_cardtemplate_php;
	mysqli_close($dbc);
?>
<script>
function printit() {
  window.print();
}
</script>

</body>
</html>