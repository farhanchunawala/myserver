function TopFr() {
	this.neck={x0:0};  this.shoulder={x0:0};  this.chest={x0:0};  this.stomach={x0:0};  this.seat={x0:0};  this.bottom={x0:0}; this.halaline={x0:0};
	
	if (myStyle.garbtype=='shirt') {
		this.neck.fpatti		= inchtocm(2);
		this.bottom.fpatti	= this.neck.fpatti;
		
		this.neck.mkback		= inchtocm(1)+this.neck.fpatti;
		this.shoulder.mkback	= this.neck.mkback;
		this.chest.mkback		= this.neck.mkback;
		this.stomach.mkback	= this.neck.mkback;
		this.seat.mkback		= this.neck.mkback;
		this.bottom.mkback	= this.neck.mkback;
	} else {
		this.neck.fpatti		= 0;
		this.bottom.fpatti	= 0;
	}
	
	if (myStyle.garbtype=='shirt') {
		if (myStyle.substyle=='oshirt')		this.bottom.y = parseFloat(myStyle.length) + inchtocm(1.125);
		else											this.bottom.y = parseFloat(myStyle.length) + inchtocm(0.75 + 1.25);
	} else if (myStyle.garbtype=='kurta')	this.bottom.y = inchtocm(48); //parseFloat(myStyle.length) + inchtocm(0.75 + 0.75);
	
	this.neck.y				= 0;
	this.neck.x				= inchtocm(2.375) + this.neck.fpatti;
	
	this.shoulder.y		= inchtocm(2);
	this.shoulder.x		= (myStyle.garbtype=='shirt') ? parseFloat(myMeas.shoulder_ln)/2 + inchtocm(0.5) + this.neck.fpatti : parseFloat(myMeas.shoulder_ln)/2 + this.neck.fpatti;
	
	this.chest.y			= parseFloat(myStyle.hala);
	this.chest.x			= parseFloat(myStyle.t_chest) + this.neck.fpatti;
	
	this.stomach.y 		= parseFloat(myMeas.shoulder_ln);
	this.stomach.x 		= parseFloat(myStyle.t_stomach) + this.neck.fpatti;
	
	this.seat.y				= (myStyle.garbtype=='shirt') ? this.bottom.y : inchtocm(29);
	this.seat.x				= parseFloat(myStyle.t_seat) + this.neck.fpatti;
	
	this.bottom.x 			= (myStyle.garbtype=='shirt') ? this.seat.x : parseFloat(myStyle.t_bottom) + this.neck.fpatti;
	
	this.halaline.y		= this.chest.y - (this.chest.x - this.shoulder.x);
	this.halaline.x		= this.shoulder.x;
}
