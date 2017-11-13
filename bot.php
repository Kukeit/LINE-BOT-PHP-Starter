<?php


include ('line-bot.php');

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
	$imageMesageBuilder=new \LINE\LINEBot\MessageBuilder\ImageMessageBuilder('https://static.pexels.com/photos/635608/pexels-photo-635608.jpeg','https://static.pexels.com/photos/635608/pexels-photo-635608.jpeg');

	
	$response = $bot->replyMessage($arrJson['events'][0]['replyToken'], $imageMesageBuilder);
	
	$TemplateMessageBuilderObj=new LINEBot\MessageBuilder\TemplateMessageBuilder(
                'alt test',
                new ButtonTemplateBuilder(
                    'button title',
                    'button button',
                    'http://www.topconnects.com/Content/img/ImagePlayButton/PlayButton-6.png',
                    [  
                        new MessageTemplateActionBuilder('message label', 'test message')
                    ]
                )
            );
	$response = $bot->replyMessage(
            $arrJson['events'][0]['replyToken'],$TemplateMessageBuilderObj);

	//$response = $bot->replyMessage($arrJson['events'][0]['replyToken'], $res);
}

echo $response->getHTTPStatus() . ' ' . $response->getRawBody()."->";



?>
