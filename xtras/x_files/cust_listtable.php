<div class="container">
	<h1 class="<?php if ($svr_mode==='kkms_kkms' || $svr_mode==='local_kkms') echo 'mt-5 mb-5'; else echo 'mt-5 mb-5'; ?>"> &nbsp </h1>
	
	<table class="table table-striped">
	<thead>
		<tr>
			<th>Sr.no</th>
			<th>Name</th>
			<?php if ($svr_mode==='kkms_cnv' || $svr_mode==='local_cnv') { ?>
			<th>Surname</th>
			<th>Mobile No.</th>
			<?php } ?>
		</tr>
    </thead>
    <tbody>
		<?php
			$result1 = mysqli_query($dbc, $query1)
			or die('Error querying database query1.');
			
			while ($rowq1 = mysqli_fetch_array($result1)){
				$sr = $rowq1['sr'];
				$name = $rowq1['name'];
				if ($svr_mode==='kkms_cnv' || $svr_mode==='local_cnv') {
					$surname = $rowq1['surname'];
					$mobile_no = $rowq1['mobile_no1'];
				}
				
				echo "<tr>
					<td><a href=customer_info.php?svr_mode=$svr_mode&sr=$sr&csv=0&msv=0>$sr</a></td>
					<td>$name</td>";
					if ($svr_mode==='kkms_cnv' || $svr_mode==='local_cnv') {
						echo "<td>$surname</td>
						<td>$mobile_no</td>";
					}
				echo '</tr>';
			}
			
			mysqli_close($dbc);
		?>
    </tbody>
	</table>
	
</div>