curl -X POST \
-H 'Content-Type:application/json' \
-H 'Authorization: Bearer {$0}' \
-d '{
    "replyToken":"$1",
    "messages":[
        {
            "type":"text",
            "text":"Hello, user"
        },
        {
            "type":"text",
            "text":"May I help you?"
        }
    ]
}' https://api.line.me/v2/bot/message/reply