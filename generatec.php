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
	<canvas width="500" height="300" id="canvas">Sorry, no canvas available</canvas>
</body>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
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
 	ctx.fillStyle = '#f90';
 	ctx.fillRect(0, 0, canvas.width, canvas.height);
 	ctx.fillStyle = '#fff';
 	ctx.font = '60px sans-serif';
 	ctx.fillText('ราคาน้ำมัน', 10, canvas.height / 2 - 15);
 	ctx.font = '26px sans-serif';
 	ctx.fillText('Click link below to save this as image', 15, canvas.height / 2 + 35);
 }

 doCanvas();

/*
  var canvasData = canvas.toDataURL("image/png");
  var ajax = new XMLHttpRequest();

  ajax.open("POST", "./htmltoimage1.php", false);
  ajax.onreadystatechange = function() {
    console.log("data->"+ajax.responseText);
  }
  ajax.setRequestHeader("Content-Type", "application/upload");
  ajax.send("imgData=" + canvasData);
*/

$(document).ready(function(){
	var canvasData = canvas.toDataURL("image/png");
	   $.ajax({
	      type: "POST",
	      url: "./htmltoimage1.php",
	      data: {imgData:canvasData} ,
	      success: function(data){
	   			console.log('success.')
		    }
		});
});


</script>
</html>

