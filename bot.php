<?php


include ('line-bot.php');

$channelSecret = 'b252de3ae956da991dcad579fcc38e5a';
$access_token  = 'DsIQv47M0kuBZMWl4pDyrFHYBjkC7rSnDS1ByA4+9WnHoT215FkNOxoxo6p5gsmeAHLCOg1Nc7NYkmR6W7Rb8me9pJb5egSxP5xvcYj6HYxkXF8E5xJEOKo/660uBoAWPLF9R6lvcz//UCnCWQ5UqwdB04t89/1O/w1cDnyilFU=';

/*get reply token*/
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage($arrJson['events'][0]['replyToken'], $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody()."->".$arrJson['events'][0]['replyToken'];




?>
