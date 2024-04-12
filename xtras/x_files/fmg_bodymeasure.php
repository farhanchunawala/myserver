<?php
	$qry='atb_meas2';  $arr='atb_meas2';  $select='*';  $table='meas';  $whr="WHERE sr=$sr";  $order_by='';  $limit='';  $qm=1;
	include $query_select_php;
	foreach ($$arr as $var) $$var=isset(${'rq_'.$qry}[$var]) ? ${'rq_'.$qry}[$var] : 0 ;
	$measure_date=isset(${'rq_'.$qry}['measure_date']) ? strtotime(${'rq_'.$qry}['measure_date']) : 0 ;
?>
<div class="card" style="width:570px"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapse2" style="color:black"><b>Body Measure</b></a></div>
<div id="collapse2" class="collapse" data-bs-parent="#accordion"><div class="card-body px-0 py-0">
	
	<div class="form-group form-inline d-flex flex-wrap align-content-around">
		<?php foreach($atb_meas21 as $var) { echo '<div class="px-3 py-3">
			<label class="form-inline" for="'.$var.'">'.ucwords($var).'</label>
			<div><div class="btn-group">
			<input  tabindex="110" type=text  class="form-control p-1"  id='.$var.'in  value='.inchtotextround($$var*0.39370).'  style="height:36px; width:60px; font-size: 16px"  oninput=inchtocm(this.value,"'.$var.'")  onchange=inchtocm(this.value,"'.$var.'") />
			<input  tabindex="130" type=text  class="form-control p-1"  id='.$var.'cm  name='.$var.'   value='.round($$var,1).'  style="height:36px; width:50px; font-size: 16px"  oninput=cmtoinch(this.value,"'.$var.'")  onchange=cmtoinch(this.value,"'.$var.'") />
		</div></div></div>'; } ?>
	</div><hr/>
	<div class="form-group form-inline d-flex flex-wrap align-content-around">
		<?php foreach($atb_meas22 as $var) { echo '<div class="px-3 py-3">
			<label class="form-inline" for="'.$var.'">'.ucwords($var).'</label>
			<div><div class="btn-group">
			<input   tabindex="111" type=text  class="form-control p-1"  id='.$var.'in  value='.inchtotextround($$var*0.39370).'  style="height:36px; width:60px; font-size: 16px"  oninput=inchtocm(this.value,"'.$var.'")  onchange=inchtocm(this.value,"'.$var.'") />
			<input   tabindex="131" type=text  class="form-control p-1"  id='.$var.'cm  name='.$var.'   value='.round($$var,1).'  style="height:36px; width:50px; font-size: 16px"  oninput=cmtoinch(this.value,"'.$var.'")  onchange=cmtoinch(this.value,"'.$var.'") />
		</div></div></div>'; } ?>
	</div>
	
</div></div></div>