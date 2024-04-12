function fmg1(myObjs, fmg, fm_obj) {
	let text = '';
	for (myObj of myObjs) {
		for (let x in myObj) {
			text +=	
			'<div class="p-3"> <label for="'+x+'">'+x+'</label>'+
				'<input tabindex="1" type="text" class="form-control p-1" name="'+x+'" value="'+myObj[x]+'" style="width:70px" />'+
			'</div>';
		}
		text += '<button type="submit" class="btn btn-info mx-4 my-4 p-0" name="submit" value="save" style="width:100px; height:48px">Save</button>';
		document.getElementById(fmg).innerHTML = text;
	}
	document.getElementById(fm_obj).value = JSON.stringify(myObjs);
}