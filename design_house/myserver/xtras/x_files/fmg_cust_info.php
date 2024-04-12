<?php
	$qry='atb_cust2';  $arr='atb_cust2';  $select='*';  $table='cust';  $whr="WHERE sr=$sr";  $order_by='';  $limit='';  $qm=2;
	include $query_select_php;
?>
<div class="card" style="width:570px"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapse1" style="color:black"><b><?php echo "$sr $name $surname"; ?></b></a></div>
<div id="collapse1" class="collapse" data-bs-parent="#accordion"><div class="card-body px-2 py-0">
	
	<div class="form-group d-flex flex-wrap align-content-around">
		<div class="p-4"><label for="sr">Sr</label>
			<input tabindex="1" type="text" class="form-control p-2" name="sr" value="<?php echo $sr; ?>" style="width:135px" />
		</div>
		<?php foreach($atb_cust2 as $var) { ?> <div class="px-4 py-4">
			<label for="<?php echo $var; ?>"><?php echo ucwords($var); ?></label>
			<input tabindex="1" type="text" class="form-control p-2" name="<?php echo $var; ?>" value="<?php echo $$var; ?>" style="width:135px" />
		</div> <?php } ?>
	</div>
	
</div></div></div>