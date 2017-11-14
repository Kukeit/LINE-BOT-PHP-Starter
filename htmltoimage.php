<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
<head>
	<title>Title of the document</title>
	<style>
		body {
			background-color:#555557;
			padding:0;
			margin:0;
			overflow:hidden;
			font-family:sans-serif;
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		canvas {
			border:1px solid #000;
			float:left;
			clear:both;
		}
		#download {
			float:left;
			cursor:pointer;
			color:#ccc;
			padding:3px;
		}
		#download:hover {
			color:#fff;
		}
	/*
	div, input {
	    font-size:16px;
	    font-family:sans-serif;
	    border:1px solid #000;
	    border-radius: 5px;
	    float:left;
	    padding:5px;
	    width:50px;
	    margin:1px 1px;
	    background-color:#bbb;
	}
	input[type='text'] {
	    font-size:16px;
	    font-weight:bold;
	    width:70px;
	    text-align:center;
	    background-color:#fff;
	    padding-bottom:4px;
	}
	input[type='button'] {
	    font-size:16px;
	    font-weight:bold;
	    width:110px;
	    text-align:center;
	    background-color:#333;
	    color:#eee;
	    padding-bottom:4px;
	}
	input[type='button']:hover {
	    background-color:#fff463;
	    color:#000;
	}
	input[type='range'] {
	    width:100px;
	    margin:0 0 0 10px;
	}
	*/


</style>
</head>

<body>
	<canvas width="230" height="300" id="canvas">Sorry, no canvas available</canvas>
	<a id="download">Download as image</a>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type='text/javascript'>
		/**
 *    Ken Fyrstenberg Nilsen
 *    Abidas Software
 */
 var canvas = document.getElementById('canvas'),
 ctx = canvas.getContext('2d');

/**
 * Demonstrates how to download a canvas an image with a single
 * direct click on a link.
 */
 function doCanvas() {
 	/* draw something */
 	console.log(canvas.height);
 	ctx.fillStyle = '#0E61FD';
 	ctx.fillRect(0, 0, canvas.width, canvas.height);
 	ctx.fillStyle = '#fff';
 	ctx.font = '20px sans-serif';
 	ctx.textAlign="center"; 
 	ctx.fillText('ราคาน้ำมัน ปตท.', 120, canvas.height / 2 - 120);
 	ctx.font = '13px sans-serif';
 	ctx.textAlign="right"; 
 	ctx.fillText('<?php echo date("d/m/Y H:i:s", time()); ?>', 165, canvas.height / 2 - 100);
 	ctx.font = '1-px sans-serif';
 	ctx.textAlign="left";
 	ctx.fillText('บาท / ลิตร', 150, canvas.height / 2-80);
 	ctx.font = '12px sans-serif';
 	ctx.textAlign="right";
 	ctx.fillText('Blue Gasoline 95:', 150, canvas.height / 2-60);
 	ctx.fillText('35.36', 200, canvas.height / 2-60);

 	ctx.fillText('Blue Gasohol 91:', 150, canvas.height / 2-40);
 	ctx.fillText('35.36', 200, canvas.height / 2-40);

 	ctx.fillText('Blue Gasohol 95:', 150, canvas.height / 2-20);
 	ctx.fillText('35.36', 200, canvas.height / 2-20);

 	ctx.fillText('Blue Gasohol E20:', 150, canvas.height / 1-150);
 	ctx.fillText('35.36', 200, canvas.height / 1-150);

 	ctx.fillText('Blue Gasohol 85:', 150, canvas.height / 1-130);
 	ctx.fillText('35.36', 200, canvas.height / 1-130);

 	ctx.fillText('Blue Diesel:', 150, canvas.height / 1-110);
 	ctx.fillText('35.36', 200, canvas.height / 1-110);

 	ctx.fillText('HyForce Premium Diesel:', 150, canvas.height / 1-90);
 	ctx.fillText('35.36', 200, canvas.height / 1-90);

 	ctx.fillText('PTT NGV:', 150, canvas.height / 1-50);
 	ctx.fillText('35.36', 200, canvas.height / 1-50);

 
 }

/**
 * Draw something to canvas
 */
 doCanvas();
  var canvasData = canvas.toDataURL("image/png");
  var ajax = new XMLHttpRequest();

  ajax.open("POST", "./htmltoimage1.php", false);
  ajax.onreadystatechange = function() {
    console.log("data->"+ajax.responseText);
  }
  ajax.setRequestHeader("Content-Type", "application/upload");
  ajax.send("imgData=" + canvasData);

</script>
</html>

