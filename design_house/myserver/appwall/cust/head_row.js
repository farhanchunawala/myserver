loadDoc("../cust/customer_info_q1.php?svr_mode="+svr_mode+"&sr="+sr, myFunction4);
function myFunction4(xhttp) {
	const myObj = JSON.parse(xhttp.responseText);
	let text='';
	text += '<div class="col-9"><h2>'+myObj.sr+' &nbsp '+myObj.name+' '+myObj.surname+'</h2></div>';
	text += '<div class="col-3">';
	if (myObj.mobile_no1!=0) text += '<div class="row no-gutters"><div class="col"><b>Mob1:</b>&nbsp '+myObj.mobile_no1+'</div></div>';
	if (myObj.mobile_no2!=0) text += '<div class="row no-gutters"><div class="col"><b>Mob2:</b>&nbsp '+myObj.mobile_no2+'</div></div>';
	if (myObj.mobile_no3!=0) text += '<div class="row no-gutters"><div class="col"><b>Mob3:</b>&nbsp '+myObj.mobile_no3+'</div></div>';
	text += '</div>';
	document.getElementById('head_row').innerHTML = text;
}