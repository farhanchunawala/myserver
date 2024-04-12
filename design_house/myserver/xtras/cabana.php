<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cb</title>
	<?php
	$fdir='';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	?>
</head>
<body>
<a onclick="printit()">
<h6 style=" text-align: center">JK MARKETING 1/4/20 - 21<br/>
3102, HATINA CHOHARA<br/>
AHMEDABAD/380001<br/>
A92<br/>
Jogeshwari west<br/>
Mumbai-400102<br/></h6>

<table  class="table">
<thead>
<tr><th>&nbsp</th><th></th><th></th><th>Cash Memo</th></tr>
<tr><th>&nbsp</th><th>Date</th><th>Bill No.</th><th>Amount</th></tr>
</thead>
<tbody>
<tr><td>&nbsp</td><td>27-12-21</td><td>08</td><td>21675</td></tr>
<tr><td>&nbsp</td><td>27-12-21</td><td>09</td><td>44925</td></tr>
</tbody>
<tfoot><td></td><td></td><td></td><td><b>Total:</b> 66600</td></tfoot>
</table>
<a onclick="printit()">

<script>
function printit() {
	window.print();
}
</script>
</body>
</html>