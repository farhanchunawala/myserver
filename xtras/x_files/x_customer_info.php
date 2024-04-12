<!DOCTYPE html>
<html lang="en">
<head>
	<title>Customer Info</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	$sr=$_GET['sr'];
	
	function inchtotext($x) {
		$a = $x;
		$a = str_replace(".125","±",$a);
		$a = str_replace(".250","¼",$a);
		$a = str_replace(".375","¼±",$a);
		$a = str_replace(".500","½",$a);
		$a = str_replace(".625","½±",$a);
		$a = str_replace(".750","¾",$a);
		$a = str_replace(".875","=",$a);
			return $a;
	}
	
	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');

	$query = "SELECT * FROM `customers` WHERE sr=$sr";

	$result = mysqli_query($dbc, $query)
		or die('Error querying database.');
	
	$row = mysqli_fetch_array($result);

	mysqli_close($dbc);
?>
	
<div class="container pt-3 ml-3">
	<div class="mx-auto" style="width:300px">
		<h2>Customer Info</h2>
	</div>

	<form method="post" action="customer_info2.php">
		<div class="form-group">
		<div class="d-flex p-3">
			<div class="p-3">
				<label for="sr">Sr.No.</label>
				<input tabindex="1" type="text" class="form-control" name="sr" value="<?php echo $row['sr'] ?>" />
			</div>
			<div class="p-3">
				<label for="name">Name</label>
				<input tabindex="2" type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" />
			</div>
			<div class="p-3">
				<label for="sirname">Sirname</label>
				<input tabindex="3" type="text" class="form-control" name="sirname" value="<?php echo $row['sirname'] ?>" />
			</div>
			<div class="p-3">
				<label for="mobile_no">Mobile No</label>
				<input tabindex="4" type="text" class="form-control" name="mobile_no" value="<?php echo $row['mobile_no'] ?>" />
			</div>
			<div class="p-4 mt-4">
				<button type="submit" class="btn btn-info" value="save" name="submit_customer_info">Save</button>
			</div>
		</div>
		</div>
	</form>

	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#shirt">Shirt</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#pant">Pant</a>
		</li>
	</ul>

	<div class="tab-content">
	
		<div class="tab-pane container active" id="shirt">	
			<?php
				$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
					or die('Error connecting to MySQL server.');
	
				$query = "SELECT `sr`,`shirt_length`, `shirt_shoulder`, `shirt_sleeve`, `shirt_chest`, `shirt_stomach`, `shirt_seat`, ".
					"`shirt_collar`, `shirt_cuff`, `shirt_hala`, `shirt_t1`, `shirt_t2`, `shirt_t3`, `shirt_collar_type`, `shirt_cuff_type`, ".
					"`shirt_pocket` FROM `measurements` WHERE sr=$sr";
	
				$result = mysqli_query($dbc, $query)
					or die('Error querying database.');
		
				$row = mysqli_fetch_array($result);
	
				mysqli_close($dbc);
			?>
			<div class="container pt-3 ml-3">
			<form method="post" action="shirt2.php?sr=<?php echo $sr; ?>">
				<div class="form-group">
				<div class="d-flex p-3 mt-5 flex-wrap align-content-around" style="height:300px">
					<div class="p-3">
						<label for="shirt_length">Length</label>
						<input tabindex="2" type="text" class="form-control" name="shirt_length" value="<?php echo $row['shirt_length'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_shoulder">Shoulder</label>
						<input tabindex="3" type="text" class="form-control" name="shirt_shoulder" value="<?php echo $row['shirt_shoulder'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_sleeve">Sleeve</label>
						<input tabindex="4" type="text" class="form-control" name="shirt_sleeve" value="<?php echo $row['shirt_sleeve'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
							<label for="shirt_chest">Chest</label>
							<input tabindex="5" type="text" class="form-control" name="shirt_chest" value="<?php echo $row['shirt_chest'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_stomach">Stomach</label>
						<input tabindex="6" type="text" class="form-control" name="shirt_stomach" value="<?php echo $row['shirt_stomach'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_seat">Seat</label>
						<input tabindex="7" type="text" class="form-control" name="shirt_seat" value="<?php echo $row['shirt_seat'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_collar">Collar</label>
						<input tabindex="8" type="text" class="form-control" name="shirt_collar" value="<?php echo $row['shirt_collar'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_cuff">Cuff</label>
						<input tabindex="9" type="text" class="form-control" name="shirt_cuff" value="<?php echo $row['shirt_cuff'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_hala">Hala</label>
						<input tabindex="10" type="text" class="form-control" name="shirt_hala" value="<?php echo $row['shirt_hala'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_t1">t1</label>
						<input tabindex="11" type="text" class="form-control" name="shirt_t1" value="<?php echo $row['shirt_t1'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_t2">t2</label>
						<input tabindex="12" type="text" class="form-control" name="shirt_t2" value="<?php echo $row['shirt_t2'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_t3">t3</label>
						<input tabindex="13" type="text" class="form-control" name="shirt_t3" value="<?php echo $row['shirt_t3'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_collar_type">Pocket</label>
						<input tabindex="14" type="text" class="form-control" name="shirt_collar_type" value="<?php echo $row['shirt_collar_type'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_cuff_type">Pocket</label>
						<input tabindex="15" type="text" class="form-control" name="shirt_cuff_type" value="<?php echo $row['shirt_cuff_type'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="shirt_pocket">Pocket</label>
						<input tabindex="16" type="text" class="form-control" name="shirt_pocket" value="<?php echo $row['shirt_pocket'] ?>" style="width:100px" />
					</div>
					<div class="p-4 mt-4">
						<button type="submit" class="btn btn-info" value="save" name="submit_shirt">Save</button>
					</div>
					<div class="p-4 mt-4">	
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#shirt_modal">View</button>
					</div>
						<div class="modal fade" id="shirt_modal" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body">
											
										<?php
											$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
												or die('Error connecting to MySQL server.');
					
											$query = "SELECT `shirt_length`, `shirt_shoulder`, `shirt_sleeve`, `shirt_chest`, `shirt_stomach`, 
												`shirt_seat`, `shirt_collar`, `shirt_cuff`, `shirt_hala`, `shirt_t1`, `shirt_t2`, `shirt_t3`, 
												`shirt_collar_type`, `shirt_cuff_type`, `shirt_pocket` FROM `measurements` WHERE sr=$sr";
					
											$result = mysqli_query($dbc, $query)
												or die('Error querying database.');

											while ($row = mysqli_fetch_array($result)){
												$shirt_length = inchtotext($row['shirt_length']);
												$shirt_shoulder = inchtotext($row['shirt_shoulder']);
												$shirt_sleeve = inchtotext($row['shirt_sleeve']);
												$shirt_chest = inchtotext($row['shirt_chest']);
												$shirt_stomach = inchtotext($row['shirt_stomach']);
												$shirt_seat = inchtotext($row['shirt_seat']);
												$shirt_collar = inchtotext($row['shirt_collar']);
												$shirt_cuff = inchtotext($row['shirt_cuff']);
												$shirt_hala = inchtotext($row['shirt_hala']);
												$shirt_t1 = inchtotext($row['shirt_t1']);
												$shirt_t2 = inchtotext($row['shirt_t2']);
												$shirt_t3 = inchtotext($row['shirt_t3']);
												$shirt_collar_type = inchtotext($row['shirt_collar_type']);
												$shirt_cuff_type = inchtotext($row['shirt_cuff_type']);
												$shirt_pocket = inchtotext($row['shirt_pocket']);
											}

											mysqli_close($dbc);
											
											
											
											echo "$shirt_length - $shirt_shoulder - $shirt_sleeve - $shirt_chest - $shirt_stomach - 
												$shirt_seat - $shirt_collar - $shirt_cuff - $shirt_hala - $shirt_t1 - $shirt_t2 - 
												$shirt_t3 - $shirt_collar_type - $shirt_cuff_type - $shirt_pocket";
											
										?>	
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
				</div>
				</div>
			</form>
			</div>
		</div>
				
		<div class="tab-pane container fade" id="pant">
			<?php
				$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
					or die('Error connecting to MySQL server.');
				
				$query = "SELECT `sr`,`pant_length`, `pant_fork`, `pant_waist`, `pant_seat`, `pant_thighs`, `pant_calf_length`, 
					`pant_calf`, `pant_bottom`, `pant_cuttingfactor`, `pant_plits` FROM `measurements` WHERE sr=$sr";
				
				$result = mysqli_query($dbc, $query)
					or die('Error querying database.');
					
				$row = mysqli_fetch_array($result);
				
				mysqli_close($dbc);
			?>

			<div class="container pt-3 ml-3">
			<form method="post" action="pant2.php?sr=<?php echo $sr; ?>">
				<div class="form-group">
				<div class="d-flex p-3 mt-5 flex-wrap align-content-around" style="height:300px">
					<div class="p-3">
						<label for="pant_length">Length</label>
						<input tabindex="2" type="text" class="form-control" name="pant_length" value="<?php echo $row['pant_length'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="pant_fork">Fork</label>
						<input tabindex="3" type="text" class="form-control" name="pant_fork" value="<?php echo $row['pant_fork'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="pant_waist">Waist</label>
						<input tabindex="4" type="text" class="form-control" name="pant_waist" value="<?php echo $row['pant_waist'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="pant_seat">Seat</label>
						<input tabindex="5" type="text" class="form-control" name="pant_seat" value="<?php echo $row['pant_seat'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="pant_thighs">Thighs</label>
						<input tabindex="6" type="text" class="form-control" name="pant_thighs" value="<?php echo $row['pant_thighs'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="pant_calf_length">Calf Length</label>
						<input tabindex="7" type="text" class="form-control" name="pant_calf_length" value="<?php echo $row['pant_calf_length'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="pant_calf">Pant Calf</label>
						<input tabindex="8" type="text" class="form-control" name="pant_calf" value="<?php echo $row['pant_calf'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="pant_bottom">Bottom</label>
						<input tabindex="9" type="text" class="form-control" name="pant_bottom" value="<?php echo $row['pant_bottom'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="pant_cuttingfactor">CF</label>
						<input tabindex="10" type="text" class="form-control" name="pant_cuttingfactor" value="<?php echo $row['pant_cuttingfactor'] ?>" style="width:100px" />
					</div>
					<div class="p-3">
						<label for="pant_plits">Plits</label>
						<input tabindex="11" type="text" class="form-control" name="pant_plits" value="<?php echo $row['pant_plits'] ?>" style="width:100px" />
					</div>
					<div class="p-4 mt-4">
						<button type="submit" class="btn btn-info" value="save" name="submit_pant">Save</button>
					</div>
					<div class="p-4 mt-4">	
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#pant_modal">View</button>
					</div>
						<div class="modal " id="pant_modal" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body">	
									<?php
										$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
											or die('Error connecting to MySQL server.');
				
										$query = "SELECT `pant_length`, `pant_fork`, `pant_waist`, `pant_seat`, `pant_thighs`, `pant_calf_length`, 
											`pant_calf`, `pant_bottom`, `pant_cuttingfactor`, `pant_plits` FROM `measurements` WHERE sr=$sr";
				
										$result = mysqli_query($dbc, $query)
											or die('Error querying database.');
										
										while ($row = mysqli_fetch_array($result)){
											$pant_length = inchtotext($row['pant_length']);
											$pant_fork = inchtotext($row['pant_fork']);
											$pant_waist = inchtotext($row['pant_waist']);
											$pant_seat = inchtotext($row['pant_seat']);
											$pant_thighs = inchtotext($row['pant_thighs']);
											$pant_calf_length = inchtotext($row['pant_calf_length']);
											$pant_calf = inchtotext($row['pant_calf']);
											$pant_bottom = inchtotext($row['pant_bottom']);
											$pant_cuttingfactor = inchtotext($row['pant_cuttingfactor']);
											$pant_plits = inchtotext($row['pant_plits']);
										}

										mysqli_close($dbc);
										
										echo "$pant_length - $pant_fork - $pant_waist - $pant_seat - $pant_thighs - $pant_calf_length - 
											$pant_calf - $pant_bottom - $pant_cuttingfactor - $pant_plits";
									
									?>	
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
				</div>
				</div>
			</form>
	</div>
	</div>
</div>

</div>
</body>
</html>