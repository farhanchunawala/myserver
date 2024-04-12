	<form method="post" action="link.php?sv=1">
	<div class="form-group">
		
		<label for="mytext"><b>My Text</b></label>
		
		<input tabindex="1" type="text" class="form-control" name="name" value="" style="width:75%" />
		
		<textarea tabindex="1" class="form-control" rows="1" name="mytext" style="width:75%"></textarea>
		
		<select tabindex="1" class="form-control" name="name" style="width:75%">
			<option value="value1">option1</option>
			<option value="value2" <?php echo $s_value2; ?>>option2</option>
		</select>
		
		<button tabindex="1" type="submit" class="btn btn-info" value="save" name="submit">Save</button>
		
		<a href="#" data-toggle="tooltip" class="text-body" title="<?php echo "$t1_diffround , $t1_percent"; ?>%">
		</a>
		
	</div>
	</form>