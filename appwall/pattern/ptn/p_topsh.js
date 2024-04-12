function p_TopSh(x, y) {
	ctx.moveTo		(x, y);
	ctx.translate	(x, y);
	
	ctx.beginPath	();
	ctx.moveTo		(0,								0);
	ctx.lineTo		(-shirt.sh.x_Length,			0);
	ctx.lineTo		(-shirt.sh.x_Length,			-(shirt.sh.y_Height-shirt.sh.y_Collarln));
	ctx.lineTo		(-shirt.sh.x_Rounding,		-shirt.sh.y_Height);
	ctx.arcTo		(-shirt.sh.x_Rounding,		-(shirt.sh.y_Height-shirt.sh.y_Rounding),	 -shirt.sh.x_Rounding+1,  -(shirt.sh.y_Height-shirt.sh.y_Rounding),  shirt.sh.y_Rounding);
	ctx.lineTo		(0,								-(shirt.sh.y_Height-shirt.sh.y_Rounding));
	ctx.closePath	();
	
}
