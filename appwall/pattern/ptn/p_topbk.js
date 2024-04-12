function p_TopBk(x, y) {
	ctx.moveTo		(x, y);
	ctx.translate	(x, y);
	
	ctx.beginPath	();
	ctx.moveTo		(0,								0);
	ctx.lineTo		(-shirt.bk.x_Length,			0);
	ctx.lineTo		(-shirt.bk.x_Length,			-shirt.bk.y_Bottom);
	ctx.lineTo		(-shirt.bk.x_Seatln,			-shirt.bk.y_Seat);
	ctx.lineTo		(-shirt.bk.x_Stomachln,		-shirt.bk.y_Stomach);
	ctx.lineTo		(-shirt.bk.x_Chestln,		-shirt.bk.y_Chest);
	ctx.arcTo		(-shirt.bk.x_Chestln,		-shirt.bk.y_Shoulder,	-shirt.bk.x_Chestln+1,  -shirt.bk.y_Shoulder,  shirt.bk.y_ShoulderToChest);
	ctx.lineTo		(0,								-shirt.bk.y_Shoulder);
	ctx.closePath	();
	
	// ctx.beginPath	();
	// ctx.moveTo		(-shirt.bk.x_Rounding,		0);
	// ctx.lineTo		(-shirt.bk.x_Length,			0);
	// ctx.lineTo		(-shirt.bk.x_Length,			-shirt.bk.y_Bottom);
	// ctx.lineTo		(-shirt.bk.x_Seatln,			-shirt.bk.y_Seat);
	// ctx.lineTo		(-shirt.bk.x_Stomachln,		-shirt.bk.y_Stomach);
	// ctx.lineTo		(-shirt.bk.x_Chestln,		-shirt.bk.y_Chest);
	// ctx.arcTo		(-shirt.bk.x_Chestln,		-shirt.bk.y_Shoulder,	-shirt.bk.x_Chestln+1,  -shirt.bk.y_Shoulder,  shirt.bk.y_ShoulderToChest);
	// ctx.lineTo		(-shirt.bk.x_Collarln,		-shirt.bk.y_Shoulder);
	// ctx.lineTo		(0,								-shirt.bk.y_Rounding);
	// ctx.arcTo		(-shirt.bk.x_Rounding,		-shirt.bk.y_Rounding,	-shirt.bk.x_Rounding,  -shirt.bk.y_Rounding+1,  shirt.bk.x_Rounding);
	// ctx.closePath	();
	
}
