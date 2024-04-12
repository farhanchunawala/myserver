function fnGarbStyle() {
	for (myStyle of myStyles) {
		let garb_category = (myStyle.garbtype=='shirt' || myStyle.garbtype=='kurta' || myStyle.garbtype=='kandura') ? 'top' :  'btm' ;
		
		const styleOpts = {
			sub_style:[],	collar_type:[],	cuff_ln:[],		cuff_type:[],	pocket_type:[],	shoulder_type:[],		taweez_type:[],
			belt_type:[],	chainfly:[],		pocket:[],		backpocket:[],	watchpocket:[],	crease:[],				bottom_type:[],
		}
		
		if (myStyle.garbtype=='shirt') styleOpts.sub_style = ['oshirt', 'bshirt', 'bshirtsc'];
		else if (myStyle.garbtype=='kurta' || myStyle.garbtype=='kandura') styleOpts.sub_style = ['straight', 'round'];
		
		if (garb_category=='top') styleOpts.collar_type = ['rmpc', 'mrmpc', 'lspc', 'bc', 'nocollar'];
		
		if (garb_category=='top') styleOpts.cuff_ln = ['1.27', '2.54', '3.81', '5.08', '5.72', '6.35', '7.62'];
		
		if (garb_category=='top') styleOpts.cuff_type = ['cut', 'square', 'round', 'nocuff', 'halfsleeve'];
		
		if (garb_category=='top') styleOpts.pocket_type = ['nopocket', 'v', 'square', 'round', 'flap', 'wallet'];
		else styleOpts.pocket_type = ['xp', 'sp', 'cp'];
		
		if (garb_category=='top') styleOpts.shoulder_type = ['regular', 'noshoulder', 'vshoulder', 'dvshoulder'];
		
		if (myStyle.garbtype=='kurta' || myStyle.garbtype=='kandura') styleOpts.taweez_type = ['v', 'square'];
		
		if (garb_category=='btm') styleOpts.belt_type = ['lbelt', 'cbelt', 'lbelt_side_lastic', 'cbelt_side_lastic', 'lbelt_back_lastic', 'cbelt_back_lastic', 'nari_lastic', 'nari', 'lastic'];
		
		if (garb_category=='btm') styleOpts.chainfly = ['no', 'yes'];
		
		if (garb_category=='btm') styleOpts.pocket = ['0', '1', '2'];
		
		if (garb_category=='btm') styleOpts.backpocket = ['0', '1', '2'];
		
		if (garb_category=='btm') styleOpts.watchpocket = ['0', '1', '2'];
		
		if (myStyle.garbtype=='pant') styleOpts.crease = ['fc', 'sc'];
		
		if (myStyle.garbtype=='salwar') styleOpts.bottom_type = ['nocanvas', 'canvas'];
		
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
			if (l==1 && styleOpts[x].length!=0) {
				text += '<tr><td>'+x+'</td>';
				for (let c=0; c<=myStyle.garbcount; c++) {
					for (let y of styleOpts[x]) sel[x+y]='';
					if (c==0 && typeof myStyle[x]!=='undefined')  for (let y of styleOpts[x])  sel[x+y] = (myStyle[x]==y) ? 'selected' : '' ;
					
					text +=	'<td><select class="form-select p-0" tabindex="" name="'+myStyle.stylename+x+c+'" style="width:120px">'+
								'<option value="default">Default</option>';
					for (let y of styleOpts[x]) {
						let dp = (x=='cuff_ln') ? cmtoinchtext(y) : y ;
						text += '<option value="'+y+'" '+sel[x+y]+'>'+dp+'</option>';
					}
					text += '</select></td>';
				}
				text += '</tr>';
			} else if (l==2) {
			for (let c=0; c<=myStyle.garbcount; c++) text += '<tr><td>'+x+'</td><td><input tabindex="" type="text" class="form-control p-1" name="'+myStyle.stylename+x+c+'" value="'+myStyle[x]+'" style="width:120px" /></td></tr>';
			}
		}
		
		text +=	'</tbody>'+
					'</table>'+
					'</div></div></div>';
		let el = document.getElementById('tb_garbstyle'+myStyle.stylename);
		if (el != null) el.innerHTML = text;
	}
}