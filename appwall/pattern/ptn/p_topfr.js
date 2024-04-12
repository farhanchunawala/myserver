function p_TopFr(x, y, sx, sy, r) {
	ctx.save();
	ctx.translate	(x, y);
	ctx.scale 		(sx, sy);
	ctx.rotate		(r * Math.PI / 180);
	
	ctx.save();
	ctx.beginPath();
		ctx.moveTo		(0,									0);
		ctx.lineTo		(shirt.fr.neck.x,					shirt.fr.neck.y);
		ctx.lineTo		(shirt.fr.shoulder.x,			shirt.fr.shoulder.y);
		ctx.lineTo		(shirt.fr.halaline.x,			shirt.fr.halaline.y);
		ctx.arcTo		(shirt.fr.shoulder.x,			shirt.fr.chest.y,	shirt.fr.shoulder.x+1,  shirt.fr.chest.y,  shirt.fr.shoulder.y);
		ctx.lineTo		(shirt.fr.chest.x,				shirt.fr.chest.y);
		ctx.lineTo		(shirt.fr.stomach.x,				shirt.fr.stomach.y);
		ctx.lineTo		(shirt.fr.seat.x,					shirt.fr.seat.y);
		ctx.lineTo		(shirt.fr.bottom.x,				shirt.fr.bottom.y);
		ctx.lineTo		(0,									shirt.fr.bottom.y);
	ctx.closePath();
	ctx.globalAlpha=0.7;  ctx.fillStyle="lightblue";  ctx.fill();
	ctx.restore();
	
	
	ctx.beginPath();
	ctx.font="2px Arial";
	ctx.moveTo	(0,  0-0.6);
	ctx.lineTo	(0,  shirt.fr.bottom.y+0.6);
	
	for (let pt in shirt.fr) {
		if (pt!="halaline") {
			ctx.moveTo		(-0.6,						shirt.fr[pt]['y']);
			ctx.lineTo		(shirt.fr[pt]['x']+0.6,	shirt.fr[pt]['y']);
			ctx.moveTo		(shirt.fr[pt]['x'],		shirt.fr[pt]['y']-0.6);
			ctx.lineTo		(shirt.fr[pt]['x'],		shirt.fr[pt]['y']+0.6);
			
			for (let mk in shirt.fr[pt]) {
				if (!(mk=='x' || mk=='y' || (myStyle.garbtype=="kurta" && mk=='fpatti'))) {
					ctx.save();
					if (shirt.fr[pt]['y']==0 || mk!="x0") { ctx.textBaseline="middle"; tb=0.5;	ctx.fillStyle="red" }
					else								 { ctx.textBaseline="bottom"; tb=0;		ctx.fillStyle="red" }
					ctx.moveTo (shirt.fr[pt][mk], shirt.fr[pt]['y']+0.6);
					ctx.lineTo (shirt.fr[pt][mk], shirt.fr[pt]['y']-0.6);
					ctx.translate (shirt.fr[pt][mk], shirt.fr[pt]['y']);
					ctx.scale 			(-1, 1);
					ctx.rotate			(-90 * Math.PI / 180);
					ctx.fillText (cmtoinchtext(shirt.fr[pt]['x']-shirt.fr[pt][mk]),  0+0.25+tb,  0);
					ctx.restore();
				}
			}
			ctx.save();
			ctx.scale(-1, 1);  ctx.fillStyle="darkblue";  ctx.textBaseline="middle";
			if (shirt.fr[pt]['y']!=0) ctx.fillText	(cmtoinchtext(shirt.fr[pt]['y']), 0+0.9, shirt.fr[pt]['y']);
			ctx.restore();
		}
	}
	ctx.closePath();
	ctx.strokeStyle="darkgrey";  ctx.lineWidth=0.2;  ctx.stroke();
	
	ctx.restore();
}
