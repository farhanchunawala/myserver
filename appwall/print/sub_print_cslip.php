<!--	parent
notepad++ C:/xampp/htdocs/myserver/print.php
-->

<?php
	$r1c1=$r1c2=$r1c3=$r1c4=$r1c5=$r1c6=$r1c7=$r1c8=$r1c9=$r1c10= $r2c1=$r2c2=$r2c3=$r2c4=$r2c5=$r2c6=$r2c7=$r2c8=$r2c9=$r2c10=
	$r3c1=$r3c2=$r3c3=$r3c4=$r3c5=$r3c6=$r3c7=$r3c8=$r3c9=$r3c10= $r4c1=$r4c2=$r4c3=$r4c4=$r4c5=$r4c6=$r4c7=$r4c8=$r4c9=$r4c10=
	$r5c1=$r5c2=$r5c3=$r5c4=$r5c5=$r5c6=$r5c7=$r5c8=$r5c9=$r5c10= $r6c1=$r6c2=$r6c3=$r6c4=$r6c5=$r6c6=$r6c7=$r6c8=$r6c9=$r6c10=
	$r7c1=$r7c2=$r7c3=$r7c4=$r7c5=$r7c6=$r7c7=$r7c8=$r7c9=$r7c10= '';
	
	if ($garb_category=='top') {
		
		$r1c5 = "<b><u>&nbsp$sr&nbsp</u></b>";
		
		$r2c4 = "(".cmtoinchtext($hala).")";
		$r2c5 = cmtoinchtext($t_chest);
		$r2c6 = cmtoinchtext($t_stomach);
		$r2c7 = cmtoinchtext($t_seat);
		$r2c8 = cmtoinchtext($t_bottom);
		
		$r3c1 = "<span class=\"border border-dark pr-1 pl-1\"><b>$garbcount</b></span>";
		//$r3c10 = cmtoinchtext($pocketdown);
		
		{	//sub_style
			if     ($sub_style=='bshirt') 	$r4c1 = "<span class=\"border border-dark pr-1 pl-1\"><b>Bshirt :</b></span>";
			elseif ($sub_style=='bshirtsc') $r4c1 = "<span class=\"border border-dark pr-1 pl-1\"><b>Bshirt-sc :</b></span>";
			elseif ($sub_style=='oshirt') 	$r4c1 = "<u><b>ᴼshirt : </b></u>";
			elseif ($sub_style=='round') 	$r4c1 = "<span class=\"border-left border-bottom rounded-circle border-dark p-1\"><b>$garbtype :</b></span>";
			else 							$r4c1 = "<span class=\"border border-dark pr-1 pl-1\"><b>$garbtype :</b></span>";
		}
		$r4c2 = cmtoinchtext($length);
		$r4c3 = cmtoinchtext($shoulder_ln);
		$r4c4 = cmtoinchtext($sleeve_ln);
		$r4c5 = cmtoinchtext($chest);
		$r4c6 = cmtoinchtext($stomach);
		$r4c7 = cmtoinchtext($seat);
		$r4c8 = cmtoinchtext($collar);
		if ($cuffln[1]=="0") $r4c9 = "";
		else 				 $r4c9 = cmtoinchtext($cuffbr)." x ".cmtoinchtext($cuffln[1]);
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
		
		$r5c1 = cmtoinchtext($biceps);
		
		{	//shoulder_type
			if     ($shoulder_type=="noshoulder") $r6c3 = "NO Shoulder";
			elseif ($shoulder_type=="vshoulder")  $r6c3 = "V Shoulder";
			elseif ($shoulder_type=="dvshoulder") $r6c3 = "DV Shoulder";
			else 								 $r6c3 = "";
		}
		{	//collar_type
			if     ($collar_type=="rmpc") 	 $r6c8 = "RMPC";
			elseif ($collar_type=="mrmpc")  	 $r6c8 = "MRMPC";
			elseif ($collar_type=="lspc") 	 $r6c8 = "LSPC";
			elseif ($collar_type=="bc") 	 	 $r6c8 = "BC";
			elseif ($collar_type=="nocollar") $r6c8 = "NO Collar";
			else 							 $r6c8 = "";
		}
		{	//cuff_type
			if     ($cuff_type=="nocuff") $r6c9 = "NO Cuff";
			elseif ($cuff_type=="cut") 	 $r6c9 = "Cut";
			elseif ($cuff_type=="square") $r6c9 = "SQUARE";
			elseif ($cuff_type=="round")  $r6c9 = "ROUND";
			else 						 $r6c9 = "";
		}
		{	//pocket_type
			if     ($pocket_type=="nopocket") $r6c10 = "NO Pocket";
			elseif ($pocket_type=="square") 	 $r6c10 = "SQUARE";
			elseif ($pocket_type=="v") 	  	 $r6c10 = "V";
			elseif ($pocket_type=="round")  	 $r6c10 = "ROUND";
			elseif ($pocket_type=="flap")   	 $r6c10 = "FLAP";
			elseif ($pocket_type=="wallet") 	 $r6c10 = "WALLET";
			else 						  	 $r6c10 = "";
		}
		
		if ($shoulder_type!='regular') $r7c3 = 'shoulder';
		$r7c8 = 'collar';
		$r7c9 = 'cuff';
		$r7c10 = 'pocket';
		
	} else {
		
		$r1c5 = "<b><u>&nbsp$sr&nbsp</u></b>";
		
		/*if ($pleats=="0") $r2c10 = "<u>No plts</u>";
		else 			  $r2c10 = "<u>$pleats"."plts</u>";*/
		
		$r3c1 = "<span class=\"border border-dark pr-1 pl-1\"><b>$garbcount</b></span>";
		if ($garbtype=='pant') $r3c5 = '<u>5~</u>';
		
		{	//sub_style
			$r4c1 = "<u><b>$garbtype : </b></u>";
		}
		$r4c2 = cmtoinchtext($length);
		$r4c3 = cmtoinchtext($fork);
		$r4c4 = cmtoinchtext($waist);
		$r4c5 = cmtoinchtext($seat);
		$r4c6 = '<u>'.cmtoinchtext($thighs_fix).'</u>';
		$r4c7 = '<u>'.cmtoinchtext($calfln).'</u>';
		$r4c8 = cmtoinchtext($bottom);
		$r4c9 = cmtoinchtext($cuttingfactor);
		
		if ($crease=="fc") $r5c1 = "FC";
		else			   $r5c1 = "SC";
		$r5c6 = $thigh_losing;
		$r5c7 = $calf_losing;
		
		$r6c4 = $pocket;
		if ($belt=="lbelt") $r6c5 = "L blt";
		elseif ($belt=="cbelt") $r6c5 = "C blt";
		if ($garbtype=='pant') $r6c6 = "$back_pocket".'B';
		$r6c7 = "$watch_pocket".'W';
	}
	$r8c1=$note1;
	$r8c2=$note2;
	$r8c3=$note3;
	
?>

<div id='mar1'>
	
	<div class="row mb-2 no-gutters">
		<div class="col"><?php echo $r1c1 ?></div>
		<div class="col"><?php echo $r1c2 ?></div>
		<div class="col"><?php echo $r1c3 ?></div>
		<div class="col"><?php echo $r1c4 ?></div>
		<div class="col"><?php echo $r1c5 ?></div>
		<div class="col"><?php echo $r1c6 ?></div>
		<div class="col"><?php echo $r1c7 ?></div>
		<div class="col"><?php echo $r1c8 ?></div>
		<div class="col"><?php echo $r1c9 ?></div>
		<div class="col"><?php echo $r1c10 ?></div>
	</div>
	<div class="row mb-n4 no-gutters">
		<div class="col"><?php echo $r2c1 ?></div>
		<div class="col"><?php echo $r2c2 ?></div>
		<div class="col"><?php echo $r2c3 ?></div>
		<div class="col"><?php echo $r2c4 ?></div>
		<div class="col"><?php echo $r2c5 ?></div>
		<div class="col"><?php echo $r2c6 ?></div>
		<div class="col"><?php echo $r2c7 ?></div>
		<div class="col"><?php echo $r2c8 ?></div>
		<div class="col"><?php echo $r2c9 ?></div>
		<div class="col"><?php echo $r2c10 ?></div>
	</div>
	<div class="row mb-n1 no-gutters">
		<div class="col"><?php echo $r3c1 ?></div>
		<div class="col"><?php echo $r3c2 ?></div>
		<div class="col"><?php echo $r3c3 ?></div>
		<div class="col"><?php echo $r3c4 ?></div>
		<div class="col"><?php echo $r3c5 ?></div>
		<div class="col"><?php echo $r3c6 ?></div>
		<div class="col"><?php echo $r3c7 ?></div>
		<div class="col"><?php echo $r3c8 ?></div>
		<div class="col"><?php echo $r3c9 ?></div>
		<div class="col"><?php echo $r3c10 ?></div>
	</div>
	<div class="row mb-1 no-gutters">
		<div class="col"><?php echo $r4c1 ?></div>
		<div class="col"><?php echo $r4c2 ?></div>
		<div class="col"><?php echo $r4c3 ?></div>
		<div class="col"><?php echo $r4c4 ?></div>
		<div class="col"><?php echo $r4c5 ?></div>
		<div class="col"><?php echo $r4c6 ?></div>
		<div class="col"><?php echo $r4c7 ?></div>
		<div class="col"><?php echo $r4c8 ?></div>
		<div class="col"><?php echo $r4c9 ?></div>
		<div class="col"><?php echo $r4c10 ?></div>
	</div>
	<div class="row mb-n3 no-gutters">
		<div class="col"><?php echo $r5c1 ?></div>
		<div class="col"><?php echo $r5c2 ?></div>
		<div class="col"><?php echo $r5c3 ?></div>
		<div class="col"><?php echo $r5c4 ?></div>
		<div class="col"><?php echo $r5c5 ?></div>
		<div class="col"><?php echo $r5c6 ?></div>
		<div class="col"><?php echo $r5c7 ?></div>
		<div class="col"><?php echo $r5c8 ?></div>
		<div class="col"><?php echo $r5c9 ?></div>
		<div class="col"><?php echo $r5c10 ?></div>
	</div>
	<div class="row mb-n2 no-gutters" style="font-size:18px">
		<div class="col"><?php echo $r6c1 ?></div>
		<div class="col"><?php echo $r6c2 ?></div>
		<div class="col"><?php echo $r6c3 ?></div>
		<div class="col"><?php echo $r6c4 ?></div>
		<div class="col"><?php echo $r6c5 ?></div>
		<div class="col"><?php echo $r6c6 ?></div>
		<div class="col"><?php echo $r6c7 ?></div>
		<div class="col"><?php echo $r6c8 ?></div>
		<div class="col"><?php echo $r6c9 ?></div>
		<div class="col"><?php echo $r6c10 ?></div>
	</div>
	<div class="row no-gutters" style="font-size:14px">
		<div class="col"><?php echo $r7c1 ?></div>
		<div class="col"><?php echo $r7c2 ?></div>
		<div class="col"><?php echo $r7c3 ?></div>
		<div class="col"><?php echo $r7c4 ?></div>
		<div class="col"><?php echo $r7c5 ?></div>
		<div class="col"><?php echo $r7c6 ?></div>
		<div class="col"><?php echo $r7c7 ?></div>
		<div class="col"><?php echo $r7c8 ?></div>
		<div class="col"><?php echo $r7c9 ?></div>
		<div class="col"><?php echo $r7c10 ?></div>
	</div>
	<div class="row" style="font-size:20px">
		<div class="col"></div>
		<div class="col"><?php echo $r8c1 ?></div>
		<div class="col"><?php echo $r8c2 ?></div>
		<div class="col"><?php echo $r8c3 ?></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	
</div>