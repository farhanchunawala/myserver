<!DOCTYPE html>
<html lang="en">
<head>
	<?php $sr=$_GET['sr'];  echo "<title>$sr Entry</title>";
	$fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
	<script src="https://unpkg.com/vue"></script>
</head>
<body>
<?php
	include $fn_inchtotextround2_php;
	include $fn_cmtoinchtext_php;
	
	if ($_GET['cs']==1) include $create_style_php;
?>

<div class="container-fluid mx-n2">
<form method="post" action="<?php echo "$pattern_save2_php?svr_mode=$svr_mode&sr=$sr"; ?>" >
	<input type="hidden" id="custInfos"	name="custInfos"	value="">
	<input type="hidden" id="bodyMeass"	name="bodyMeass"	value="">
	<input type="hidden" id="mystyles"	name="mystyles"	value="">
	
	<div id="accordion">
		
		<div class="card" style="width:570px"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapse1" style="color:black"><b id='fmg_custinfo_head'></b></a></div>
		<div id="collapse1" class="collapse" data-bs-parent="#accordion"><div class="card-body px-2 py-0">
			<div class="form-group d-flex flex-wrap align-content-around" id='fmg_custinfo'> </div>
		</div></div></div>
		
		<div class="card" style="width:570px"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapse2" style="color:black"><b>Body Measure</b></a></div>
		<div id="collapse2" class="collapse" data-bs-parent="#accordion"><div class="card-body p-0">
			<div class="form-group form-inline d-flex flex-wrap align-content-around" id='fmg_bodymeasure1'></div><hr/>
			<div class="form-group form-inline d-flex flex-wrap align-content-around" id='fmg_bodymeasure2'></div>
		</div></div></div>
		
	</div>
	
	<div class="form-group"><div class="d-flex flex-wrap align-content-around" id="style_row"></div></div>
	<div id="tb_ptn_tables"></div>
	<div class="col-2 mt-2"><button type="submit" class="btn btn-info" value="save" name="submit">Save & Proceed</button></div>
	
</form><hr/>

<form method="post" action="<?php echo $pattern2_php."?svr_mode=$svr_mode&sr=$sr&cs=1";?>" >
<div class="form-group"><div class="d-flex flex-wrap align-content-around">
	<div class="px-4 py-2"><label for="garbtype">Type</label>
	<select class="form-select p-1" name="garbtype" id="garbtype" onchange="ChangeGarbStyle()" style="width:100px">
		<option value="shirt"  >shirt  </option>
		<option value="kurta"  >kurta  </option>
		<option value="kandura">kandura</option>
		<option value="pant"   >pant   </option>
		<option value="salwar" >salwar </option>
	</select></div>
	<div class="px-4 py-2"><label for="garbstyle">Style</label>
	<select class="form-select p-1" name="garbstyle" id="garbstyle" style="width:100px">
			<option value=""></option>
		<optgroup label="pant">
			<option value="bpyjama">bpyjama</option>
			<option value="pyjama">pyjama</option>
		</optgroup>
		<optgroup label="salwar">
			<option value="aligard">aligard</option>
		</optgroup>
	</select></div>
	<div class="px-4 py-2"><label for="garbsubstyle">Sub Style</label>
	<input type="text" class="form-control p-2" name="garbsubstyle" value="" style="width:100px; height:34px" /></div>
	<button type="submit" class="btn btn-info mx-4 my-4 p-0" name="submit" value="save" style="width:100px; height:34px">Create Style</button>
</div></div>
</form>

</div>
<style>
th { padding: 5px;
	background-color: white;
	position: -webkit-sticky;
	position: sticky;
	top: 0;
	white-space: nowrap;
}
td { white-space: nowrap;
}
</style>
<script>
	/*const app = Vue.createApp({
		data: function() {
			return {
				product: 'socks'
			}
		}
	})
	const mountedApp = app.mount('#app')*/
</script>
<script src=<?php echo $fn_inchtocm_js				?> ></script>
<script src=<?php echo $fn_cmtoinch_js				?> ></script>
<script src=<?php echo $fn_inchtotextround2_js	?> ></script>
<script src=<?php echo $fn_texttocmround_js 		?> ></script>
<script src=<?php echo $fn_cmtoinchtext_js 		?> ></script>
<script>
	"use strict";
	var fdir = '../../';
	var custInfos=[];		var bodyMeass=[];		var myStyles=[];
	var custInfo ={};		var bodyMeas ={};		var myStyle ={};
	
	let url		= new URL(window.location.href);
	let svr_mode= url.searchParams.get("svr_mode");
	let sr		= url.searchParams.get("sr");
</script>
<script src="<?php echo $loaddoc_js;			?>"></script>
<script src="<?php echo $fmg_custinfo_js;		?>"></script>
<script src="<?php echo $fmg_bodymeasure_js;	?>"></script>
<script src="<?php echo $tb_ptn_tables_js;	?>"></script>
<script>
	"use strict";
	
	loadDoc(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, fnCustInfo, 'sql='+encodeURIComponent('SELECT * FROM cust WHERE sr='+sr));
	loadDoc(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, fnBodyMeas, 'sql='+encodeURIComponent('SELECT * FROM meas WHERE sr='+sr));
	loadDoc(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, stylecatch2, 'sql='+encodeURIComponent('SELECT * FROM style WHERE sr='+sr));
	// loadDoc("styleinfo.php?svr_mode="+svr_mode+"&sr="+sr, stylecatch2);
	
	function stylecatch2(xhttp) {
		myStyles = JSON.parse(xhttp.responseText);
		let text='';
		for (myStyle of myStyles) {
			text +=	'<div class="px-3 py-2"><label for="'+myStyle.stylename+'">'+myStyle.stylename+'</label>'+
							'<input id="sx'+myStyle.stylename+'" tabindex="1" type="number" class="form-control" name="'+myStyle.stylename+'" style="width:100px" onchange="stylecatch()" />'+
						'</div>';
		}
		document.getElementById('style_row').innerHTML = text;
		fnPtnTables();
	}
	
	function stylecatch() {
		for (myStyle of myStyles) { myStyle.garbcount = document.getElementById('sx'+myStyle.stylename).value;
			fnPtnTable();
			loadDoc('tb_garb_info.php	?svr_mode='+svr_mode+'&sr='+sr+'&garbtype='+myStyle.garbtype+'&stylename='+myStyle.stylename+'&garbcount='+myStyle.garbcount, fnGarbInfo, '');
			fnGarbFit();
			fnGarbStyle();
			loadDoc('tb_garb_sp.php		?svr_mode='+svr_mode+'&sr='+sr+'&garbtype='+myStyle.garbtype+'&stylename='+myStyle.stylename+'&garbcount='+myStyle.garbcount, fnGarbSp, '');
		}
		var myStylesJson = JSON.stringify(myStyles);
		document.getElementById('mystyles').value = myStylesJson;
	}
</script>
<script src="<?php echo $tb_ptn_table_js;		?>"></script>
<script src="<?php echo $tb_garb_info_js;		?>"></script>
<script src="<?php echo $tb_garb_fit_js;		?>"></script>
<script src="<?php echo $tb_garb_style2_js;	?>"></script>
<script src="<?php echo $tb_garb_sp_js;		?>"></script>
<?php mysqli_close($dbc); ?>

</body>
</html>