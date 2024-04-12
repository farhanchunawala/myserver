function fnGarbFit() {
	"use strict";
	
	for (myStyle of myStyles) {
	let garb_category = (myStyle.garbtype=='shirt' || myStyle.garbtype=='kurta' || myStyle.garbtype=='kandura') ? 'top' :  'btm' ;
		let text='', l=0;
		text +=
			'<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapsefit'+myStyle.stylename+'" style="color:black"><b>Fit</b></a></div>'+
			'<div id="collapsefit'+myStyle.stylename+'" class="collapse" data-bs-parent="#accordionstyle'+myStyle.stylename+'">'+
			'<div class="card-body px-2 py-0">'+
			'<table class="table table-borderless table-sm">'+
			'<thead><tr><th></th></tr></thead>'+
			'<tbody>';
		for (let x in myStyle) {
			if (garb_category=='top') {
				if (x=='length')		l=1; 
				if (x=='fork_ln')		l=0;
			} else {
				if (x=='length')		l=1;
				if (x=='sleeve_ln')	l=0;
				if (x=='fork_ln')		l=1;
				if (x=='sub_style')	l=0;
			}
			if (l==1) {
				text +=
				'<tr>'+
					'<td>'+x+'</td>'+
					'<td><div class="btn-group">'+
						'<input  tabindex="120" type="text"  class="form-control p-1"  id="'+myStyle.stylename+x+'in"  value="'+inchtotextround(myStyle[x]*0.39370)+'"								style="width:60px"  oninput=inchtocm(this.value,\"'+myStyle.stylename+x+'\")	onchange=inchtocm(this.value,\"'+myStyle.stylename+x+'\") />'+
						'<input  tabindex="141" type="text"  class="form-control p-1"  id="'+myStyle.stylename+x+'cm"  value="'+parseFloat(myStyle[x]).toFixed(1)+'"  name="'+myStyle.stylename+x+'"	style="width:50px"  oninput=cmtoinch(this.value,\"'+myStyle.stylename+x+'\")	onchange=cmtoinch(this.value,\"'+myStyle.stylename+x+'\") />'+
					'</div></td>'+
				'</tr>';
			}
		}
		text +=
			'</tbody>'+
			'</table>'+
			'</div></div></div>';
		let el = document.getElementById('tb_stylefit'+myStyle.stylename);
		if (el != null) el.innerHTML = text;
	}
}