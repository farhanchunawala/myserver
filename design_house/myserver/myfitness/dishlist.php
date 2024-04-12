<!DOCTYPE html>
<html lang="en">
<head><title>Dish List</title>
	<?php $fdir='../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php; 
	$svr_mode=$_GET['svr_mode'];?>
</head>
<body>

<?php
	$navtitle='New';  $navlink=$dishinfo_php."?svr_mode=$svr_mode&dish_id=0&sv=0";  include $navbar_php;
?>
<div class="container">
	<h1 class="mt-4 mb-5"> &nbsp </h1>
	<div id='listtable'></div>
</div>

<script>
	let fdir='../';
	let url_string = window.location.href;
	let url = new URL(url_string);
	let svr_mode = url.searchParams.get("svr_mode");
</script>
<script src="<?php echo $loaddoc_js; ?>"></script>
<script src="<?php echo $listtable2_js; ?>"></script>
<script>
	//if (document.getElementById("srh").addEventListener("input", function(){ return true; })) srh=1; else srh=0;
	//if (document.getElementById("srh").value=="") srh=0; else srh=1;
	function dishList(xhttp) {
		const dishes = JSON.parse(xhttp.responseText);
		const myObjs = [];
		
		let i=0;
		for (let dish of dishes) {
			myObjs[i]={};  myObjs[i]['dish_id']='';  myObjs[i]['dish_name']='';  myObjs[i]['ingr']='';
			for (let x in dish) {
				if (x=='dish_id')				myObjs[i]['dish_id'] = dish[x];
				else if (x=='dish_name')	myObjs[i]['dish_name'] = dish[x];
				else if (/ingr/.test(x) && !/qty/.test(x))	myObjs[i]['ingr'] += ''+dish[x]+'';
				else if (/qty/.test(x))		myObjs[i]['ingr'] += '('+dish[x]+'), ';
			} i++;
		}
		listTable(myObjs, 'dish', 1);
	}
	loadDoc(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, dishList, 'sql='+encodeURIComponent('SELECT * FROM dish ORDER BY dish_id'));
</script>
</body>
</html>