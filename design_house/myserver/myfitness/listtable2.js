function listTable(myObjs, table, id) {
	
	let text = '<table class="table table-striped"><thead><tr>';
	for (let myObj in myObjs[0]) text += '<th>'+myObj+'</th>';
	text += '</tr></thead><tbody>';
	for (let myObj of myObjs) {
		text += '<tr>';
		for (let x in myObj) {
			if (x==Object.keys(myObj)[0])	text += '<td><a href='+table+'info.php?svr_mode='+svr_mode+'&'+Object.keys(myObj)[id]+'='+myObj[Object.keys(myObj)[id]]+'&sv=0>'+myObj[x]+'</td>';
			else						text += '<td>'+myObj[x]+'</td>';
		} text += '</tr>';
	} text += '</tbody></table>';
	
	document.getElementById("listtable").innerHTML = text;
}