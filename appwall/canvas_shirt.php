<!--	parent
notepad++ C:/xampp/htdocs/myserver/pattern.php
-->
<!--	children
notepad++ C:/xampp/htdocs/myserver/plugs_n_libs/bootstrapcdn.php
notepad++ C:/xampp/htdocs/myserver/sub/sub_svr_mode.php

notepad++ C:/xampp/htdocs/myserver/sub/sub_cust_save.php
notepad++ C:/xampp/htdocs/myserver/sub/sub_meas_save.php
notepad++ C:/xampp/htdocs/myserver/sub/sub_pattern_sv.php
notepad++ C:/xampp/htdocs/myserver/sub/sub_sp.php
-->

<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 3 -->
<head>
	<title>Canvas Shirt</title>
	<?php $svr_mode='local_kkms';  $fdir='';  include $fdir.'svr_mode.php'; ?>
	<style>
	canvas {
		border:1px solid #d3d3d3;
		background-color: #f1f1f1;
	}
	</style>
</head>
<body onload="startGame()">

<script>
var myGamePiece;

function startGame() {
	myGameArea.start();
	myGamePiece = new component(30, 30, "red", 0, 0);
}

var myGameArea = {
	canvas : document.createElement("canvas"),
	start : function() {
		this.canvas.width = 480;
		this.canvas.height = 270;
		this.context = this.canvas.getContext("2d");
		document.body.insertBefore(this.canvas, document.body.childNodes[0]);
	}
}

function component(width, height, color, x, y) {
	this.width = width;
	this.height = height;
	this.x = x;
	this.y = y;    
	ctx = myGameArea.context;
	ctx.fillStyle = color;
	ctx.fillRect(this.x, this.y, this.width, this.height);
	
	//ctx.moveTo(this.x, this.y);
	ctx.translate(0, 0);
	ctx.lineTo(this.x+100, this.y+100);
	ctx.lineTo(this.x+100, this.y+300);
	ctx.lineTo(this.x+600, this.y+300);
	ctx.lineTo(this.x+600, this.y+this.y+250);
	ctx.lineTo(this.x+550, this.y+150);
	ctx.lineTo(this.x+450, this.y+150);
	ctx.arc(this.x+450, this.y+100, 50, 0.5 * Math.PI, 1 * Math.PI);
	ctx.lineTo(this.x+400, this.y+100);
	ctx.lineTo(this.x+100, this.y+100);
	ctx.stroke();
}

/* 
function component(width, height, color, x, y) {
	this.width = width;
	this.height = height;
	this.x = x;
	this.y = y;    
	ctx = myGameArea.context;
	ctx.fillStyle = color;
	ctx.fillRect(this.x, this.y, this.width, this.height);
}

drawshirt();
function drawshirt() {
	ctx.beginPath();
	ctx.moveTo(100, 100);
	ctx.lineTo(100, 300);
	ctx.lineTo(600, 300);
	ctx.lineTo(600, 250);
	ctx.lineTo(550, 150);
	ctx.lineTo(450, 150);
	ctx.arc(450, 100, 50, 0.5 * Math.PI, 1 * Math.PI);
	ctx.lineTo(400, 100);
	ctx.lineTo(100, 100);
	ctx.stroke();
} */
</script>

<canvas class='m-5' id="mycanvas" width="1250" height="520" style="border:1px solid #000000;"></canvas>
<script>
	var canvas = document.getElementById("mycanvas");
	var ctx = canvas.getContext("2d");
</script>

<?php mysqli_close($dbc); ?>
</body>
</html>