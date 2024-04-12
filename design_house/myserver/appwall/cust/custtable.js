//if (document.getElementById("srh").addEventListener("input", function(){ return true; })) srh=1; else srh=0;
//if (document.getElementById("srh").value=="") srh=0; else srh=1;

loadDoc('customerlist_q1.php?svr_mode='+svr_mode+'&srh=0', myFunction1);
function myFunction1(xhttp) {
	const myObj = JSON.parse(xhttp.responseText);
	
	let text = '<table class="table table-striped"><thead><tr>';
	for (let x in myObj[0]) text += '<th>'+x+'</t>';
	text += '</tr></thead><tbody>';
	for (let x of myObj) {
		text += '<tr>' +
			'<td><a href=../cust/customer_info1.php?svr_mode='+svr_mode+'&sr='+x.sr+'&sv=update >'+x.sr+'</a></td>' +
			'<td>'+x.name+'</td>' +
			'<td>'+x.surname+'</td>' +
			'<td>'+x.mobile_no1+'</td>' +
		'</tr>';
	} text += '</tbody></table>';
	document.getElementById('listtable').innerHTML = text;
}