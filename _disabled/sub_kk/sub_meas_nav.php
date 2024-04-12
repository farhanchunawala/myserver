<ul class="nav nav-tabs" role="tablist">
	<li class="nav-item"><a class="nav-link <?php echo $acn_shirt; ?>" data-toggle="tab" href="#shirt" tabindex="1">Shirt</a></li>
	<li class="nav-item"><a class="nav-link <?php echo $acn_kurta; ?>" data-toggle="tab" href="#kurta" tabindex="2">Kurta</a></li>
	<li class="nav-item"><a class="nav-link <?php echo $acn_pathani; ?>" data-toggle="tab" href="#pathani" tabindex="3">Pathani</a></li>
	<li class="nav-item"><a class="nav-link <?php echo $acn_kandura; ?>" data-toggle="tab" href="#kandura" tabindex="4">Kandura</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pant" tabindex="5">Pant</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#bpyjama" tabindex="6">Bpyjama</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pyjama" tabindex="7">Pyjama</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#salwar" tabindex="8">Salwar</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#aligard" tabindex="9">Aligard</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#churidar" tabindex="10">Churidar</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#safari" tabindex="11">Safari</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#suit" tabindex="12">Suit</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#waistcoat" tabindex="13">waistcoat</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sadri" tabindex="14">sadri</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sherwani" tabindex="15">Sherwani</a></li>
</ul>

<div><div><div><div>
<div class="tab-content">
	
	<div class="tab-pane container-fluid <?php echo $act_shirt; ?>" id="shirt">
		<?php
			$garb_type = 'shirt';
			include 'dimension/measure.php';
			include 'dimension/dim_calculations.php';
			include 'info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid <?php echo $act_kurta; ?>" id="kurta">
		<?php
			$garb_type = 'kurta';
			include 'dimension/measure.php';
			include 'dimension/dim_calculations.php';
			include 'info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid <?php echo $act_pathani; ?>" id="pathani">
		<?php
			$garb_type = 'pathani';
			include 'dimension/measure.php';
			include 'dimension/dim_calculations.php';
			include 'info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid <?php echo $act_kandura; ?>" id="kandura">
		<?php
			$garb_type = 'kandura';
			include 'dimension/measure.php';
			include 'dimension/dim_calculations.php';
			include 'info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="pant">
		<?php
			$garb_type = 'pant';
			include 'dimension/measure.php';
			include 'info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="bpyjama">
		<?php
			$garb_type = 'bpyjama';
			include 'dimension/measure.php';
			include 'info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="pyjama">
		<?php
			$garb_type = 'pyjama';
			include 'dimension/measure.php';
			include 'info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="salwar">
		<?php
			$garb_type = 'salwar';
			include 'dimension/measure.php';
			include 'info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="aligard">
		<?php
			$garb_type = 'aligard';
			include 'dimension/measure.php';
			include 'info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="churidar">
		<?php
			$garb_type = 'churidar';
			include 'dimension/measure.php';
			include 'info.php';
		?>
	</div>
	
</div>
</div></div></div></div>
