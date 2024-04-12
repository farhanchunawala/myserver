function fnCustInfo(xhttp) {
	custInfos = JSON.parse(xhttp.responseText);
	let text = '';
	for (custInfo of custInfos) {
		for (let x in custInfo) {
			text +=	
			'<div class="p-4"> <label for="'+x+'">'+x+'</label>'+
				'<input tabindex="1" type="text" class="form-control p-2" name="'+x+'" value="'+custInfo[x]+'" style="width:135px" />'+
			'</div>';
		}
	document.getElementById('fmg_custinfo').innerHTML = text;
	document.getElementById('fmg_custinfo_head').innerHTML = custInfo.sr+' '+custInfo.name+' '+custInfo.surname;	
	}
	document.getElementById('custInfos').value = JSON.stringify(custInfos);
}