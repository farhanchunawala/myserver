function fnPtnTable() {
	let text='';
	text +=	'<div id="accordion'+myStyle.stylename+'">'+
				'<div class="card"><div class="card-header" style="background-color:lightgrey"><a class="btn" data-bs-toggle="collapse" href="#collapse'+myStyle.stylename+'" style="color:black"><b>'+myStyle.stylename+' x '+myStyle.garbcount+'</b></a></div>'+
				'<div id="collapse'+myStyle.stylename+'" class="collapse show" data-bs-parent="#accordion'+myStyle.stylename+'"><div class="card-body px-2 py-0">'+
					
					'<div id="tb_garb_info'+myStyle.stylename+'"></div>'+
					'<div id="accordionstyle'+myStyle.stylename+'">'+
						
						'<div id="tb_stylefit'+myStyle.stylename+'"></div>'+
						'<div id="tb_garbstyle'+myStyle.stylename+'"></div>'+
						'<div id="tb_garbsp'+myStyle.stylename+'"></div>'+
						
					'</div>'+
				'</div></div></div>'+
				'</div>';
				
	document.getElementById('tb_ptn_table'+myStyle.stylename).innerHTML = (myStyle.garbcount > 0 || myStyle.garbcount === '0') ? text: '' ;
}
