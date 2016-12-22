<?php
header("Access-Control-Allow-Origin: *");

//grab the POSTed input msg
$inputMsg = json_decode(file_get_contents('php://input'), true);

/* Looks like:

{
  "attachments": [],
  "avatar_url": "http://i.groupme.com/123456789",
  "created_at": 1302623328,
  "group_id": "1234567890",
  "id": "1234567890",
  "name": "John",
  "sender_id": "12345",
  "sender_type": "user",
  "source_guid": "GUID",
  "system": false,
  "text": "Hello world ☃☃",
  "user_id": "1234567890"
}

*/

//Kill the process if the last msg sent was from this bot
if($inputMsg['sender_id'] == 362006){ //Harambe bot sender id
    exit;
}

send('devon');


if(strpos($inputMsg['name'], 'Marcus') || strpos($inputMsg['name'], 'marcus')){
    send('SHUT UP MARCUS');
}

if(strpos($inputMsg['text'], 'moon') || strpos($inputMsg['text'], 'lunar')){
    $text = "That's one small step for man, one giant leap for mankind.";
    send($text);
}

if(strpos($inputMsg['text'], 'lauren') || strpos($_POST['text'], 'Lauren')){
    $text = "smh lauren lol";
    send($text);
}


/**
 * Sends the $text to the group as Harambe
 * @param $text
 */
function send($text){
    // where are we posting to?
    $url = 'https://api.groupme.com/v3/bots/post';

    // what post fields?
    $fields = array('text' => $text, 'bot_id' => '632b0904bc8e683dd3518e6444');

    // build the urlencoded data
    $postvars = http_build_query($fields);

    // open connection
    $ch = curl_init();

    // set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

    // execute post
    $result = curl_exec($ch);

    // close connection
    curl_close($ch);
}

