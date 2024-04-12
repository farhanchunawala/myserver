function stylecatch(xhttp) {
	loadDoc("../cust/customer_info_qstyle.php?svr_mode="+svr_mode+"&sr="+sr, stylecatch);
	const myObj = JSON.parse(xhttp.responseText);
	let text='';
	const stylename = [];
	const garbcount = [];
	let i=0; 
	for (let x of myObj) {
		stylename[i] = x;
		garbcount[i] = document.getElementById('sx'+x).value;
		document.getElementById('sx').innerHTML = garbcount;
		i++;
	}
	loadDoc('tb_garb_info.php?svr_mode='+svr_mode+'&sr='+sr, fnGarbInfo);
	loadDoc('tb_garb_fit.php?svr_mode='+svr_mode+'&sr='+sr, fnGarbFit);
	loadDoc('tb_garb_style.php?svr_mode='+svr_mode+'&sr='+sr, fnGarbStyle);
	fnGarbSp();
}