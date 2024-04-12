
function inchtotextround(x) {
	var y = Math.floor(x);
	if (y==0) var a = 0;
	else      var a = x - y;
	
	if	    (a < 0.0625)				z = y;
	else if (a >= 0.0625 && a < 0.1875) z = y+'+';
	else if (a >= 0.1875 && a < 0.3125) z = y+'.25';
	else if (a >= 0.3125 && a < 0.4375) z = y+'.25+';
	else if (a >= 0.4375 && a < 0.5625) z = y+'.5';
	else if (a >= 0.5625 && a < 0.6875) z = y+'.5+';
	else if (a >= 0.6875 && a < 0.8125) z = y+'.75';
	else if (a >= 0.8125 && a < 0.9375) z = (y+1)+'=';
	else if (a >= 0.9375)				z = y+1;
	
	return z
}