loadDoc('fmg_pattern_table2.php?svr_mode='+svr_mode+'&sr='+sr, myFunction3);
function myFunction3(xhttp) {
	const myObj = JSON.parse(xhttp.responseText);
	
	document.getElementById('fmg_pattern_table').innerHTML = text;
}