function fnGarbInfo(xhttp) {
	const myObj = JSON.parse(xhttp.responseText);
	
	let garb_id=parseInt(myObj.garb_id), pairing=myObj.pairing;
	
	const gid = (function (garb_id) {
		let counter = garb_id;
		return function () { counter += 1; return counter }
	})(garb_id);
	
	const pair = (function pr(pairing) {
		let counter = parseInt(pairing);
		return function () { counter = (counter<97 || counter>=122) ? 97 : counter += 1; return counter }
	})(pairing);
	
	for (let myStyle of myStyles) {
		let garb_category = (myStyle.garbtype=='shirt' || myStyle.garbtype=='kurta' || myStyle.garbtype=='kandura') ? 'top' :  'btm' ;
		
		let text='';
		text +=	'<table class="table table-borderless table-sm">'+
					'<thead><tr><th></th></tr></thead>'+
					'<tbody>';
		for (let x in myObj) {
			if (x=='garb_id') garb_id = parseInt(myObj[x]);
			if (x!='garb_id') text +=	'<tr><td>'+x+'</td>';
			for (let c=1; c<=myStyle.garbcount; c++) {
				
				if (x=='garb_id') garb_id = gid();
				pairing = (x=='pairing' && garb_category=='top') ? pair() : '';
				
				switch(x) {
					case 'garb_id':		text += '<input type="hidden" id="'+myStyle.stylename+x+c+'" name="'+myStyle.stylename+x+c+'" value="'+garb_id+'" >';
						break;
					case 'description':	text += '<td><input type="text" class="form-control p-2" name="'+myStyle.stylename+x+c+'" value="" style="width:120px" /></td>';
						break;
					case 'pairing':		text += '<td><input type="text" class="form-control p-2" name="'+myStyle.stylename+x+c+'" value="'+String.fromCharCode(pairing)+'" style="width:120px" /></td>';
						break;
					case 'submit_date':	text += '<td><input type="text" class="form-control p-2" name="'+myStyle.stylename+x+c+'" value="" placeholder="yyyy-mm-dd" style="width:120px" /></td>';
						break;
				}
			}
			text +=	'</tr>';
		}
		text +=
			'</tbody>'+
			'</table>';
		let el = document.getElementById('tb_garb_info'+myStyle.stylename);
		if (el != null) el.innerHTML = text;
	}
}
