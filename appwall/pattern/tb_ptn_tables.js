function fnPtnTables() {
	let text='';
	text +=	'<div class="form-group form-inline"><div class="d-flex flex-nowrap bg-light">';
	for (let myStyle of myStyles) {
		text +=	'<div id="tb_ptn_table'+myStyle.stylename+'"></div>';
	}
	text +=	'</div></div>';
	document.getElementById('tb_ptn_tables').innerHTML = text;
}