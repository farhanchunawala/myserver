<!DOCTYPE html>
<html lang="en">
<head>
	<?php $sr=$_GET['sr'];  echo "<title>$sr Entry</title>";
	$fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
</head>
<body>
<?php
	include $fn_inchtotextround2_php;
	include $fn_cmtoinchtext_php;
	
	include $atb_cust_php;
	if ($_GET['csv']==1) include $sub_cust_save_php;
	
	include $atb_meas_php;
	if ($_GET['msv']==1) { $arr='atb_meas2'; include $sub_meas_save_php; }
	
	$qry='entry1';  $select='*';  $table='entry';  $whr='';  $order_by='ORDER BY garb_id DESC';  $limit='LIMIT 1';  $qm=1;
	include $query_select_php;
	$garb_id = ${'rq_'.$qry}['garb_id'];
	
	//retrieving all styles from db and counting each one passed from customer_info by $_POST
	$qry='stylefit';  $select='*';  $table='style';  $whr="WHERE sr=$sr";  $order_by='';  $limit='';  $qm=0;
	include $query_select_php;
	while (${'rq_'.$qry} = mysqli_fetch_array(${'result_'.$qry})) {
		$stylename = ${'rq_'.$qry}['stylename'];
		$a_garbstyle[$stylename]['stylename'] = ${'rq_'.$qry}['stylename'];
		$a_garbstyle[$stylename]['garbtype']  = ${'rq_'.$qry}['garbtype'];
		$a_garbstyle[$stylename]['garbstyle'] = ${'rq_'.$qry}['garbstyle'];
		$a_garbstyle[$stylename]['garbsubstyle']  = ${'rq_'.$qry}['garbsubstyle'];
	} foreach ($a_garbstyle as $var) ${$var['stylename'].'_count'} = $_POST[$var['stylename']];
	
?>
<div class="container-fluid mx-n2">
<form method="post" action="<?php echo $pattern_save_php."?svr_mode=$svr_mode&sr=$sr&garb_id=$garb_id&csv=1&msv=1";
foreach ($a_garbstyle as $var) echo '&'.$var['stylename'].'c='.${$var['stylename'].'_count'} ; ?>" >
	
	<div id="accordion">
		<div class="card" style="width:570px"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapse1" style="color:black"><b id='fmg_custinfo_head'></b></a></div>
		<div id="collapse1" class="collapse" data-bs-parent="#accordion"><div class="card-body px-2 py-0">
			<div class="form-group d-flex flex-wrap align-content-around" id='fmg_custinfo'> </div>
		</div></div></div>
		
		<div class="card" style="width:570px"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapse2" style="color:black"><b>Body Measure</b></a></div>
		<div id="collapse2" class="collapse" data-bs-parent="#accordion"><div class="card-body p-0">
			<div class="form-group form-inline d-flex flex-wrap align-content-around" id='fmg_bodymeasure1'></div><hr/>
			<div class="form-group form-inline d-flex flex-wrap align-content-around" id='fmg_bodymeasure2'></div>
		</div></div></div>
	</div>
	<div class="form-group form-inline"><div class="d-flex flex-nowrap bg-light">
	<?php
		$tx = -1;
		foreach ($a_garbstyle as $var) {
			$garbcount = ${$var['stylename'].'_count'};
			$stylename = $var['stylename'];
			$garbtype  = $var['garbtype'];
			$garbstyle = $var['garbstyle'];
			$garbsubstyle  = $var['garbsubstyle'];
			if($garbcount>='0'){
				$tx=$tx+1;
				($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? $garb_category='top' :  $garb_category='btm' ;
				include $atb_style_php;
				?>
				
				<div id="accordion<?php echo $stylename ?>">
				<div class="card"><div class="card-header" style="background-color:lightgrey"><a class="btn" data-bs-toggle="collapse" href="#collapse<?php echo $stylename ?>" style="color:black"><b><?php echo "$stylename x $garbcount"; ?></b></a></div>
				<div id="collapse<?php echo $stylename ?>" class="collapse show" data-bs-parent="#accordion<?php echo $stylename ?>"><div class="card-body px-2 py-0">
					
					<div id="tb_garb_info" ></div>
					<div id="accordionstyle<?php echo $stylename ?>">
						
						<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapsefit<?php echo $stylename ?>" style="color:black"><b>Fit</b></a></div>
							<div id="collapsefit<?php echo $stylename ?>" class="collapse" data-bs-parent="#accordionstyle<?php echo $stylename ?>">
								<div class="card-body px-2 py-0" id='tb_stylefit'></div>
							</div>
						</div>
						
						<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapsestyle<?php echo $stylename ?>" style="color:black"><b>Style</b></a></div>
							<div id="collapsestyle<?php echo $stylename ?>" class="collapse" data-bs-parent="#accordionstyle<?php echo $stylename ?>">
								<div class="card-body px-2 py-0" id="tb_garbstyle" ></div>
							</div>
						</div>
						
						<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapsesp<?php echo $stylename ?>" style="color:black"><b>SP</b></a></div>
							<div id="collapsesp<?php echo $stylename ?>" class="collapse" data-bs-parent="#accordionstyle<?php echo $stylename ?>">
								<div class="card-body px-2 py-0" id="tb_garbsp" ></div>
							</div>
						</div>
						
					</div>
				</div></div></div></div>
			<?php }
		}
	?>
	<div class="col-2 mt-2"><button type="submit" class="btn btn-info" value="save" name="submit">Save & Proceed</button></div>
	</div></div>
	
</form>
</div>
<style>
th {padding: 5px;
	background-color: white;
	position: -webkit-sticky;
	position: sticky;
	top: 0;
	white-space: nowrap;
}
td {white-space: nowrap;
}
</style>
<script src=<?php //echo $fn_stylecount_js		?> ></script>
<script src=<?php echo $fn_inchtocm_js				?> ></script>
<script src=<?php echo $fn_cmtoinch_js				?> ></script>
<script src=<?php echo $fn_inchtotextround2_js	?> ></script>
<script src=<?php echo $fn_texttocmround_js 		?> ></script>
<script>
	let url		= new URL(window.location.href);
	let svr_mode= url.searchParams.get("svr_mode");
	let sr		= url.searchParams.get("sr");
</script>
<script src="<?php echo $loaddoc_js;			?>"></script>
<script src="<?php echo $fmg_custinfo_js;		?>"></script>
<script src="<?php echo $fmg_bodymeasure_js;	?>"></script>
<script src="<?php echo $tb_garb_info_js;		?>"></script>
<script src="<?php echo $tb_garb_fit_js;		?>"></script>
<script src="<?php echo $tb_garb_style_js;	?>"></script>
<script src="<?php echo $tb_garb_sp_js;		?>"></script>
<?php mysqli_close($dbc); ?>

</body>
</html>