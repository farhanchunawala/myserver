function fnBodyMeas(xhttp) {
	bodyMeass = JSON.parse(xhttp.responseText);
	
	let text1='', text2='', l=0;
	for (bodyMeas of bodyMeass) {
	for (let x in bodyMeas) {
		if (x=='shoulder_ln') l=1;
		// else if (x=='shoulder_ln') l=2;
		if (l==1) {
			text1 +=
			'<div class="p-3">'+
				'<label class="form-inline" for="'+x+'">'+x+'</label>'+
				'<div><div class="btn-group">'+
				'<input  tabindex="110" type="text"  class="form-control p-1"  id="'+x+'in"  value="'+inchtotextround(bodyMeas[x]*0.39370)+'"		style="height:36px; width:60px; font-size: 16px"  oninput=inchtocm(this.value,"'+x+'")  onchange=inchtocm(this.value,"'+x+'") />'+
				'<input  tabindex="130" type="text"  class="form-control p-1"  id="'+x+'cm"  value="'+parseFloat(bodyMeas[x]).toFixed(1)+'"  name="'+x+'"	style="height:36px; width:50px; font-size: 16px"  oninput=cmtoinch(this.value,"'+x+'")  onchange=cmtoinch(this.value,"'+x+'") />'+
			'</div></div></div>';
		// } else if (l==2) {
			// text2 +=
			// '<div class="p-3">'+
				// '<label class="form-inline" for="'+x+'">'+x+'</label>'+
				// '<div><div class="btn-group">'+
				// '<input  tabindex="110" type="text"  class="form-control p-1"  id="'+x+'in"  value="'+inchtotextround(bodyMeas[x]*0.39370)+'"		style="height:36px; width:60px; font-size: 16px"  oninput=inchtocm(this.value,"'+x+'")  onchange=inchtocm(this.value,"'+x+'") />'+
				// '<input  tabindex="130" type="text"  class="form-control p-1"  id="'+x+'cm"  value="'+parseFloat(bodyMeas[x]).toFixed(1)+'"  name="'+x+'"	style="height:36px; width:50px; font-size: 16px"  oninput=cmtoinch(this.value,"'+x+'")  onchange=cmtoinch(this.value,"'+x+'") />'+
			// '</div></div></div>';
		}
		if (x=='calf') l=0;
	}}
	document.getElementById('fmg_bodymeasure1').innerHTML = text1;
	document.getElementById('fmg_bodymeasure2').innerHTML = text2;
	
	document.getElementById('bodyMeass').value = JSON.stringify(bodyMeass);
}