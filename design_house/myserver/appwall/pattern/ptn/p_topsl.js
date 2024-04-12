function p_TopSl(x, y, sx, sy, r) {
	ctx.save();
	ctx.translate	(x, y);
	ctx.scale 		(sx, sy);
	ctx.rotate		(r * Math.PI / 180);
	
	ctx.save();
	ctx.beginPath();
	ctx.moveTo				(0,							0);
	ctx.quadraticCurveTo	(shirt.sl.hala.x/2,  	0,  shirt.sl.hala.x,  shirt.sl.hala.y);
	ctx.lineTo				(shirt.sl.sleeve.x,		shirt.sl.sleeve.y);
	ctx.lineTo				(shirt.sl.sleeve.x0,		shirt.sl.sleeve.y);
	ctx.closePath();
	ctx.globalAlpha=0.7;  ctx.fillStyle="lightblue";  ctx.fill();
	ctx.restore();
	
	ctx.save();
	ctx.font="2px Arial";
	ctx.beginPath();
	ctx.moveTo	(0,  0-0.6);
	ctx.lineTo	(0,  shirt.sl.sleeve.y+0.6);
	
	for (let pt in shirt.sl) {
		ctx.moveTo		(-0.6,						shirt.sl[pt]['y']);
		ctx.lineTo		(shirt.sl[pt]['x']+0.6,	shirt.sl[pt]['y']);
		ctx.moveTo		(shirt.sl[pt]['x'],		shirt.sl[pt]['y']-0.6);
		ctx.lineTo		(shirt.sl[pt]['x'],		shirt.sl[pt]['y']+0.6);
		
		for (let mk in shirt.sl[pt]) {
			if (!(mk=='x' || mk=='y')) {
				ctx.save();
				if (pt=="neck" || mk!="x0") { ctx.textBaseline="middle"; tb=0.5;	ctx.fillStyle="red" }
				else								 { ctx.textBaseline="bottom"; tb=0;		ctx.fillStyle="red" }
				ctx.moveTo (shirt.sl[pt][mk], shirt.sl[pt]['y']+0.6);
				ctx.lineTo (shirt.sl[pt][mk], shirt.sl[pt]['y']-0.6);
				ctx.translate (shirt.sl[pt][mk], shirt.sl[pt]['y']);
				ctx.scale 			(-1, 1);
				ctx.rotate			(-90 * Math.PI / 180);
				ctx.fillText (cmtoinchtext(shirt.sl[pt]['x']-shirt.sl[pt][mk]),  0+0.25+tb,  0);
				ctx.restore();
			}
		}
		ctx.save();
		ctx.scale(-1, 1);  ctx.fillStyle="darkblue";  ctx.textBaseline="middle";
		if (shirt.sl[pt]['y']!=0) ctx.fillText	(cmtoinchtext(shirt.sl[pt]['y']), 0+0.9, shirt.sl[pt]['y']);
		ctx.restore();
	}
	
	ctx.closePath();
	ctx.strokeStyle="darkgrey";  ctx.lineWidth=0.2;  ctx.stroke();
	ctx.restore();
	
	ctx.restore();
}
