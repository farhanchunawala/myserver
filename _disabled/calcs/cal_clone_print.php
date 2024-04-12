<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 4 -->
<head>
	<?php
		$sr = $_GET['sr'];
		$garb_type = $_GET['garb_type'];
	?>
	<title><?php echo "$sr $garb_type"?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>
#mar1 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
</style>

<?php
	
	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	include '../function/fn_inchtotext.php';
	include '../function/fn_shouldertrim.php';
	
	include '../dimension/measure.php';
	
	if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') {?>
	
	<div id='mar1'>
		<div class="row mb-2 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"><?php echo "<b><u>&nbsp$sr&nbsp</u></b>" ?></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
		</div>
		<div class="row mb-n4 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"><?php echo "(".inchtotext($hala).")" ?></div>
			<div class="col"><?php echo inchtotext($t1) ?></div>
			<div class="col"><?php echo inchtotext($t2) ?></div>
			<div class="col"><?php echo inchtotext($t3) ?></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"><u></u></div>
		</div>
		<div class="row mb-n1 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"><u><?php echo inchtotext($pocketdown) ?></u></div>
		</div>
		<div class="row mb-1 no-gutters">
			<div class="col"><?php
				if ($garb_style=='bshirt') {
						echo "<span class=\"border border-dark pr-1 pl-1\"><b>Bshirt :</b></span>";
					} elseif ($garb_style=='bshirtsc') {
						echo "<span class=\"border border-dark pr-1 pl-1\"><b>Bshirt-sc :</b></span>";
					} elseif ($garb_style=='oshirt') {
						echo "<u><b>ᴼshirt : </b></u>";
					} elseif ($garb_style=='round') {
						echo "<span class=\"border-left border-bottom rounded-circle border-dark p-1\"><b>$garb_type :</b></span>";
					} else {
						echo "<span class=\"border border-dark pr-1 pl-1\"><b>$garb_type :</b></span>";
					}
			?></div>
			<div class="col"><?php echo inchtotext($length) ?></div>
			<div class="col"><?php echo inchtotext($shoulder) ?></div>
			<div class="col"><?php echo inchtotext($sleeve) ?></div>
			<div class="col"><?php echo inchtotext($chest) ?></div>
			<div class="col"><?php echo inchtotext($stomach) ?></div>
			<div class="col"><?php echo inchtotext($seat) ?></div>
			<div class="col"><?php echo inchtotext($collar) ?></div>
			<div class="col"><?php echo inchtotext($cuffbr).' x'; ?></div>
			<div class="col">
			<?php
				if ($pocket=="pocketa") {
					echo "4 x 4½";
				} elseif ($pocket=="pocketb") {
					echo "4¼ x 4¾";
				} elseif ($pocket=="pocketc") {
					echo "4½ x 5¼";
				} elseif ($pocket=="pocketd") {
					echo "4¾ x 5½";
				} elseif ($pocket=="pockete") {
					echo "5 x 5¾";
				} elseif ($pocket=="pocketf") {
					echo "5¼ x 6";
				} elseif ($pocket=="pocketg") {
					echo "5½ x 6¼";
				} elseif ($pocket=="pocketh") {
					echo "5¾ x 6½";
				} else {
					echo "";
				}
			?>
			</div>
		</div>
		<div class="row mb-n3 no-gutters">
			<div class="col">
				<?php if ($sleevefit=="slm") {
					echo "SL= ".inchtotext($biceps);
				} elseif ($sleevefit=="sl") {
					echo "SL ".inchtotext($biceps);
				} elseif ($sleevefit=="slp") {
					echo "SL+ ".inchtotext($biceps);
				} elseif ($sleevefit=="sm") {
					echo "SM ".inchtotext($biceps);
				} elseif ($sleevefit=="smp") {
					echo "SM+ ".inchtotext($biceps);
				} elseif ($sleevefit=="sf") {
					echo "SF ".inchtotext($biceps);
				} elseif ($sleevefit=="sfp") {
					echo "SF+ ".inchtotext($biceps);
				} else {
					echo inchtotext($biceps);
				} ?>
			</div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
		</div>
	</div>
	
	<?php } else { ?>
	
	<div id='mar1'>
		<div class="row mb-n2 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col "><?php echo "<b><u>&nbsp$sr&nbsp</u></b>" ?></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
		</div>
		<div class="row mb-n4 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col">
				<?php if ($pleats==='0' && ($garb_type==='pant' || $garb_type==='bpyjama')) {
					echo "<u>No plts</u>";
				} elseif ($garb_type==='pant' || $garb_type==='bpyjama') {
					echo "<u>$pleats"."plts</u>";
				} ?>
			</div>
		</div>
		<div class="row mb-n2 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
	<div class="col"><?php if ($garb_type==='pyjama' || $garb_type==='salwar' || $garb_type==='aligard' || $garb_type==='churidar') echo '<u>'.inchtotext($pleats).'</u>'; ?></div>
			<div class="col"></div>
			<div class="col"><?php echo "<u>5~</u>" ?></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
		</div>
		<div class="row mb-n2 no-gutters">
			<div class="col"><?php echo "<u><b>$garb_style $garb_type : </b></u>"; ?></div>
			<div class="col"><?php echo inchtotext($length) ?></div>
			<div class="col"><?php echo inchtotext($fork) ?></div>
			<div class="col"><?php echo inchtotext($waist) ?></div>
			<div class="col"><?php echo inchtotext($seat) ?></div>
			<div class="col"><?php echo '<u>'.inchtotext($thigh_fix).'</u>' ?></div>
			<div class="col"><?php echo '<u>'.inchtotext($kneeln).'</u>' ?></div>
			<div class="col"><?php echo '<u>'.inchtotext($calfln).'</u>' ?></div>
			<div class="col"><?php echo inchtotext($bottom) ?></div>
			<div class="col"><?php echo inchtotext($cuttingfactor) ?></div>
		</div>
		<div class="row no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"><?php echo inchtotext($thigh_loose) ?></div>
			<div class="col"><?php echo inchtotext($knee_loose) ?></div>
			<div class="col"><?php echo inchtotext($calf_loose) ?></div>
			<div class="col"></div>
			<div class="col"></div>
		</div>
	</div>
	
	<?php }
	
	mysqli_close($dbc);
	
?>

</body>
</html>