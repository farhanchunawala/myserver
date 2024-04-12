function TopBk(fr) {
	
	this.y_Markback = (myStyle.garbtype=='shirt') ? inchtocm(1) : 0; 
	let backtype='';
	if (backtype=='op') {
		
		if (myStyle.collartype=='bc' || myStyle.collartype=='nocollar')	this.x_Rounding = inchtocm(1.125);
		else																					this.x_Rounding = inchtocm(1.750);
		this.x_Collarln	= inchtocm(2);
		this.x_Length		= fr.x_Length + inchtocm(2.5);
		this.x_Chestln		= fr.x_Chestln + inchtocm(2.5);
		this.x_Stomachln	= fr.x_Stomachln + inchtocm(2.5);
		this.x_Seatln		= fr.x_Seatln + inchtocm(2.5);
		
		this.y_Rounding	= inchtocm(2.5);
		this.y_Shoulder	= parseFloat(myMeas.shoulder_ln)/2 + inchtocm(0.25);
		this.y_Chest		= fr.y_Chest - this.y_Markback;
		
		this.x_Halaline = this.x_Chestln - this.x_Collarln - (this.y_Chest - this.y_Shoulder);
		//this.x_Halaline = this.x_Chestln - inchtocm(2.5) - (this.y_Chest - this.y_Shoulder);
		
	} else {
		this.x_Length		= fr.x_Length - inchtocm(2.5);
		this.x_Chestln		= fr.x_Chestln - inchtocm(2.5);
		this.x_Stomachln	= fr.x_Stomachln - inchtocm(2.5);
		this.x_Seatln		= fr.x_Seatln - inchtocm(2.5);
		
		this.y_Shoulder	= parseFloat(myMeas.shoulder_ln)/2 + inchtocm(0.5);
		this.y_Chest		= fr.y_Chest - this.y_Markback;
		
		this.x_Halaline	= this.x_Chestln - (this.y_Chest - this.y_Shoulder);
	}
	
	this.y_Stomach			= fr.y_Stomach - this.y_Markback;
	this.y_Seat				= fr.y_Seat - this.y_Markback;
	this.y_Bottom			= fr.y_Bottom - this.y_Markback;
	
	//secondary
	this.x_ChestToStomach	= this.x_Stomachln	- this.x_Chestln;
	this.x_StomachToSeat		= this.x_Seatln		- this.x_Stomachln;
	this.x_SeatToLength		= this.x_Length	 	- this.x_Seatln;
	
	this.y_NeckToShoulder	= this.y_Shoulder		- this.y_Neck
	this.y_ShoulderToChest	= this.y_Chest			- this.y_Shoulder;
	this.y_ChestToStomach	= this.y_Stomach		- this.y_Chest;
	this.y_StomachToSeat		= this.y_Seat			- this.y_Stomach;
	this.y_SeatToBottom		= this.y_Bottom		- this.y_Seat;
	
}