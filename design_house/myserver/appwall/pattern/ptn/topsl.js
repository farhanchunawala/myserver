function TopSl() {
	this.hala={x0:0};  this.sleeve={x0:0};
	
	this.hala.y		= inchtocm(4.5);
	this.hala.x		= parseFloat(myStyle.hala);
	
	this.sleeve.y	= parseFloat(myStyle.sleeve_ln) - (parseFloat(myStyle.cuff_ln)-inchtocm(1)) + inchtocm(1);
	this.sleeve.x	= (myStyle.cufftype=='nocuff') ? parseFloat(myStyle.cuff_br)/2+inchtocm(0.5) : parseFloat(myStyle.cuff_br)/2+inchtocm(1) ;
	
}
