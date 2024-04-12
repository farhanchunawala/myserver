loadDoc("../cust/customer_info_qstyle.php?svr_mode="+svr_mode+"&sr="+sr, myFunction3);
	const stylename = [];
	const garbcount = [];
	let gc=0;
	function myFunction3(xhttp) {
		const myObj = JSON.parse(xhttp.responseText);
		let text='', i=0;
		for (let x of myObj) {
			stylename[i] = x;
			garbcount[i] = 0;
			i++;
			text +=	'<div class="p-4"><label for="'+x+'">'+x+'</label>'+
							'<input id="sx'+x+'" tabindex="1" type="number" class="form-control" name="'+x+'" style="width:80px" onchange="stylecatch()" />'+
						'</div>';
		}
		text += '<button tabindex="98" type="submit" class="btn btn-info m-5" value="save" name="submit" style="height:42px">NEXT</button>';
		document.getElementById('style_row').innerHTML = text;
	}