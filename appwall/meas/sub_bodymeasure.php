<?php
	include $fn_inchtotextround2_php;
	
	include $atb_cust_php;
	include $atb_meas_php;
	
	$querys_cust = "SELECT * FROM $custtable WHERE sr=$sr ";
	$result_cust  = mysqli_query($dbc, $querys_cust) or die('<b>Error bodymeasure.php/querys_cust: </b><br/>'.mysqli_error($dbc));
	$rq_cust   = mysqli_fetch_array($result_cust);
	foreach ($atb_cust2 as $var) $$var = $rq_cust[$var];
	
	$querys_meas = "SELECT * FROM meas WHERE sr=$sr ";
	$result_meas  = mysqli_query($dbc, $querys_meas) or die('<b>Error bodymeasure.php/querys_meas: </b><br/>'.mysqli_error($dbc));
	$rq_meas   = mysqli_fetch_array($result_meas);
	foreach ($atb_meas2 as $var) $$var = $rq_meas[$var];
	$measure_date = strtotime($rq_meas['measure_date']);
?>

<form method="post" action="bodymeasure.php?svr_mode=<?php echo $svr_mode; ?>&sr=<?php echo $sr; ?>&csv=<?php echo $csv; ?>&msv=1">
<div class="form-group">

<div class="d-flex flex-wrap align-content-around">
	<div class="p-4"><label for="sr">Sr</label>
		<input tabindex="1" type="text" class="form-control" name="sr" value="<?php echo $sr; ?>" style="width:80px" />
	</div>
	<?php foreach($atb_cust2 as $var) { ?> <div class="p-4">
		<label for="<?php echo $var; ?>"><?php echo ucwords($var); ?></label>
		<input tabindex="1" type="text" class="form-control" name="<?php echo $var; ?>" value="<?php echo $$var; ?>" style="width:80px" />
	</div> <?php } ?>
	<button tabindex="2" type="submit" class="btn btn-info mt-5 mb-5 ml-4 mr-4" value="save" name="submit"style="height:45px">Save</button>
</div> <hr/>

<div class="form-inline d-flex flex-wrap align-content-around">
	<?php foreach($atb_meas2 as $var) { echo '<div class="p-4">
		<label class="form-inline" for="'.$var.'">'.ucwords($var).'</label>
		<div class="btn-group">
		<input  type=text  class="form-control p-1"  id='.$var.'cm  name='.$var.'   value='.round($$var,1).'  style=width:50px  oninput=cmtoinch(this.value,"'.$var.'")  onchange=cmtoinch(this.value,"'.$var.'")/>
		<input  type=text  class="form-control p-1"  id='.$var.'in  value='.inchtotextround($$var*0.39370).'  style=width:60px  oninput=inchtocm(this.value,"'.$var.'")  onchange=inchtocm(this.value,"'.$var.'")/>
	</div></div>'; } ?>
</div>

</div>
</form>

<script src=<?php echo $fn_inchtocm_js ?> ></script>
<script src=<?php echo $fn_cmtoinch_js ?> ></script>
<script src=<?php echo $fn_inchtotextround2_js ?> ></script>
<script src=<?php echo $fn_texttocmround_js ?> ></script>