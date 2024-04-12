function fnGarbSp(xhttp) {
	const myObj = JSON.parse(xhttp.responseText);
	for (let myStyle of myStyles) {
		let text='';
		
		text +=	'<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapsesp'+myStyle.stylename+'" style="color:black"><b>SP</b></a></div>'+
					'<div id="collapsesp'+myStyle.stylename+'" class="collapse" data-bs-parent="#accordionstyle'+myStyle.stylename+'">'+
					'<div class="card-body px-2 py-0">'+
					'<table class="table table-borderless table-sm">'+
					'<thead><tr><th></th></tr></thead>'+
					'<tbody>';
		for (let x in myObj) {
			text +=	'<tr><td>'+x+'</td>';
			for (c=1; c<=myStyle.garbcount; c++) {
				text +=	'<td><div class="btn-group">';
				if (x=='fabric_sp' || x=='stitching_sp' || x=='pattern_sp' || x=='emb_sp') {
					text +=	'<input type="text" class="form-control p-1" name="'+myStyle.stylename+x+c+'"		value="" style="width:52px" />'+
								'<input type="text" class="form-control p-0" name="'+myStyle.stylename+x+'o'+c+'"	value="" style="width:34px" placeholder="code" />'+
								'<input type="text" class="form-control p-0" name="'+myStyle.stylename+x+'d'+c+'"	value="" style="width:34px" />';
				} else if (x=='pana' || x=='clothln') {
					text +=	'<input type="text" class="form-control p-1" name="'+myStyle.stylename+x+c+'"		value="" style="width:70px" />'+
								'<input type="text" class="form-control p-1" name="'+myStyle.stylename+x+'fd'+c+'"	value="" style="width:50px" />';
				} else {
					text +=	'<input type="text" class="form-control p-2" name="'+myStyle.stylename+x+c+'"		value="" style="width:120px" />';
				}
				text +=	'</div></td>';
			}
			text +=	'</tr>';
		}
		text +=
			'</tbody>'+
			'</table>'+
			'</div></div></div>';
		let el = document.getElementById('tb_garbsp'+myStyle.stylename);
		if (el != null) el.innerHTML = text;
	}
}