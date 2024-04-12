function texttocmround(x) {
	
	var a = x.toString();
	
	if (a.includes("+")) {
		
		a.replace("+", "");
		var b = parseFloat(a);
		c = (b + 0.125)/0.3937008;
		
	} else if (a.includes("=")) {
		
		a.replace("=", "");
		var b = parseFloat(a);
		c = (b - 0.125)/0.3937008;
		
	} else {
		var b = parseFloat(a);
		c = b/0.3937008;
	}
	
	return c;
	
}