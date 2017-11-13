

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
	<a id="download">Download as image</a>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas2image@1.0.5/canvas2image.js"></script>

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


 	var c = document.getElementById("canvas");
	var link = document.getElementById('download');
	link.setAttribute('download', 'MintyPaper.png');
	link.setAttribute('href', c.toDataURL("image/png").replace("image/png", "image/octet-stream"));
	link.click();
 }

/**
 * This is the function that will take care of image extracting and
 * setting proper filename for the download.
 * IMPORTANT: Call it from within a onclick event.
 */
 function downloadCanvas(link, canvasId, filename) {
 	//link.href = document.getElementById(canvasId).toDataURL();
 	//link.download = filename;
 }

/** 
 * The event handler for the link's onclick event. We give THIS as a
 * parameter (=the link element), ID of the canvas and a filename.
 */
 document.getElementById('download').addEventListener('click', function() {
 	downloadCanvas(this, 'canvas', 'test.png');
 }, false);

/**
 * Draw something to canvas
 */
 doCanvas();
</script>
</html>

<?php


include ('line-bot.php');
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;

$channelSecret = 'b252de3ae956da991dcad579fcc38e5a';
$access_token  = 'DsIQv47M0kuBZMWl4pDyrFHYBjkC7rSnDS1ByA4+9WnHoT215FkNOxoxo6p5gsmeAHLCOg1Nc7NYkmR6W7Rb8me9pJb5egSxP5xvcYj6HYxkXF8E5xJEOKo/660uBoAWPLF9R6lvcz//UCnCWQ5UqwdB04t89/1O/w1cDnyilFU=';

/*get reply token*/
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$response='';

if($arrJson['events'][0]['message']['text'] == "hi"){
	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('Hi->'.$arrJson['events'][0]['replyToken']);
	$response = $bot->replyMessage($arrJson['events'][0]['replyToken'], $textMessageBuilder);
}else if($arrJson['events'][0]['message']['text'] == "fuck"){
	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('Fuck you.->'.$arrJson['events'][0]['replyToken']);

	$response = $bot->replyMessage($arrJson['events'][0]['replyToken'], $textMessageBuilder);

}else if($arrJson['events'][0]['message']['text'] == "img1"){

	$imageMesageBuilder=new \LINE\LINEBot\MessageBuilder\ImageMessageBuilder('https://static.pexels.com/photos/635608/pexels-photo-635608.jpeg','https://static.pexels.com/photos/635608/pexels-photo-635608.jpeg');

	
	$response = $bot->replyMessage($arrJson['events'][0]['replyToken'], $imageMesageBuilder);

}else if($arrJson['events'][0]['message']['text'] == "theme1"){

	$actions=array(
		array('type'=>'message','label'=>'Yes','text'=>'yes'),
		array('type'=>'message','label'=>'No','text'=>'no')
	);
	$TemplateMessageBuilderObj=new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
                'ราคาน้ำมันของ ปตท',
                 new ButtonTemplateBuilder(
                    'ราคาน้ำมันของ ปตท. วันนี้ :',
                    date("d/m/Y", time()),
                    'https://javahome.herokuapp.com/img.png',
                    [
                        new PostbackTemplateActionBuilder('postback label', 'post=back'),
                        new MessageTemplateActionBuilder('message label', 'test message'),
                        new UriTemplateActionBuilder('uri label', 'http://addplaybuttontoimage.way4info.net/Images/Icons/21.png'),
                    ]
                )
            );
	$response = $bot->replyMessage(
            $arrJson['events'][0]['replyToken'],$TemplateMessageBuilderObj);

	//$response = $bot->replyMessage($arrJson['events'][0]['replyToken'], $res);
}else if($arrJson['events'][0]['message']['text'] == "s1"){
    $response = $bot->replyMessage($arrJson['events'][0]['replyToken'], new \LINE\LINEBot\MessageBuilder\StickerMessageBuilder('1', '2'));
}

echo $response->getHTTPStatus() . ' ' . $response->getRawBody()."->";



?>
