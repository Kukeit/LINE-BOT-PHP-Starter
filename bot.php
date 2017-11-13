<?php


include ('line-bot.php');

$channelSecret = 'b252de3ae956da991dcad579fcc38e5a';
$access_token  = 'DsIQv47M0kuBZMWl4pDyrFHYBjkC7rSnDS1ByA4+9WnHoT215FkNOxoxo6p5gsmeAHLCOg1Nc7NYkmR6W7Rb8me9pJb5egSxP5xvcYj6HYxkXF8E5xJEOKo/660uBoAWPLF9R6lvcz//UCnCWQ5UqwdB04t89/1O/w1cDnyilFU=';
$bot = new BOT_API($channelSecret, $access_token);
	
//$bot->sendMessageNew('U2b250e9c1c5e8c3793cf0a9f053e0b25', 'Hello World1111 !!');
/*
if ($bot->isSuccess()) {
	echo 'Succeeded!';
	exit();
}
*/

// Failed
//echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessageNew($access_token, $textMessageBuilder);
//echo $response;

$bot->sendMessageNew('U2b250e9c1c5e8c3793cf0a9f053e0b25', $response);

exit();


?>
