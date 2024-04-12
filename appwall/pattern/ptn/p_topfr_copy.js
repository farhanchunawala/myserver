function TopFr() {
	
	if (myStyle.garbtype=='shirt') {
		if (myStyle.substyle=='oshirt')		this.x_Length = parseFloat(myStyle.length) + inchtocm(1.125);
		else											this.x_Length = parseFloat(myStyle.length) + inchtocm(0.75 + 1.25);
	} else if (myStyle.garbtype=='kurta')	this.x_Length = parseFloat(myStyle.length) + inchtocm(0.75 + 0.75);
	
	this.collar	= { x:inchtocm(2) };
	this.chest	= { x:parseFloat(myStyle.hala), y:parseFloat(myStyle.t_chest) };
	// this.x_Chestln		= parseFloat(myStyle.hala);
	this.x_Stomachln	= parseFloat(myMeas.shoulder_ln);
	if (myStyle.garbtype=='shirt')	this.x_Seatln = this.x_Length;
	else										this.x_Seatln = inchtocm(29); //parseFloat(myStyle.seatln);
	
	this.y_Neck = inchtocm(2.25);
	if (myStyle.garbtype=='shirt')	this.y_Shoulder = parseFloat(myMeas.shoulder_ln)/2 + inchtocm(0.5);
	else										this.y_Shoulder = parseFloat(myMeas.shoulder_ln)/2;
	// this.y_Chest	= parseFloat(myStyle.t_chest);
	this.y_Stomach	= parseFloat(myStyle.t_stomach);
	this.y_Seat		= parseFloat(myStyle.t_seat);
	if (myStyle.garbtype=='shirt')	this.y_Bottom = this.y_Seat;
	else										this.y_Bottom = parseFloat(myStyle.t_bottom);
	
	//secondary
	// this.x_Armhole				= this.x_Chestln		- this.x_Collarln;
	// this.x_Halaline			= this.x_Armhole		- (this.y_Chest - this.y_Shoulder);
	
	// this.x_ChestToStomach	= this.x_Stomachln	- this.x_Chestln;
	// this.x_StomachToSeat		= this.x_Seatln		- this.x_Stomachln;
	// this.x_SeatToLength		= this.x_Length	 	- this.x_Seatln;
	
	// this.y_NeckToShoulder	= this.y_Shoulder		- this.y_Neck
	// this.y_ShoulderToChest	= this.y_Chest			- this.y_Shoulder;
	// this.y_ChestToStomach	= this.y_Stomach		- this.y_Chest;
	// this.y_StomachToSeat		= this.y_Seat			- this.y_Stomach;
	// this.y_SeatToBottom		= this.y_Bottom		- this.y_Seat;
	
	// this.y_frontpatti = (myStyle.garbtype=='shirt') ? inchtocm(2) : 0;
}