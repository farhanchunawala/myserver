// loadDoc('tb_garb_info.php?svr_mode='+svr_mode+'&sr='+sr, fnGarbInfo);
function fnGarbInfo() {
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function(myStyle=myStyle) {
		alert (myStyle.stylename);
		const myObj = JSON.parse(xhttp.responseText);
		let garbtype='kurta';  stylename='kurta_0';  //garbcount=1;
		let text='';
		text +=	'<table class="table table-borderless table-sm">'+
					'<thead><tr><th></th></tr></thead>'+
					'<tbody>';
		for (let x in myObj) {
			if (x!='garb_id') text +=	'<tr><td>'+x+'</td>';
			for (let y of myObj[x]) {
				switch(x) {
					case 'garb_id':		text += '<input type="hidden" id="'+stylename+x+c+'" name="'+stylename+x+c+'" value="'+y+'" >';
						break;
					case 'description':	text += '<td><input type="text" class="form-control p-2" name="'+stylename+x+c+'" value="" style="width:120px" /></td>';
						break;
					case 'pairing':		text += '<td><input type="text" class="form-control p-2" name="'+stylename+x+c+'" value="'+y+'" style="width:120px" /></td>';
						break;
					case 'submit_date':	text += '<td><input type="text" class="form-control p-2" name="'+stylename+x+c+'" value="" placeholder="yyyy-mm-dd" style="width:120px" /></td>';
						break;
				}
			}
			text +=	'</tr>';
		}
		text +=
			'</tbody>'+
			'</table>';
		document.getElementById('tb_garb_info').innerHTML = text;
		
	}
	xhttp.open("GET", 'tb_garb_info.php?svr_mode='+svr_mode+'&sr='+sr);
	xhttp.send();
}

	// const xmlhttp = new XMLHttpRequest();
	// xmlhttp.onload = function() {
		// document.getElementById("txtHint").innerHTML = this.responseText;
	// xmlhttp.open("GET", "gethint.php?q=" + str);
	// xmlhttp.send();
	// }
	