function loadDoc(url, cFunction, send) {
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {cFunction(this);}
	if (send=='') xhttp.open("GET", url, true); else xhttp.open("POST", url, true);
	if (send!='') xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(send);
}