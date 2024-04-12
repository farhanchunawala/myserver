function fnGarbStyle() {
	for (myStyle of myStyles) {
		let garb_category = (myStyle.garbtype=='shirt' || myStyle.garbtype=='kurta' || myStyle.garbtype=='kandura') ? 'top' :  'btm' ;
		
		const myObj2 = {
			ar_sub_style		: (garb_category=='top') ? ['oshirt', 'bshirt', 'bshirtsc', 'straight', 'round', 'kali'] : ['nokali', 'kali'],
			ar_collar_type		: ['rmpc', 'mrmpc', 'lspc', 'bc', 'nocollar'],
			ar_cuff_ln			: ['1.27', '2.54', '3.81', '5.08', '5.72', '6.35', '7.62'],
			ar_cuff_type		: ['cut', 'square', 'round', 'nocuff', 'halfsleeve'],
			ar_pocket_type		: (garb_category=='top') ? ['nopocket', 'v', 'square', 'round', 'flap', 'wallet'] : ['xp', 'sp', 'cp'],
			ar_shoulder_type	: ['regular', 'noshoulder', 'vshoulder', 'dvshoulder'],
			ar_taweez_type		: ['v', 'square'],
			ar_belt_type		: ['lbelt', 'cbelt', 'nari_lastic', 'nari', 'lastic'],
			ar_chainfly			: ['no', 'yes'],
			ar_pocket			: ['0', '1', '2'],
			ar_backpocket		: ['0', '1', '2'],
			ar_watchpocket		: ['0', '1', '2'],
			ar_crease			: ['fc', 'sc'],
			ar_bottom_type		: ['nocanvas', 'canvas'],
		}
		
		const sel = {};
		let text='', l=0;
		text +=	'<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapsestyle'+myStyle.stylename+'" style="color:black"><b>Style</b></a></div>'+
					'<div id="collapsestyle'+myStyle.stylename+'" class="collapse" data-bs-parent="#accordionstyle'+myStyle.stylename+'">'+
					'<div class="card-body px-2 py-0">'+
					'<table class="table table-borderless table-sm">'+
					'<thead><tr><th></th></tr></thead>'+
					'<tbody>';
		for (let x in myStyle) {
			if (x=='sub_style') l=1; else if (x=='note1') l=2; else if (x=='garbcount') l=0;
			if (l==1) {
				text += '<tr><td>'+x+'</td>';
				for (let c=0; c<=myStyle.garbcount; c++) {
					for (let y of myObj2['ar_'+x]) sel[x+y]='';
					if (c==0 && typeof myStyle[x]!=='undefined')  for (let y of myObj2['ar_'+x])  sel[x+y] = (myStyle[x]==y) ? 'selected' : '' ;
					
					text +=	'<td><select class="form-select p-0" tabindex="" name="'+myStyle.stylename+x+c+'" style="width:120px">'+
								'<option value="default">Default</option>';
					for (let y of myObj2['ar_'+x]) {
						let dp = (x=='cuff_ln') ? cmtoinchtext(y) : y ;
						text += '<option value="'+y+'" '+sel[x+y]+'>'+dp+'</option>';
					}
					text += '</select></td>';
				}
				text += '</tr>';
			} else if (l==2) {
			text +=	'<tr><td>'+x+'</td><td><input tabindex="" type="text" class="form-control p-1" name="'+myStyle.stylename+x+'" value="" style="width:120px" /></td></tr>';
			}
		}
		
		text +=	'</tbody>'+
					'</table>'+
					'</div></div></div>';
		let el = document.getElementById('tb_garbstyle'+myStyle.stylename);
		if (el != null) el.innerHTML = text;
	}
}