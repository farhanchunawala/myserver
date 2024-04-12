//Fits max elements in any display. Best wrap
<div class="form-group form-inline d-flex flex-wrap align-content-around">
	<?php foreach($a_meas as $var) { echo '<div class="p-4">
		<label class="form-inline" for="'.$var.'">'.ucwords($var).'</label>
		<div class="btn-group">
		<input  type=text  class="form-control p-1"  id='.$var.'cm  name='.$var.'   value='.round($$var,1).'  style=width:50px  oninput=cmtoinch(this.value,"'.$var.'")  onchange=cmtoinch(this.value,"'.$var.'")/>
		<input  type=text  class="form-control p-1"  id='.$var.'in  value='.inchtotextround($$var*0.39370).'  style=width:60px  oninput=inchtocm(this.value,"'.$var.'")  onchange=inchtocm(this.value,"'.$var.'")/>
	</div></div>'; } ?>
</div>

