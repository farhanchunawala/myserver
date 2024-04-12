<!DOCTYPE html>
<html lang="en">
<head>
	<?php $sr=$_GET['sr'];  $garbtype=$_GET['garbtype'];  $garb_id=$_GET['garb_id'];  $print=$_GET['print'];
	echo "<title>$sr Entry</title>";
	$fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
	<link rel="stylesheet" href="printstyles.css">
</head>
<body>

<a onclick="printit()">
<?php
	if ($print=='print_map') include $fn_x2_php;
	include $fn_inchtocm_php;
	include $fn_inchtotext_php;
	include $fn_cmtoinchtext_php;
	//include $fn_shouldertrim_php;
	
	($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? $garb_category='top' :  $garb_category='btm' ;
	//include $dim_entry_php;
	// include $dim_style_php;
	// include $dim_meas_php;
	$garbcount=1;
	
	for($i=1; $i<=$garbcount; $i++) {
		//include ${'dim_'.$garb_category.'_php'};
		//include $dim_cloth_php;
	}
	if     ($print=='print_marking') ;//include $sub_print_marking_php;
	elseif ($print=='print_marking2')	include $sub_print_marking2_php;
	elseif ($print=='print_map')			include $sub_print_map_php;
	// elseif ($print=='print_cslip')		include $sub_print_cslip_php;
	// else											include $sub_print_kslip_php;
	
	mysqli_close($dbc);
?>
<div id='mar1'>
	<div id="r1" class="row mb-2 no-gutters"></div>
	<div id="r2" class="row mb-n4 no-gutters"></div>
	<div id="r3" class="row mb-n1 no-gutters"></div>
	<div id="r4" class="row mb-1 no-gutters"></div>
	<div id="r5" class="row mb-n3 no-gutters"></div>
	<div id="r6" class="row mb-n2 no-gutters" style="font-size:18px"></div>
	<div id="r7" class="row no-gutters" style="font-size:14px"></div>
	<div id="r8" class="row" style="font-size:20px"></div>
</div>
<canvas id="myCanvas" width="1044" height="697" style="border:1px solid black;"></canvas>
</a>

<script src="<?php echo $fn_inchtocm2_js; ?>" ></script>
<script src="<?php echo $fn_cmtoinchtext_js; ?>" ></script>
<script> "use strict";
	let url		= new URL(window.location.href);
	let svr_mode= url.searchParams.get("svr_mode");
	let sr		= url.searchParams.get("sr");
	let print	= url.searchParams.get("print");
	let garb_id	= url.searchParams.get("garb_id");
</script>
<script src="<?php echo $loaddoc_js ?>"></script>
<script> "use strict";
	var fdir='../../';  var myMeas={};  var myStyle={}; 
	var canvas = document.getElementById("myCanvas");
	var ctx = canvas.getContext("2d");
	const shirt = {};
</script>
<script src="<?php echo $p_topfr_js; ?>" ></script>
<script src="<?php echo $p_topbk_js; ?>" ></script>
<script src="<?php echo $p_topsl_js; ?>" ></script>
<script src="<?php echo $p_topsh_js; ?>" ></script>
<script src="<?php echo $topfr_js; ?>" ></script>
<script src="<?php echo $topbk_js; ?>" ></script>
<script src="<?php echo $topsl_js; ?>" ></script>
<script src="<?php echo $topsh_js; ?>" ></script>
<script>
	loadDoc("../../appwall/pattern/measinfo.php?svr_mode="+svr_mode+"&sr="+sr, measInfo);
	loadDoc("../../appwall/pattern/entryinfo.php?svr_mode="+svr_mode+"&sr="+sr+"&garb_id="+garb_id, entryInfo);
	function measInfo(xhttp)  { myMeas  = JSON.parse(xhttp.responseText); }
	function entryInfo(xhttp) { 
		myStyle = JSON.parse(xhttp.responseText);
		
		if (print=='print_marking') {
			// shirt = { fr: new TopFr();  bk: new TopBk();  sl: new TopSl();  sh: new TopSh(); }
			shirt.fr = new TopFr();
			shirt.bk = new TopBk(shirt.fr);
			shirt.sl = new TopSl();
			shirt.sh = new TopSh();
			// alert(shirt.fr.shoulder.x);
			
			p_TopSl(850, 640, 8.2, -8.2, 90);
			p_TopFr(1005, 380, 8.2, -8.2, 90);
		} else {
			cslip = {}
			r1={c1:'', c2:'', c3:'', c4:'', c5:'', c6:'', c7:'', c8:'', c9:'', c10:'' }; 
			r2={c1:'', c2:'', c3:'', c4:'', c5:'', c6:'', c7:'', c8:'', c9:'', c10:'' }; 
			r3={c1:'', c2:'', c3:'', c4:'', c5:'', c6:'', c7:'', c8:'', c9:'', c10:'' }; 
			r4={c1:'', c2:'', c3:'', c4:'', c5:'', c6:'', c7:'', c8:'', c9:'', c10:'' }; 
			r5={c1:'', c2:'', c3:'', c4:'', c5:'', c6:'', c7:'', c8:'', c9:'', c10:'' }; 
			r6={c1:'', c2:'', c3:'', c4:'', c5:'', c6:'', c7:'', c8:'', c9:'', c10:'' }; 
			r7={c1:'', c2:'', c3:'', c4:'', c5:'', c6:'', c7:'', c8:'', c9:'', c10:'' }; 
			r8={c1:'', c2:'', c3:'', c4:'', c5:'', c6:'', c7:'', c8:'', c9:'', c10:'' }; 
			if (myStyle.garbtype=='shirt' || myStyle.garbtype=='kurta' || myStyle.garbtype=='kandura') {
				r1.c5 = '<b><u>ZM-'+myStyle.sr+'</u></b>';
				
				r2.c4 = '('+cmtoinchtext(myStyle.hala)+')';
				r2.c5 = cmtoinchtext(myStyle.t_chest);
				r2.c6 = cmtoinchtext(myStyle.t_stomach);
				r2.c7 = cmtoinchtext(myStyle.t_seat);
				r2.c8 = cmtoinchtext(myStyle.t_bottom);
				
				// r3.c1 = '<span class="border border-dark pr-1 pl-1"><b>'+myStyle.garbcount+'</b></span>';
				// r3.c10 = cmtoinchtext(myStyle.pocketdown);
				
				{	//sub_style
					if     (myStyle.sub_style=='bshirt') 	r4.c1 = '<span class="border border-dark pr-1 pl-1"><b>Bshirt :</b></span>';
					else if (myStyle.sub_style=='bshirtsc') r4.c1 = '<span class="border border-dark pr-1 pl-1"><b>Bshirt-sc :</b></span>';
					else if (myStyle.sub_style=='oshirt') 	r4.c1 = '<u><b>ᴼshirt : </b></u>';
					else if (myStyle.sub_style=='round') 	r4.c1 = '<span class="border-left border-bottom rounded-circle border-dark p-1"><b>'+myStyle.garbtype+':</b></span>';
					else 												r4.c1 = '<span class="border border-dark pr-1 pl-1"><b>'+myStyle.garbtype+':</b></span>';
				}
				r4.c2 = cmtoinchtext(myStyle.length);
				r4.c3 = cmtoinchtext(myStyle.shoulder_ln);
				r4.c4 = cmtoinchtext(myStyle.sleeve_ln);
				r4.c5 = cmtoinchtext(myStyle.chest);
				r4.c6 = cmtoinchtext(myStyle.stomach);
				r4.c7 = cmtoinchtext(myStyle.seat);
				r4.c8 = cmtoinchtext(myStyle.collar);
				// if myStyle.cuffln=="0") r4.c9 = "";
				// else 								r4.c9 = cmtoinchtext(myStyle.cuffbr)+' x '+cmtoinchtext(myStyle.cuffln);
				/*{	//pocket
					if ($pocket=="pocketa") 	$r4c10 = "4 x 4½";
					elseif ($pocket=="pocketb") $r4c10 = "4¼ x 4¾";
					elseif ($pocket=="pocketc") $r4c10 = "4½ x 5¼";
					elseif ($pocket=="pocketd") $r4c10 = "4¾ x 5½";
					elseif ($pocket=="pockete") $r4c10 = "5 x 5¾";
					elseif ($pocket=="pocketf") $r4c10 = "5¼ x 6";
					elseif ($pocket=="pocketg") $r4c10 = "5½ x 6¼";
					elseif ($pocket=="pocketh") $r4c10 = "5¾ x 6½";
					else 						$r4c10 = "";
				}*/
				r5.c1 = cmtoinchtext(myStyle.biceps);
				
				if			(myStyle.shoulder_type=="noshoulder")  r6.c3 = "NO";
				else if	(myStyle.shoulder_type=="vshoulder")	r6.c3 = "V Shoulder";
				else if	(myStyle.shoulder_type=="dvshoulder")	r6.c3 = "DV Shoulder";
				else 											 				r6.c3 = "";
				
				if			(myStyle.collar_type=="rmpc")		r6.c8 = "RMPC";
				else if (myStyle.collar_type=="mrmpc")  	r6.c8 = "MRMPC";
				else if (myStyle.collar_type=="lspc") 	 	r6.c8 = "LSPC";
				else if (myStyle.collar_type=="bc") 	 	r6.c8 = "BC";
				else if (myStyle.collar_type=="nocollar")	r6.c8 = "NO Collar";
				else 							 						r6.c8 = "";
				
				if     (myStyle.cuff_type=="nocuff")	r6.c9 = "NO Cuff";
				else if (myStyle.cuff_type=="cut")		r6.c9 = "Cut";
				else if (myStyle.cuff_type=="square")	r6.c9 = "SQUARE";
				else if (myStyle.cuff_type=="round")	r6.c9 = "ROUND";
				else 						 						r6.c9 = "";
				
				if     (myStyle.pocket_type=="nopocket")	r6.c10 = "NO Pocket";
				else if (myStyle.pocket_type=="square") 	r6.c10 = "SQUARE";
				else if (myStyle.pocket_type=="v") 	  	 	r6.c10 = "V";
				else if (myStyle.pocket_type=="round")  	r6.c10 = "ROUND";
				else if (myStyle.pocket_type=="flap")   	r6.c10 = "FLAP";
				else if (myStyle.pocket_type=="wallet") 	r6.c10 = "WALLET";
				else 						  	 						r6.c10 = "";
				
				if (myStyle.shoulder_type!='regular') r7.c3 = 'shoulder';
				r7.c8 = 'collar';
				r7.c9 = 'cuff';
				r7.c10 = 'pocket';
				
				r8.c1=myStyle.note1;
				r8.c2=myStyle.note2;
				r8.c3=myStyle.note3;
				
			} else {
				
				r1.c5 = '<b><u>&nbsp'+sr+'&nbsp</u></b>';
				
				/*if ($pleats=="0") $r2c10 = "<u>No plts</u>";
				else 			  $r2c10 = "<u>$pleats"."plts</u>";*/
				
				// r3.c1 = '<span class="border border-dark pr-1 pl-1"><b>'+myStyle.garbcount+'</b></span>';
				if (myStyle.garbtype=='pant') r3.c5 = '<u>5~</u>';
				
				r4.c1 = '<u><b>'+myStyle.garbtype+' : </b></u>';
				
				r4.c2 = cmtoinchtext(myStyle.length);
				r4.c3 = cmtoinchtext(myStyle.fork);
				r4.c4 = cmtoinchtext(myStyle.waist);
				r4.c5 = cmtoinchtext(myStyle.seat);
				r4.c6 = '<u>'+cmtoinchtext(myStyle.thighs_fix)+'</u>';
				r4.c7 = '<u>'+cmtoinchtext(myStyle.calf_ln)+'</u>';
				r4.c8 = cmtoinchtext(myStyle.bottom);
				r4.c9 = cmtoinchtext(myStyle.cuttingfactor);
				
				if (myStyle.crease=='fc') 	r5.c1 = 'FC';
				else			   				r5.c1 = 'SC';
				r5.c6 = myStyle.thigh_losing;
				r5.c7 = myStyle.calf_losing;
				
				r6.c4 = myStyle.pocket;
				if (myStyle.belt=='lbelt')			r6.c5 = 'L blt';
				else if (myStyle.belt=='cbelt')	r6.c5 = 'C blt';
				if (myStyle.garbtype=='pant')		r6.c6 = myStyle.backpocket+'B';
				r6.c7 = myStyle.watchpocket+'W';
			}
			
			
			textr1=''; textr2=''; textr3=''; textr4=''; textr5=''; textr6=''; textr7=''; textr8='';
			for (x in r1) textr1 += '<div class="col">'+r1[x]+'</div>';
			for (x in r2) textr2 += '<div class="col">'+r2[x]+'</div>';
			for (x in r3) textr3 += '<div class="col">'+r3[x]+'</div>';
			for (x in r4) textr4 += '<div class="col">'+r4[x]+'</div>';
			for (x in r5) textr5 += '<div class="col">'+r5[x]+'</div>';
			for (x in r6) textr6 += '<div class="col">'+r6[x]+'</div>';
			for (x in r7) textr7 += '<div class="col">'+r7[x]+'</div>';
			for (x in r8) textr8 += '<div class="col">'+r8[x]+'</div>';
			document.getElementById('r1').innerHTML = textr1;
			document.getElementById('r2').innerHTML = textr2;
			document.getElementById('r3').innerHTML = textr3;
			document.getElementById('r4').innerHTML = textr4;
			document.getElementById('r5').innerHTML = textr5;
			document.getElementById('r6').innerHTML = textr6;
			document.getElementById('r7').innerHTML = textr7;
			document.getElementById('r8').innerHTML = textr8;
		}
	}
</script>
<script>
function printit() {
	window.print();
}
</script>

</body>
</html>